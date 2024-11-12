<?php

namespace App\Enums;

enum AuthError: string
{
    case RANotFound = 'RA não encontrado';
    case IncorrectLogin = 'Login Incorreto';
}
