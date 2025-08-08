<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
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
                'password' => Hash::make('password'),
                'gender' => 'male',
                'city_code' => 1,
                'role' => 'admin',
                'created_at' => now(),
            ],
            [
                'username' => 'johndoe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'gender' => 'male',
                'city_code' => 2, // Bandung
                'role' => 'user',
                'created_at' => now(),
            ],
            [
                'username' => 'janedoe',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
                'gender' => 'female',
                'city_code' => 3, // Surabaya
                'role' => 'user',
                'created_at' => now(),
            ],
        ]);
    }
}
