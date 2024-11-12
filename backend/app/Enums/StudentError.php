<?php

namespace App\Enums;

enum StudentError: string
{
    case StudentNotFound = 'Registro não encontrado';
    case CourseNotFound = 'Curso não encontrado';
    case RADuplicated = 'RA já está cadastrado';
    case RegisterFail = 'Erro ao registrar';


}
