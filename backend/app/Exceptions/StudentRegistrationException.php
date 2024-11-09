<?php

namespace App\Exceptions;

use Exception;

class StudentRegistrationException extends Exception
{
    public function __construct($message = "Erro ao cadastrar, tente novamente!", $code = 500)
    {
        parent::__construct($message, $code);
    }
}
