<?php

namespace App\Http\Requests\Saved;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'saveable_type' => 'required|string',
            'saveable_id'   => 'required|integer',
        ];
    }
}
