<?php

use App\Http\Middleware\ForceJsonResponse;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsStudent;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(ForceJsonResponse::class);

        $middleware->alias([
            'student' => IsStudent::class,
            'admin' => IsAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

        // auth exception
        $exceptions->render(function (AuthenticationException $e, Request $request) {
            if ($request->is('api/*')) {

                return jsonError('Erro na autenticação', [], 'error', 401);
            }
        });

        // not found route
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('*') || $request->is('api/*') || $request->is('api')) {

                return jsonError('Endpoint não encontrado', ['endpoint' => $request->url(), 'error' => 'not found'], 'error', 404);
            }
        });
    })->create();
