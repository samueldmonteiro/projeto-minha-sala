<?php

namespace App\UseCases\Auth;

use Samueldmonteiro\Result\{Result, Error, Success};
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Hash;

class LoginAdmin
{
    public function __construct(
        private AdminRepository $adminRepository,
        private GenerateTokenJWT $generateTokenJWT
    ) {}

    /**
     * @return Result<array>
     */
    public function execute(string $email, string $password): Result
    {
        $adm = $this->adminRepository->findByEmail($email);

        if ((!$adm) || (!Hash::check($password, $adm->password))) {
            return new Error('Login incorreto', 401);
        }

        return new Success($this->generateTokenJWT->execute($adm));
    }
}
