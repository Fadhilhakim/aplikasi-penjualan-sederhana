<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'stock'];

    // Relasi ke tabel sales
    public function sales()
    {
        return $this->hasMany(Sales::class, 'product_id');
    }
}