<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassInformationGetByDayRequest;
use App\Http\Resources\ClassInformationResource;
use App\UseCases\UserVisit\IncreaseVisit;
use App\UseCases\ClassInformation\{GetClassByDay, GetTodayClass};

class ClassInformationController extends Controller
{
    public function __construct(
        private GetTodayClass $getTodayClass,
        private GetClassByDay $getClassByDay,
        private IncreaseVisit $increaseVisit
    ) {}

    public function today(): JsonResponse
    {
        $this->increaseVisit->execute();

        $data = $this->getTodayClass->execute();

        if ($data->isEmpty()) {
            return jsonError('Não existe aula registrada neste dia', [], 'warning', 404);
        }

        return json(ClassInformationResource::collection($data));
    }

    public function getByDay(ClassInformationGetByDayRequest $request): JsonResponse
    {
        $day = $request->query('day');

        if (!$day) return $this->today();

        $data = $this->getClassByDay->execute($day);

        if ($data->isEmpty()) {
            return jsonError('Não existe aula registrada neste dia', [], 'warning', 404);
        }

        return json(ClassInformationResource::collection($data));
    }
}
