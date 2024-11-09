<?php

namespace App\Services;

use App\Exceptions\AdminLoginException;
use App\Exceptions\AdminNotFoundException;
use App\Exceptions\RANotFoundException;
use App\Exceptions\StudentLoginException;
use App\Repositories\AdminRepository;
use App\Repositories\StudentRepository;
use Exception;
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

    public function loginStudent(string $RA): ?array
    {
        try {
            $student = $this->studentRepository->findByRA($RA);

            if (!$student) throw new RANotFoundException();

            return $this->handleToken($student);
        } catch (RANotFoundException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new StudentLoginException();
        }
    }

    public function loginAdmin(string $email, string $password): array|null
    {
        try {
            $admin = $this->adminRepository->findByEmail($email);

            if (!$admin) throw new AdminNotFoundException();

            if (!Hash::check($password, $admin->password)) throw new AdminLoginException();

            return $this->handleToken($admin);
            
        } catch (AdminNotFoundException $e) {
            throw $e;
        } catch (Exception $e) {
            throw new AdminLoginException();
        }
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
