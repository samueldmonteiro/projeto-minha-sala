<?php

namespace App\Exceptions;

use Exception;

class AdminRegistrationException extends Exception
{
    public function __construct($message = "Erro ao registrar admin", $code = 500)
    {
        parent::__construct($message, $code);
    }
}
