<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class University extends Model
{
    use HasFactory;

    protected $table = 'universities';

    protected $fillable = [
        'name',
        'address',
        'website',
        'info',
        'image_link',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function likes(): MorphMany
    {
        return $this->morphMany(Liked::class, 'likeable');
    }
}
