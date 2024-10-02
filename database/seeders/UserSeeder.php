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
            'name' => 'Maria',
            'email' => 'maria@email.com',
            'password' => Hash::make('12345'),
            'type' => 'student',
            'blocked' => false
        ]);

        User::create([
            'name' => 'joão',
            'email' => 'joão@email.com',
            'password' => Hash::make('4444'),
            'type' => 'student',
            'blocked' => false

        ]);

        User::create([
            'name' => 'Samuel Davi',
            'email' => 'samuel@email.com',
            'password' => Hash::make('1234'),
            'type' => 'admin',
            'blocked' => false
        ]);
    }
}
