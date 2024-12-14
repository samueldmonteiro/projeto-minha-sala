<?php

namespace App\UseCases\Auth;

use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class Logout
{
    public function execute(): void
    {
        $token = JWTAuth::getToken();
        JWTAuth::invalidate($token);
    }
}
