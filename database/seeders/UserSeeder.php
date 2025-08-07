<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::insert([
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'gender' => 'male',
                'city_code' => 1,
                'role' => 'admin',
                'created_at' => now(),
            ],
            [
                'username' => 'johndoe',
                'email' => 'john@example.com',
                'gender' => 'male',
                'city_code' => 2, // Bandung
                'created_at' => now(),
            ],
            [
                'username' => 'janedoe',
                'email' => 'jane@example.com',
                'gender' => 'female',
                'city_code' => 3, // Surabaya
                'created_at' => now(),
            ],
        ]);
    }
}
