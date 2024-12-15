<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sales;

class SalesController extends Controller {
    public function index()
    {
        $products = Product::all();
        return view('penjualan', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        if ($product->stock < $validated['quantity']) {
            return back()->withErrors(['quantity' => 'Stok tidak mencukupi.']);
        }

        $product->stock -= $validated['quantity'];
        $product->save();

        Sales::create([
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity'],
        ]);

        return back()->with('success', 'Penjualan berhasil.');
    }

    
}