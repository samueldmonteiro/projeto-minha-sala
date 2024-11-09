<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassInformationGetByDayRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'day' => '|string|max:15'
        ];
    }
}
