<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Repositories\CourseRepository;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    public function __construct(protected CourseRepository $courseRepository) {}

    public function all(): JsonResponse
    {
        $courses = $this->courseRepository->all();

        if ($courses->isEmpty()) {
            return jsonError('Nenhum curso encontrado', [], 'error', 404);
        }

        return json($courses);
    }
}
