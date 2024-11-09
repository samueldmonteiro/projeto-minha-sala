<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\CourseNotFoundException;
use App\Exceptions\StudentRegistrationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegisterRequest;
use App\Repositories\StudentRepository;
use App\Services\StudentService;
use Exception;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    public function __construct(
        protected StudentRepository $studentRepository,
        protected StudentService $studentService
    ) {}

    public function store(StudentRegisterRequest $request)
    {
        $data = $request->only(['name', 'RA', 'course', 'semester']);

        try {

            $result = $this->studentService->register($data);
            return json($result);

        } catch (CourseNotFoundException $e) {
            return jsonError($e->getMessage(), [], $e->getCode());

        } catch (StudentRegistrationException $e) {
            return jsonError($e->getMessage(), [], $e->getCode());

        } catch (Exception $e) {
            return jsonError('Erro inesperado ao cadastrar, tente novamente!', [], 500);
        }
    }

    public function access(): JsonResponse
    {
        return json('ALUNO ACESSO');
    }
}
