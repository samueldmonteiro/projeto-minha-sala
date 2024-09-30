<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function json($data, string $message = '', int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public function jsonError(string $message = '', array $errorMessages = [], int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'errorMessages' => $errorMessages,
        ], $statusCode);
    }


    protected function user(): User|null
    {
        if (auth('student')->check()) return auth('student')->user();
        if (auth('admin')->check()) return auth('admin')->user();

        return null;
    }

}
