<?php

namespace App\Http\Requests;

use App\Http\Controllers\Api\V1\ApiController;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $error = (new ValidationException($validator))->errors();
        throw new HttpResponseException(

            (new ApiController())->jsonError(
                (new ValidationException($validator))->getMessage(),
                $error
            )
        );

        parent::failedValidation($validator);
    }
}
