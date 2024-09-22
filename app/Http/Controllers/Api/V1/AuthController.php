<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends ApiController
{

    public function loginStudent(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $student = Student::whereHas('user', function ($query) use ($credentials) {
            $query->where('email', $credentials['email']);
        })->first();

        if (!$student || !Hash::check($credentials['password'], $student->user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = JWTAuth::fromUser($student);

        return $this->json($this->respondWithToken($token), 'ACCESS TOKEN JWT');
    }

    public function loginAdmin(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $admin = Admin::whereHas('user', function ($query) use ($credentials) {
            $query->where('email', $credentials['email']);
        })->first();

        if (!$admin || !Hash::check($credentials['password'], $admin->user->password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = JWTAuth::fromUser($admin);

        return $this->json($this->respondWithToken($token), 'ACCESS TOKEN JWT');
    }

    public function me()
    {
        return response()->json(['me' => $this->user()], 200);
    }


    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            #'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
