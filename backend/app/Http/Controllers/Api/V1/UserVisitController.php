<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\UserVisitResource;
use App\Repositories\UserVisitRepository;

class UserVisitController extends Controller
{
    public function __construct(
        protected UserVisitRepository $userVisitRepository
    ) {}

    public function all(): JsonResponse
    {
        return json(
            UserVisitResource::collection($this->userVisitRepository->all())
        );
    }
}
