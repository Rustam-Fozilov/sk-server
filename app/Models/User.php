<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'is_admin',
        'chat_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function savedItems()
    {
        return $this->hasMany(Saved::class, 'user_id', 'id')->with('saveable')->orderByDesc('id');
    }

    public function likedItems()
    {
        return $this->hasMany(Liked::class, 'user_id', 'id')->with('likeable')->orderByDesc('id');
    }

    public function searchHistory()
    {
        return $this->hasMany(SearchHistory::class, 'user_id', 'id')->with('searchable')->orderByDesc('searched_at');
    }

    public function confirmCodes(): HasMany
    {
        return $this->hasMany(ConfirmCode::class, 'user_id', 'id');
    }

    public function lastConfirmCode(): HasOne
    {
        return $this->hasOne(ConfirmCode::class, 'user_id', 'id')->latest();
    }
}
