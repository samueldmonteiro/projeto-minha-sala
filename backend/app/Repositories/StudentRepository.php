<?php

namespace App\Repositories;

use App\Models\Student;
use App\Repositories\AbstractRepository;

class StudentRepository extends AbstractRepository
{
    public function __construct(
        Student $model,
        protected UserRepository $userRepository
    ) {
        parent::__construct($model);
    }

    public function create(array $data): Student
    {
        $student = $this->model->create([
            'course_id' => $data['course_id'],
            'RA' => $data['RA'],
            'semester' => $data['semester'],
        ]);

        $user = $this->userRepository->make([
            'name' => $data['name'],
            'type' => 'student',
        ]);

        $student->user()->save($user);

        return $student;
    }

    public function findByRA(string $RA): ?Student
    {
        return $this->model->where('RA', $RA)->first();
    }
}
