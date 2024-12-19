<?php

namespace App\Http\Requests\ContactForm;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'    => 'required|string',
            'email'   => 'nullable|email',
            'phone'   => 'required|regex:/^(998)([0-9]{9})$/',
            'message' => 'required|string',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        failedValidation($validator);
    }
}
