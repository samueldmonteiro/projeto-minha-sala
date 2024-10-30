<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegister extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:60'],
            'email' => ['required', 'email', 'max:60'],
            'password' => ['required', 'string', 'min:4', 'max:1000'],
            'course' => ['required', 'string', 'max:70'],
            'shift' => ['required', 'string', 'max:70'],
            'semester' => ['required', 'string', 'max:70'],
        ];
    }
}
