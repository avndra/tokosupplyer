<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Laptop Gaming Z',
                'toko_id' => 1,
                'price' => 15000000,
                'status' => 'available',
                'supplier_id' => 1,
                'stock' => 10,
                'created_at' => now(),
            ],
            [
                'name' => 'Smartphone A21',
                'toko_id' => 2,
                'price' => 3500000,
                'status' => 'available',
                'supplier_id' => 2,
                'stock' => 25,
                'created_at' => now(),
            ],
            [
                'name' => 'Headset Noise Canceling',
                'toko_id' => 1,
                'price' => 1200000,
                'status' => 'available',
                'supplier_id' => 1,
                'stock' => 15,
                'created_at' => now(),
            ]
        ]);
    }
}
