<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan model Product di-import
use Illuminate\Http\Request;

class Products extends Controller
{
    public function search(Request $request) {
        // Lakukan pencarian menggunakan model Product
        $data_search = Product::where('name', 'like', '%'.$request->search.'%')
            ->orWhere('id', 'like', '%'.$request->search.'%')
            ->orWhere('price', 'like', '%'.$request->search.'%')
            ->get();

        return view('produk', ['sales'=> $data_search, 'search' => $request->search]);
    }
}
