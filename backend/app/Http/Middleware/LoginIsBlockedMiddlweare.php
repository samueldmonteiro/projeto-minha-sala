<?php

namespace App\Http\Middleware;

use App\Support\LoginProtect;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginIsBlockedMiddlweare
{
    public function handle(Request $request, Closure $next): Response
    {
        $loginProtect = new LoginProtect();

        if ($loginProtect->isBlocked()) {
            return jsonError('Muitas tentativas de login, aguarde 15 minutos para tentar novamente', [], 'warning', 429);
        }

        return $next($request);
    }
}
