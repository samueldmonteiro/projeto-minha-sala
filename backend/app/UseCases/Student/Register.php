<?php

namespace App\UseCases\Student;

use Exception;
use App\Enums\ErrorTypes\StudentError;
use App\UseCases\Auth\GenerateTokenJWT;
use App\Repositories\{CourseRepository, StudentRepository};
use Samueldmonteiro\Result\{Error, Result, Success};

class Register
{
    public function __construct(
        protected StudentRepository $studentRepository,
        private GenerateTokenJWT $generateTokenJWT,
        protected CourseRepository $courseRepository
    ) {}

    /**
     * @return Result<array>
     */
    public function execute(array $data): Result
    {
        $course = $this->courseRepository->findByName($data['course']);

        if (!$course) {
            return new Error(
                "Curso não encontrado: {$data['course']}",
                404,
                StudentError::CourseNotFound
            );
        }

        if ($this->studentRepository->findByRA($data['RA'])) {
            return new Error(
                'O RA já está cadastrado',
                400,
                StudentError::RADuplicated
            );
        }

        $data['course_id'] = $course->id;

        try {
            $student = $this->studentRepository->create($data);
        } catch (Exception $e) {
            return new Error(
                "Erro ao cadastrar: {$e->getMessage()}",
                500,
                StudentError::RegisterFail
            );
        }

        return new Success($this->generateTokenJWT->execute($student));
    }
}
