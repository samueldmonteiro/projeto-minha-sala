<?php

namespace App\Exceptions;

use Exception;

class AdminNotFoundException extends Exception
{
    public function __construct($message = "Admin não encontrado", $code = 404)
    {
        parent::__construct($message, $code);
    }
}
