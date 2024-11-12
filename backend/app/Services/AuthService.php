<?php

namespace App\Services;

use App\Enums\AuthError;
use App\Repositories\AdminRepository;
use App\Repositories\StudentRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthService
{
    public function __construct(
        protected StudentRepository $studentRepository,
        protected AdminRepository $adminRepository
    ) {}

    public function loginStudent(string $RA): array|AuthError
    {
        $student = $this->studentRepository->findByRA($RA);

        if (!$student) return AuthError::RANotFound;

        return $this->handleToken($student);
    }

    public function loginAdmin(string $email, string $password): array|AuthError
    {
        $adm = $this->adminRepository->findByEmail($email);

        if ((!$adm) || (!Hash::check($password, $adm->password))) {
            return AuthError::IncorrectLogin;
        }

        return $this->handleToken($adm);
    }

    public function handleToken(Model $entity): array
    {
        return [
            'token' => JWTAuth::fromUser($entity->user),
            'token_type' => 'bearer',
            'user' => $entity->user->entityResource(),
            'expires_in' => Auth::factory()->getTTL() * 60
        ];
    }

    public function logout(): void
    {
        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);
    }
}
