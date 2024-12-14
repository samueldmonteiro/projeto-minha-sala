<?php

namespace App\UseCases\Auth;

use App\Repositories\StudentRepository;
use Samueldmonteiro\Result\{Result, Error, Success};
use App\Log\LoginAttemptLog;
use App\Support\LoginProtect;

class LoginStudent
{
    public function __construct(
        private StudentRepository $studentRepository,
        private LoginProtect $loginProtect,
        private LoginAttemptLog $loginAttemptLog,
        private GenerateTokenJWT $generateTokenJWT
    ) {}
    /**
     * @return Result<array>
     */
    public function execute(string $RA): Result
    {
        $student = $this->studentRepository->findByRA($RA);

        if (!$student) {
            $this->loginProtect->recordFailedAttempt();
            $this->loginAttemptLog->incorrect('Login Incorreto', ['RA' => $RA]);

            return new Error('Este RA não está cadastrado', 404);
        }

        $this->loginAttemptLog->success(
            'Logado com sucesso',
            [
                'username' => $student->user->name,
                'user_id' => $student->user->id
            ]
        );

        return new Success($this->generateTokenJWT->execute($student));
    }
}
