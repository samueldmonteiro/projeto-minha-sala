<?php

namespace App\Http\Requests;

class StudentRegisterRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'RA' => 'required|string|max:100',
            'course' => 'required|string|max:100',
            'semester' => 'required|integer|max:20',
        ];
    }
}
