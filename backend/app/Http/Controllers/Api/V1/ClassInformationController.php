<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassInformationGetByDayRequest;
use App\Services\ClassInformationService;
use App\Services\UserVisitService;
use Illuminate\Http\JsonResponse;

class ClassInformationController extends Controller
{
    public function __construct(
        protected ClassInformationService $classInformationService,
        protected UserVisitService $userVisitService
    ) {}

    public function today(): JsonResponse
    {
        $this->userVisitService->increaseVisit();

        $data = $this->classInformationService->getTodayClass();

        if($data->isEmpty()) {
            return jsonError('Não existe aula registrada neste dia', [], 404);
        }

        return json($data);
    }

    public function getByDay(ClassInformationGetByDayRequest $request): JsonResponse
    {
        $day = $request->day;

        if(!$day) return $this->today();

        $data = $this->classInformationService->getClassByDay($day);

        if($data->isEmpty()) {
            return jsonError('Não existe aula registrada neste dia', [], 404);
        }

        return json($data);
    }
}
