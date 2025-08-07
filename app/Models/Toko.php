<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $fillable = [
        'name_toko',
        'city_code',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(\App\Models\User::class, 'owner_id');

    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_code');
    }

}
