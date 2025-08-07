<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Toko;

class TokoSeeder extends Seeder
{
    public function run(): void
    {
        Toko::insert([
            [
                'owner_id' => 1, // admin
                'name_toko' => 'Toko Admin Hebat',
                'city_code' => 1, // Jakarta
                'created_at' => now(),
            ],
            [
                'owner_id' => 2, // johndoe
                'name_toko' => 'Toko John Mantap',
                'city_code' => 2, // Bandung
                'created_at' => now(),
            ]
        ]);
    }
}
