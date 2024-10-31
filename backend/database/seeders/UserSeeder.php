<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Erick Mendes',
            'email' => 'erick@gmail.com',
            'password' => Hash::make('4321'),
            'type' => 'student',
            'blocked' => false
        ]);

        User::create([
            'name' => 'Luis Gustavo',
            'email' => 'lgustavo@email.com',
            'password' => Hash::make('4321'),
            'type' => 'student',
            'blocked' => false

        ]);

        User::create([
            'name' => 'Samuel Davi',
            'email' => 'samuel@email.com',
            'password' => Hash::make('4321'),
            'type' => 'student',
            'avatar' => 'users/avatar/233233211.jpg',
            'blocked' => false
        ]);
    }
}
