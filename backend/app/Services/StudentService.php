<?php

namespace App\Services;

use App\Enums\StudentError;
use App\Repositories\CourseRepository;
use App\Repositories\StudentRepository;
use Exception;

class StudentService
{
    public function __construct(
        protected StudentRepository $studentRepository,
        protected AuthService $authService,
        protected CourseRepository $courseRepository
    ) {}

    public function register(array $data): array|StudentError
    {
        $course = $this->courseRepository->findByName($data['course']);

        if (!$course) {
            return StudentError::CourseNotFound;
        }

        if ($this->studentRepository->findByRA($data['RA'])) {
            return StudentError::RADuplicated;
        }

        $data['course_id'] = $course->id;

        try {
            $student = $this->studentRepository->create($data);
        } catch (Exception $e) {
            return StudentError::RegisterFail;
        }

        return $this->authService->handleToken($student);
    }
}
