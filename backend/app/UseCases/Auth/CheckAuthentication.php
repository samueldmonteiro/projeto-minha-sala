<?php

namespace App\UseCases\Auth;

use Illuminate\Support\Facades\Auth;

class CheckAuthentication
{
    public function execute(): bool
    {
        return Auth::check();
    }
}
