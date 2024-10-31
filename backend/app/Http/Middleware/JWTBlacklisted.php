<?php

namespace App\Http\Middleware;

use App\Services\JWTBlacklistService;
use Closure;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class JWTBlacklisted
{
    public function handle(Request $request, Closure $next): Response
    {
        $check = (new JWTBlacklistService)->isBlacklisted(JWTAuth::getToken());
        if ($check) return jsonError(
            'Você não está autenticado',
            ['auth' => 'token está na blacklist'],
            401
        );

        return $next($request);
    }
}
