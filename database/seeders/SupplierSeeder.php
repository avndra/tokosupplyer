<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        Supplier::insert([
            [
                'name' => 'PT Sumber Rejeki',
                'email' => 'sumber@example.com',
                'phone_number' => '08123456789',
                'address' => 'Jl. Raya Merdeka No. 10',
                'created_at' => now(),
            ],
            [
                'name' => 'CV Makmur Jaya',
                'email' => 'makmur@example.com',
                'phone_number' => '08234567890',
                'address' => 'Jl. Industri No. 5',
                'created_at' => now(),
            ],
        ]);
    }
}
