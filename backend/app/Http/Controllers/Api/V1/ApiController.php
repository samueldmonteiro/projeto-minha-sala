<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function user(): User|null
    {
        if (auth('student')->check()) return auth('student')->user();
        if (auth('admin')->check()) return auth('admin')->user();

        return null;
    }
}
