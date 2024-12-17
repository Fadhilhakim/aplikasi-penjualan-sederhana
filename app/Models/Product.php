<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'stock', 'sold_out', 'image_path', 'discount', 'discount_value', 'description'];


    // Relasi ke tabel sales
    public function sales()
    {
        return $this->hasMany(Sales::class, 'product_id');
    }
    public function orderRequests()
    {
        return $this->hasMany(OrderRequest::class);
    }
}