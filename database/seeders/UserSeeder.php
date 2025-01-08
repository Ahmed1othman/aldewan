<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Aldewan',
            'email' => 'adminuser1@aldewan.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Admin Aldewan two',
            'email' => 'adminuser2@aldewan.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
