<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Authenticatable;

class UserService
{
    public function me(): ?Authenticatable
    {
        return auth()->user();
    }
}
