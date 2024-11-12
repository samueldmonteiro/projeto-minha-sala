<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegisterRequest;
use App\Repositories\StudentRepository;
use App\Services\StudentService;
use Illuminate\Http\JsonResponse;
use App\Enums\StudentError;


class StudentController extends Controller
{
    public function __construct(
        protected StudentRepository $studentRepository,
        protected StudentService $studentService
    ) {}

    public function store(StudentRegisterRequest $request): JsonResponse
    {
        $data = $request->only(['name', 'RA', 'course', 'semester']);

        $result = $this->studentService->register($data);

        if ($result instanceof StudentError) {

            return match ($result) {
                StudentError::CourseNotFound => jsonError('Curso não encontrado!', [], 'error', 404),

                StudentError::RADuplicated => jsonError('RA já cadastrado, faça login para continuar!'),

                default => jsonError('Erro ao efetuar cadastro, tente novamente!')
            };
        }

        return json($result, 'Cadastro efetuado com sucesso');
    }

    public function access(): JsonResponse
    {
        return json('ALUNO ACESSO');
    }
}
