<?php

namespace App\Http\Requests\Search;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AddHistoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'searchable_type' => 'required|string',
            'searchable_id'   => 'required|integer',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        failedValidation($validator);
    }
}
