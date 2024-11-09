<?php

namespace App\Exceptions;

use Exception;

class CourseNotFoundException extends Exception
{
    public function __construct($message = "Curso não encontrado", $code = 404)
    {
        parent::__construct($message, $code);
    }
}
