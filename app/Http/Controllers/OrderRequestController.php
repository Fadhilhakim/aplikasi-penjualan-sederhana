<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderRequest;
use App\Models\Product;
use App\Models\OrderHistory;
class OrderRequestController extends Controller
{   
    public function getOrderRequests() {

        return $order_requests = OrderRequest::with(['user', 'product'])
        ->where(function ($query) {
            $query->where('status', 'LUNAS')
                ->orWhere('status', 'BELUM BAYAR');
        })->get()
            ->groupBy((function ($order) {
                    return $order->user_id . '-' . $order->status; // Gabungkan user_id dan status sebagai key grup
                })
            ) 
            ->map(function ($orders, $key) {
                [$user_id, $status] = explode('-', $key);
                
                // Ambil user berdasarkan grup
                $user = $orders->first()->user;
                $status = $orders->first()->status;
                $created_at = $orders->first()->created_at;
    
                $totalPrice = $orders->sum(function ($order) {
                    $price = intval($order->product->price);
                    return $order->quantity * $price;
                });
    
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
            // dd($order_requests),
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
    
                // Ambil user dan kalkulasi total harga
                $user = $orders->first()->user;
                
                $ongkir = 10000; // Biaya pengiriman
                $pajak = 1.1; // 11% dalam bentuk multiplier

                $totalPrice = $orders->sum(function ($order) {
                    $price = intval($order->product->price); // Konversi harga ke integer
                    return $order->quantity * $price; // Total harga produk
                });

                // Tambahkan ongkir dan pajak
                $totalPrice = ($totalPrice * $pajak) + $ongkir;

    
                // Ambil tanggal pertama (tanggal pesanan)
                $dates = $orders->first()->created_at;
    
                // Membuat array produk dengan quantity
                $products_with_quantities = $orders->map(function ($order) {
                    return [
                        'product_id' => $order->product->id,
                        'name' => $order->product->name,
                        'price' => $order->product->price,
                        'discount' => $order->product->discount,
                        'discount_value' => $order->product->discount_value,
                        'quantity' => $order->quantity,
                    ];
                });
    
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
        $order_views = $this->orderViews($user, $date);
        try {
            // foreach ($order_views as $key => $order) {
            //     OrderHistory::create([
            //         'user_name'=> $user,
            //         'user_email'=> $order['email'],
            //         'order_date'=> $order['date'],
            //         'total_quantity'=> $order['total_quantity'],
            //         'total_price'=> $order['total_price'],
            //         'status'=> $order['status'],
            //         'payment'=> $order['payment'],
            //         'products_order' => json_encode($order['products_order']->toArray()),
            //     ]);
            // }   

            OrderRequest::whereHas('user', function ($query) use ($user) {
                $query->where('name', $user); // Filter berdasarkan nama user
            })->where('created_at', $date)->update(['status' => 'MENUNGGU KONFIRMASI']);
           
            // Kirim pesan sukses
            return back()->with('success', 'Pesanan berhasil diproses dan dikirim ke customer.');
        } catch (\Exception $e) {
            // Tangani jika terjadi error
            // return dd($order_views->toArray()); 
            return view('penjualan')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



    
}
