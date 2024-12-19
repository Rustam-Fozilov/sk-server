<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $service,
    )
    {
    }

    public function login(Request $request): JsonResponse
    {
        $token = $this->service->login($request->only('phone', 'password'));

        return success([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
}
