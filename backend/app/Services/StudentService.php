<?php

namespace App\Services;

use App\Exceptions\CourseNotFoundException;
use App\Exceptions\StudentRegistrationException;
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

    public function register(array $data): ?array
    {
        try {
            $course = $this->courseRepository->findByName($data['course']);

            if (!$course) {
                throw new CourseNotFoundException();
            }

            $data['course_id'] = $course->id;

            $student = $this->studentRepository->create($data);
            return $this->authService->handleToken($student);
            
        } catch (CourseNotFoundException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new StudentRegistrationException();
        }
    }
}
