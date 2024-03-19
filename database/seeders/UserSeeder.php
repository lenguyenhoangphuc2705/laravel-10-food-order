<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        User::insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => '$2y$10$Ib8IZgSHgeoDEDzSyhBwOeujIjRS7in0cxAVHIPU0uruKbLDDy6SK',
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'password' => '$2y$10$Ib8IZgSHgeoDEDzSyhBwOeujIjRS7in0cxAVHIPU0uruKbLDDy6SK',
            ]
        ]);
    }
}
