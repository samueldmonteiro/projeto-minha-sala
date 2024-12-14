<?php

namespace App\UseCases\Auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class GenerateTokenJWT
{
    public function execute(Model $entity): array
    {
        return [
            'token' => JWTAuth::fromUser($entity->user),
            'token_type' => 'bearer',
            'user' => $entity->user->entityResource(),
            'expires_in' => Auth::factory()->getTTL() * 60
        ];
    }
}
