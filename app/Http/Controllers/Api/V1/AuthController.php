<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\Student;
use App\Services\JWTBlacklistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends ApiController
{
    protected JWTBlacklistService $blacklistService;

    public function __construct(JWTBlacklistService $blacklistService)
    {
        $this->blacklistService = $blacklistService;
    }

    public function loginStudent(LoginRequest $request): JsonResponse
    {

        $credentials = $request->only('email', 'password');

        $student = Student::whereHas('user', function ($query) use ($credentials) {
            $query->where('email', $credentials['email']);
        })->first();

        if (!$student || !Hash::check($credentials['password'], $student->user->password)) {
            return $this->jsonError('Email e/ou senha incorreto(s)', [], 401);
        }

        $token = JWTAuth::fromUser($student);

        return $this->json($this->respondWithToken($token), 'ACCESS TOKEN JWT');
    }

    public function loginAdmin(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        $admin = Admin::whereHas('user', function ($query) use ($credentials) {
            $query->where('email', $credentials['email']);
        })->first();

        if (!$admin || !Hash::check($credentials['password'], $admin->user->password)) {
            return $this->jsonError('Email e/ou Senha incorreto(s)', [], 401);
        }

        $token = JWTAuth::fromUser($admin);

        return $this->json($this->respondWithToken($token), 'ACCESS TOKEN JWT');
    }

    public function me(): JsonResponse
    {
        return $this->json(['me' => $this->user()]);
    }

    public function logout() 
    {
        $token = JWTAuth::getToken();
        $payload = JWTAuth::getPayload($token);

        $this->blacklistService->addToBlacklist($token, $payload->get('exp'));

        JWTAuth::invalidate($token);

        return $this->json([], 'Logout efetuado com sucesso');
    }

    protected function respondWithToken($token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            #'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
