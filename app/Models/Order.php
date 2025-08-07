<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    protected $fillable = [
        'user_id',
        'status',
        'order_id',
        'product_id',
        'ordered_at',
    ];


}
