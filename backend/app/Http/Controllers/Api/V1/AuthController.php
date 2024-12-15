<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\{AdminLoginRequest, StudentLoginRequest};
use App\UseCases\Auth\{GetUser, LoginAdmin, LoginStudent, Logout, CheckAuthentication};

class AuthController extends Controller
{
    public function __construct(
        private LoginStudent $loginStudent,
        private LoginAdmin $loginAdmin,
        private CheckAuthentication $checkAuthentication,
        private GetUser $getUser,
        private Logout $logout
    ) {}

    public function loginStudent(StudentLoginRequest $request): JsonResponse
    {
        $result = $this->loginStudent->execute($request->RA);

        if ($result->isError()) {

            return jsonError($result->getErrorMessage(), [], 'warning', $result->getErrorCode());
        }

        return json($result->getValue());
    }

    public function loginAdmin(AdminLoginRequest $request): JsonResponse
    {
        $result = $this->loginAdmin->execute(
            $request->email,
            $request->password
        );

        if ($result->isError()) {
            return jsonError($result->getErrorMessage(), [], 'warning', $result->getErrorCode());
        }

        return json($result->getValue());
    }

    public function check(): JsonResponse
    {
        return json([
            'check' => $this->checkAuthentication->execute(),
            'user' => $this->getUser->execute()->entityResource()
        ]);
    }

    public function me(): JsonResponse
    {
        return json($this->getUser->execute()->entityResource());
    }

    public function logout(): void
    {
        $this->logout->execute();
    }
}
