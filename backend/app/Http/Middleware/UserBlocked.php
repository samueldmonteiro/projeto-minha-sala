<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\V1\ApiController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = (new ApiController)->user();

        if ($user) {
            if ($user->user->blocked) return  response()->json([
                'message' => "Usuário bloqueado",
                'status' => false,
                'errorMessages' => ['você foi bloqueado do sistema']
            ], 401);
        }


        return $next($request);
    }
}
