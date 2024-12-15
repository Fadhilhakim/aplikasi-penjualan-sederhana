<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;

class Products extends Controller
{
    // public function search(Request $request) {
        
    //     $data_search = Product::where('name', 'like', '%'.$request->search.'%')
    //         ->orWhere('id', 'like', '%'.$request->search.'%')
    //         ->orWhere('price', 'like', '%'.$request->search.'%')
    //         ->get();

    //     return view('produk', ['search' => $request->search, 'sales' => $data_search, 'title' => 'Tambah Data Produk', 'action' => '/product/store']);
    // }
}
