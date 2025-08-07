<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'toko_id',
        'price',
        'status',
        'supplier_id',
        'stock'
    ];

    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class);
    }

    public function toko()
    {
        return $this->belongsTo(\App\Models\Toko::class);
    }
}
