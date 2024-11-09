<?php

namespace App\Exceptions;

use Exception;

class StudentNotFoundException extends Exception
{
    public function __construct($message = "Registro de estudante não encontrado", $code = 404)
    {
        parent::__construct($message, $code);
    }
}
