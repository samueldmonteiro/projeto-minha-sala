<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            ShiftSeeder::class,
            StudentSeeder::class,
            AdminSeeder::class,
            ClassInformationSeeder::class
        ]);

    }
}
