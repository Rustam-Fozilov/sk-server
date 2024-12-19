<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        return $this->hasMany(Saved::class, 'user_id')->with('saveable');
    }

    public function searchHistory()
    {
        return $this->hasMany(SearchHistory::class, 'user_id')->with('searchable');
    }
}
