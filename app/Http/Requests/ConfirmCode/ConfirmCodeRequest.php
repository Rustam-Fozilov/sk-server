<?php

namespace App\Http\Requests\ConfirmCode;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ConfirmCodeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'code' => 'required|size:6',
        ];
    }
}
