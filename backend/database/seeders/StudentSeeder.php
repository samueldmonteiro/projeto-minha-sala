<?php

namespace Database\Seeders;

use App\Repositories\StudentRepository;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $studentRepository = app(StudentRepository::class);

        $studentRepository->create([
            'name' => 'Samuel Davi',
            'RA' => '125644367749',
            'semester' => 4,
            'course_id' => 1,
            'type' => 'student'
        ]); 
    }
}
