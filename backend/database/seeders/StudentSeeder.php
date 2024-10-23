<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'course_id' => 1,
            'user_id' => 1,
            'shift_id' => 1,
            'semester' => 4
        ]);

        Student::create([
            'course_id' => 1,
            'user_id' => 2,
            'shift_id' => 1,
            'semester' => 4
        ]);
    }
}
