<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\StudentResource;
use App\Models\Admin;
use App\Models\Student;
use App\Services\JWTBlacklistService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends ApiController
{
    protected JWTBlacklistService $blacklistService;

    public function __construct()
    {
        $this->blacklistService = new JWTBlacklistService();
    }

    public function loginStudent(LoginRequest $request): JsonResponse
    {

        $credentials = $request->only('email', 'password');

        $student = Student::whereHas('user', function ($query) use ($credentials) {
            $query->where('email', $credentials['email']);
        })->first();

        if (!$student || !Hash::check($credentials['password'], $student->user->password)) {
            return jsonError('Email e/ou senha incorreto(s)', [], 401);
        }

        $token = JWTAuth::fromUser($student);

        return json($this->respondWithToken($token, new StudentResource($student)), 'ACCESS TOKEN JWT');
    }

    public function loginAdmin(LoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        $admin = Admin::whereHas('user', function ($query) use ($credentials) {
            $query->where('email', $credentials['email']);
        })->first();

        if (!$admin || !Hash::check($credentials['password'], $admin->user->password)) {
            return jsonError('Email e/ou Senha incorreto(s)', [], 401);
        }

        $token = JWTAuth::fromUser($admin);

        return json($this->respondWithToken($token, $admin), 'ACCESS TOKEN JWT');
    }

    public function me(): JsonResponse
    {
        return json(['user' => new StudentResource($this->user())]);
    }

    public function check(): JsonResponse
    {
        $user = $this->user();

        if ($user) return json(['user' => new StudentResource($user)]);
        return jsonError('Acesso não autorizado!', ['user' => null]);
    }

    public function logout()
    {
        $token = JWTAuth::getToken();
        $payload = JWTAuth::getPayload($token);

        $this->blacklistService->addToBlacklist($token, $payload->get('exp'));

        JWTAuth::invalidate($token);

        return json([], 'Logout efetuado com sucesso');
    }

    public function respondWithToken(string $token, StudentResource $user): array
    {
        return [
            'token' => $token,
            'token_type' => 'bearer',
            'user' => $user
            #'expires_in' => Auth::factory()->getTTL() * 60
        ];
    }
}
