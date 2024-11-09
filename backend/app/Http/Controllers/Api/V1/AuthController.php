<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\AdminLoginException;
use App\Exceptions\AdminNotFoundException;
use App\Exceptions\RANotFoundException;
use App\Exceptions\StudentLoginException;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Http\Requests\StudentLoginRequest;
use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(protected AuthService $authService) {}

    public function loginStudent(StudentLoginRequest $request): JsonResponse
    {
        try {
            $result = $this->authService->loginStudent($request->RA);
            return json($result);

        } catch (RANotFoundException $e) {
            return jsonError('RA não encontrado, efetue o cadastro para Acessar', [], 404);
        } catch (StudentLoginException $e) {
            return jsonError('Erro ao registrar, tente novamente!', [], 400);
        }
    }

    public function loginAdmin(AdminLoginRequest $request): JsonResponse
    {

        try {
            $result = $this->authService->loginAdmin(
                $request->email,
                $request->password
            );

            return json($result);
            
        } catch (AdminNotFoundException $e) {
            return jsonError($e->getMessage());
        } catch (AdminLoginException $e) {
            return jsonError($e->getMessage());
        }
    }

    public function check(Request $r): JsonResponse
    {
        return json(Auth::check());
    }

    public function me(Request $r): JsonResponse
    {
        return json(Auth::user()->entityResource());
    }

    public function logout(): void
    {
        $this->authService->logout();
    }
}
