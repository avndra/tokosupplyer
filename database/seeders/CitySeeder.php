<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        City::insert([
            ['name' => 'Jakarta'],
            ['name' => 'Bandung'],
            ['name' => 'Surabaya'],
            ['name' => 'Yogyakarta'],
            ['name' => 'Bali'],
        ]);
    }
}
