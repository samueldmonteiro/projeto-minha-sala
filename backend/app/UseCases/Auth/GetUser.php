<?php

namespace App\UseCases\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GetUser
{
    public function execute(): ?User
    {
        return Auth::user();
    }
}