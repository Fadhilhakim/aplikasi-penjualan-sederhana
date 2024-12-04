<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sales;


Route::get('/', function () {
    $prods = Product::with('sales')->get();
    return view('welcome', compact('prods'));
});
Route::get('/produk', function () {
    $sales = Product::with('sales')->get();
    return view('produk', compact('sales'));
});
Route::get('/product/create', function () {
    return view('product-create');
});

Route::post('/product/store', function (Request $request) {
    // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
    ]);

    // Simpan data ke database
    Product::create($validated);

    // Redirect ke halaman lain atau tampilkan pesan sukses
    return redirect('/product/create')->with('success', 'Produk berhasil ditambahkan!');
});

Route::delete('/product/{id}', function ($id) {
    $product = Product::findOrFail($id); // Cari data berdasarkan ID
    $product->delete(); // Hapus data
    return redirect('/produk')->with('success', 'Produk berhasil dihapus!');
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