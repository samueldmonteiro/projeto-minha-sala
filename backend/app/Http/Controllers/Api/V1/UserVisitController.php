<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserVisitResource;
use App\Repositories\UserVisitRepository;
use App\Services\UserVisitService;
use Illuminate\Http\JsonResponse;

class UserVisitController extends Controller
{
    public function __construct(
        protected UserVisitService $userVisitService,
        protected UserVisitRepository $userVisitRepository
    ) {}


    public function all(): JsonResponse
    {
        return json(
            UserVisitResource::collection($this->userVisitRepository->all())
        );
    }
}
