<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConfirmCode\ConfirmCodeRequest;
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
        return success(['access_token' => $token]);
    }

    public function confirmCode(ConfirmCodeRequest $request): JsonResponse
    {
        $token = $this->service->confirmCode($request->validated());
        return success(['access_token' => $token]);
    }

    public function logout(): JsonResponse
    {
        $this->service->logout();
        return success();
    }
}
