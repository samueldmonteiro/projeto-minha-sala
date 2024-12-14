<?php

namespace App\Enums\ErrorTypes;

enum AuthError: string
{
    case RANotFound = 'RA não encontrado';
    case IncorrectLogin = 'Login Incorreto';
}
