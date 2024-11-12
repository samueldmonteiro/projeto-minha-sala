<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Student;
use App\Repositories\AbstractRepository;
use Exception;

class StudentRepository extends AbstractRepository implements RepositoryInterface
{
    public function __construct(
        Student $model,
        protected UserRepository $userRepository
    ) {
        parent::__construct($model);
    }


    public function create(array $data): Student
    {
        try {
            $student = $this->model->create([
                'course_id' => $data['course_id'],
                'RA' => $data['RA'],
                'semester' => $data['semester'],
            ]);

            $user = $this->userRepository->make([
                'name' => $data['name'],
                'type' => $data['type'],
            ]);

            $student->user()->save($user);

            return $student;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function findByRA(string $RA): Student|null
    {
        return $this->model->where('RA', $RA)->first();
    }
}
