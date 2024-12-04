<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sales;
use App\Http\Controllers\Products;


Route::get('/', function () {
    $prods = Product::with('sales')->get();
    return view('welcome', compact('prods'));
});
Route::get('/product', function () {
    return view('produk', ['sales' => Product::all()]);
});

Route::get('/product/search', [Products::class, 'search']);

Route::get('/product/create', function () {
    return view('product-create');
});

Route::post('/product/store', function (Request $request) {
    // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:1',
        'stock' => 'required|integer|min:1',
    ]);

    // Simpan data ke database
    Product::create($validated);

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return redirect('/product')->with('success', 'Produk berhasil ditambahkan!');
});

Route::delete('/product/{id}', function ($id) {
    $product = Product::findOrFail($id); // Cari data berdasarkan ID
    $product->delete(); // Hapus data
    return redirect('/product')->with('success', 'Produk berhasil dihapus!');
});




Route::get('/penjualan', function () {
    return view('penjualan', ['products' => Product::all()]);
});

Route::post('/penjualan', function (Request $request) {
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($validated['product_id']);

    if ($product->stock < $validated['quantity']) {
        return back()->withErrors(['quantity' => 'Stok tidak mencukupi.']);
    }

    // Kurangi stok produk
    $product->stock -= $validated['quantity'];
    $product->save();

    // Simpan transaksi penjualan
    Sales::create([
        'product_id' => $validated['product_id'],
        'quantity' => $validated['quantity'],
    ]);

    return back()->with('success', 'Penjualan berhasil.');
});
