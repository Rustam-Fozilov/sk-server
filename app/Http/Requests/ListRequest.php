<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'per_page'        => 'nullable|integer|min:1,max:1000',
            'page'            => 'nullable|integer',
            'search'          => 'nullable|string',
            'order_by'        => 'nullable|string',
            'order_direction' => 'nullable|string|in:asc,desc',
        ];
    }
}
