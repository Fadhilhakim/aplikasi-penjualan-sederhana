<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\DashboardDisplay;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderRequestController;
use App\Http\Controllers\HistoryController;



// Home and Dashboard Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Route::get('/product/search', [Products::class, 'search']);

    Route::get('/', function () {
        $prods = Product::all();
        $displays = DashboardDisplay::all();

        return view('welcome', [
            'prods' => $prods,
            'displays' => $displays,
        ]);
    })->name('home');

    Route::get('/dashboard', function () {
        $prods = Product::all();
        $displays = DashboardDisplay::all();

        return view('welcome', [
            'prods' => $prods,
            'displays' => $displays,
        ]);
    })->name('dashboard');
    
    Route::post('/display/update/{id}', [DashboardController::class, 'update'])->name('display.update');
    
    // Product Routes
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    
    Route::get('/product/search', [ProductController::class, 'search'])->name('product.search');

    // Sales Routes
    Route::get('/penjualan', [OrderRequestController::class, 'index'])->name('order_request.index');
    Route::get('/penjualan/lihat/{user}/{date}', [OrderRequestController::class, 'lihat'])->name('penjualan.lihat');
    Route::post('/penjualan/kirim/{user}/{date}', [OrderRequestController::class, 'storeOrderHistory'])->name('penjualan.storeOrderHistory');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // HISTORY ORDER Routes
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');

});

require __DIR__.'/auth.php';
