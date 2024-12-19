<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConfirmCode extends Model
{
    protected $fillable = [
        'user_id',
        'code',
        'is_used'
    ];

    public function scopeActive($query)
    {
        return $query->where('is_used', false);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
