<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Authenticatable;

class UserService
{
    public function me(): ?Authenticatable
    {
        return auth()->user();
    }

    public function saved(array $params)
    {
        return auth()->user()->savedItems()->paginate($params['per_page'] ?? 15);
    }

    public function searchHistory(array $params)
    {
        return auth()->user()->searchHistory()->paginate($params['per_page'] ?? 15);
    }
}
