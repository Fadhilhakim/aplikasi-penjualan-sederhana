<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $sales = Product::all();
        return view('produk', [
            'sales' => $sales,
            'title' => 'Tambah Data Produk',
            'action' => route('product.store'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);

        Product::create($validated);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $sales = Product::all();
        $product = Product::findOrFail($id);
        return view('produk', [
            'sales' => $sales,
            'product' => $product,
            'title' => 'Edit Data Produk',
            'action' => '/product/update/'.$id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $this->validateProduct($request);

        $product = Product::findOrFail($id);
        $product->update($validated);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function search(Request $request){
        $query = Product::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            
            // Menangani pencarian berdasarkan tipe data
            if (is_numeric($searchTerm)) {
                // Jika searchTerm adalah angka, mencari berdasarkan id atau harga
                $query->where('id', $searchTerm)
                    ->orWhere('price', $searchTerm);
            }

            // Jika searchTerm adalah string, mencari berdasarkan nama produk
            $query->orWhere('name', 'like', "%$searchTerm%");
        }

        // Ambil hasil pencarian
        $data_search = $query->get();

        return view('produk', [
            'sales' => $data_search,
            'search' => $request->search,
            'title' => 'Tambah Data Produk',
            'action' => route('product.store'),
        ]);
    }


    private function validateProduct(Request $request)
    {
        return $request->validate([
            'name' => 'required|string|max:100', // Sesuaikan dengan panjang maksimum kolom 'name'
            'price' => 'required|numeric|min:0.01', // Harga minimal 0.01
            'stock' => 'required|integer|min:1', // Stok minimal 1
            'image_path' => 'nullable|url', // Validasi untuk 'image_path' jika diisi (URL)
            'discount' => 'required|in:Y,N', // Validasi untuk pilihan diskon (enum)
            'discount_value' => 'required_if:discount,Y|numeric|min:0|max:100', // Hanya valid jika diskon "Y", dan nilai antara 0 dan 100
            'description' => 'nullable|string|max:1000', // Deskripsi opsional dengan batas panjang 1000 karakter
        ]);
    }
}
