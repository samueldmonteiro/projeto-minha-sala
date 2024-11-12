<?php

namespace Database\Seeders;

use App\Repositories\CourseRepository;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courseRepository = app(CourseRepository::class);

        $courseRepository->create(['name' => 'Ciência da Computação (M)']);
        $courseRepository->create(['name' => 'Enfermagem (M)']);
    }
}
