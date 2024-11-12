<?php

namespace App\Http\Controllers\Api\V1;

use App\Enums\AuthError;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\StudentLoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {}

    public function loginStudent(StudentLoginRequest $request): JsonResponse
    {
        $result = $this->authService->loginStudent($request->RA);

        if (is_array($result)) {
            return json($result);
        }

        return match ($result) {
            AuthError::RANotFound => jsonError('RA não identificado!', [], 'warning', 404),
            default => jsonError('Erro inesperado ao efetuar login')
        };
    }

    public function loginAdmin(AdminLoginRequest $request): JsonResponse
    {
        $result = $this->authService->loginAdmin(
            $request->email,
            $request->password
        );

        if (!is_array($result)) return jsonError('Login incorreto');

        return json($result);
    }

    public function check(): JsonResponse
    {
        return json([
            'check' => Auth::check(),
            'user' => Auth::user()->entityResource()
        ]);
    }

    public function me(): JsonResponse
    {
        return json(Auth::user()->entityResource());
    }

    public function logout(): void
    {
        $this->authService->logout();
    }
}
