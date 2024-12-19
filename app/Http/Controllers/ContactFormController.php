<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactForm\CreateRequest;
use App\Models\ContactForm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function store(CreateRequest $request): JsonResponse
    {
        ContactForm::query()->create($request->validated());
        return success();
    }
}
