<?php

namespace App\Http\Requests\Saved;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SaveRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'saveable_type' => 'required|string',
            'saveable_id'   => 'required|integer',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        failedValidation($validator);
    }
}
