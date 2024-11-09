<?php

namespace App\Exceptions;

use Exception;

class StudentLoginException extends Exception
{
    public function __construct($message = "Acesso negado", $code = 500)
    {
        parent::__construct($message, $code);
    }
}
