<?php

namespace App\Http\Controllers;

use App\Models\OrderRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class OrderRequestController extends Controller
{   

    
    public function getOrderRequests() {

        return $order_requests = OrderRequest::with(['user', 'product'])
        ->where(function ($query) {
            $query->where('status', 'LUNAS')
                ->orWhere('status', 'BELUM BAYAR')
                ->orWhere('status', 'MENUNGGU KONFIRMASI');
        })->get()
            ->groupBy((function ($order) {
                    return $order->user_id . '-' . $order->status . '-'. $order->created_at; // Gabungkan user_id dan status sebagai key grup
                })
            ) 
            ->map(function ($orders, $key) {
                [$user_id, $status] = explode('-', $key);
                
                // Ambil user berdasarkan grup
                $user = $orders->first()->user;
                $status = $orders->first()->status;
                $created_at = $orders->first()->created_at;
    
                $ongkir = 10000; // Biaya pengiriman
                $totalPrice = 0; // Inisialisasi total harga
                
    
                $products_with_quantities = $orders->map(function ($order) use (&$totalPrice) {
                    $price = intval($order->product->price); // Konversi harga ke integer
                    $discount_percentage = $order->product->discount_value ?? 0; // Ambil discount percentage, default 0 jika tidak ada
    
                    // Hitung harga setelah diskon
                    $discount_amount = ($discount_percentage / 100) * $price; // Hitung nilai diskon
                    $final_price = $price - $discount_amount; // Harga setelah diskon
    
                    // Hitung total harga untuk produk ini
                    return $totalPrice += $order->quantity * $final_price; // Total harga produk setelah diskon

                });

                $pajak = 1.1; // 11% dalam bentuk multiplier
                $totalPrice = ($totalPrice * $pajak) + $ongkir;
    
                return [
                    'user' => $user->name,
                    'total_quantity' => $orders->sum('quantity'),
                    'total_price' => $totalPrice,
                    'status' => $status,
                    'date' => $created_at,
                ];
            });
    }
    public function index()
    {
        $order_requests = $this->getOrderRequests();

        return view('penjualan', [
            'order_requests' => $order_requests,
        ]);
    }

    public function orderViews($user, $date) {
        return $order_views = OrderRequest::with(['user', 'product'])
            ->whereHas('user', function ($query) use ($user) {
                $query->where('name', $user); // Filter berdasarkan nama pengguna
            })
            ->where('created_at', $date)
            ->get()
            ->groupBy(function ($order) {
                return $order->user_id . '-' . $order->status . '-' . $order->created_at;
            })
            ->map(function ($orders, $key) {
                // Pisahkan user_id, status, dan created_at
                [$user_id, $status, $created_at] = explode('-', $key);
    
                // Ambil user
                $user = $orders->first()->user;
    
                $ongkir = 10000; // Biaya pengiriman
                $totalPrice = 0; // Inisialisasi total harga
    
                // Membuat array produk dengan quantity dan menghitung total harga
                $products_with_quantities = $orders->map(function ($order) use (&$totalPrice) {
                    $price = intval($order->product->price); // Konversi harga ke integer
                    $discount_percentage = $order->product->discount_value ?? 0; // Ambil discount percentage, default 0 jika tidak ada
    
                    // Hitung harga setelah diskon
                    $discount_amount = ($discount_percentage / 100) * $price; // Hitung nilai diskon
                    $final_price = $price - $discount_amount; // Harga setelah diskon
    
                    // Hitung total harga untuk produk ini
                    $totalPrice += $order->quantity * $final_price; // Total harga produk setelah diskon
    
                    return [
                        'product_id' => $order->product->id,
                        'name' => $order->product->name,
                        'price' => $final_price, // Harga setelah diskon
                        'discount' => $discount_percentage, // Menyimpan persentase diskon
                        'discount_value' => $discount_amount, // Menyimpan nilai diskon
                        'quantity' => $order->quantity,
                    ];
                });
    
                // Tambahkan ongkir dan pajak
                $pajak = 1.1; // 11% dalam bentuk multiplier
                $totalPrice = ($totalPrice * $pajak) + $ongkir;
    
                // Ambil tanggal pertama (tanggal pesanan)
                $dates = $orders->first()->created_at;
    
                return [
                    'user' => $user->name,
                    'email' => $user->email,
                    'date' => $dates, // Tanggal pesanan pertama
                    'total_quantity' => $orders->sum('quantity'),
                    'total_price' => $totalPrice,
                    'status' => $status,
                    'id_pesanan' => $orders->first()->id,
                    'payment' => $orders->first()->payment,
                    'products_order' => $products_with_quantities, // Produk dengan quantity
                ];
            });
    }

    public function lihat($user, $date)
    {
        $order_views = $this->orderViews($user, $date);

        // Kirim data ke view 'penjualan'
        return view('penjualan', [
            'order_views' => $order_views,  // Data pesanan yang sudah diolah
            // 'order_requests'=> $order_requests,
        ]);
    }

    public function storeOrderHistory($user, $date)
        {
            try {
                // Gunakan transaction untuk memastikan data konsisten
                DB::transaction(function () use ($user, $date) {
                    // Ambil semua order_requests berdasarkan user dan tanggal
                    $orders = OrderRequest::whereHas('user', function ($query) use ($user) {
                            $query->where('name', $user);
                        })
                        ->where('created_at', $date)
                        ->get();

                    // Perulangan setiap order untuk mengurangi stok product
                    foreach ($orders as $order) {
                        // Update status order_request
                        $order->update(['status' => 'MENUNGGU KONFIRMASI']);

                        // Kurangi stok pada tabel products
                        $product = Product::find($order->product_id);

                        if ($product) {
                            // Manambah jumlah sold_out dan mengurangi stock
                            if ($product->stock >= $order->quantity) {
                                $product->stock -= $order->quantity; 
                                $product->sold_out += $order->quantity;
                                $product->save();
                            } else {
                                throw new \Exception("Stok tidak mencukupi untuk produk: {$product->name}");
                            }
                        }
                    }
                });

                return redirect()->back()->with('success', 'Order berhasil dikirm!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }

}
