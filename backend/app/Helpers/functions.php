<?php

use Illuminate\Http\JsonResponse;

if (!function_exists('json')) {

     /**
     * @param string $type success|info
     */
    function json($data, string $message = '', int $statusCode = 200, string $type='success'): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'type' => $type
        ], $statusCode);
    }
}


if (!function_exists('jsonError')) {

    /**
     * @param string $type error|warning|info|critical
     */
    function jsonError(
        string $message = '',
        array $errorMessages = [],
        string $type = 'error',
        int $statusCode = 400,
    ): JsonResponse {
        return response()->json([
            'status' => false,
            'type' => $type,
            'message' => $message,
            'errors' => $errorMessages,

        ], $statusCode);
    }
}
