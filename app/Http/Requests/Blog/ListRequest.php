<?php

namespace App\Http\Requests\Blog;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'per_page'  => 'nullable|integer|min:1,max:1000',
            'page'      => 'nullable|integer',
            'search'    => 'nullable|string',
            'tag'       => 'nullable|exists:tags,id',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        failedValidation($validator);
    }
}
