<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('json')) {

    function json($data, string $message = '', int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}


if (!function_exists('jsonError')) {

    function jsonError(string $message = '', array $errorMessages = [], int $statusCode = 400): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'errors' => $errorMessages,
        ], $statusCode);
    }
}
