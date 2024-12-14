<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegisterRequest;
use App\UseCases\Student\Register;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    public function __construct(private Register $register) {}

    public function store(StudentRegisterRequest $request): JsonResponse
    {
        $data = $request->only(['name', 'RA', 'course', 'semester']);

        $result = $this->register->execute($data);

        if ($result->isError()) {
            return jsonError($result->getErrorMessage(), [], 'error', $result->getErrorCode());
        }

        return json($result->getValue(), 'Cadastro efetuado com sucesso');
    }

    public function access(): JsonResponse
    {
        return json('ALUNO ACESSO');
    }
}
