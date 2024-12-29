<?php

namespace App\Services;

use App\Models\ConfirmCode;
use Carbon\Carbon;

class AuthService
{
    public function login(array $credentials): string
    {
        if (!auth()->attempt($credentials)) throwError(__('auth.failed'), 401);
        return request()->user()->createToken('accessToken', expiresAt: Carbon::now()->addDay())->plainTextToken;
    }

    public function confirmCode(array $data): string
    {
        $code = (new CheckService())->checkByKeyValue(ConfirmCode::query(), 'code', $data['code'], __('auth.code_invalid'), true);
//        $code->update(['is_used' => true]);
        return $code->user->createToken('accessToken')->plainTextToken;
    }

    public function logout(): void
    {
        auth()->user()->currentAccessToken()->delete();
    }
}
