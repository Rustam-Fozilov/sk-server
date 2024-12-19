<?php

namespace App\Services;

use Carbon\Carbon;

class AuthService
{
    public function login(array $credentials): string
    {
        if (!auth()->attempt($credentials)) throwError(__('auth.failed'), 401);
        return request()->user()->createToken('accessToken', expiresAt: Carbon::now()->addDay())->plainTextToken;
    }
}
