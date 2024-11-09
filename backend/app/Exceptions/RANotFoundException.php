<?php

namespace App\Exceptions;

use Exception;

class RANotFoundException extends Exception
{
    public function __construct($message = "RA não encontrado", $code = 404)
    {
        parent::__construct($message, $code);
    }
}
