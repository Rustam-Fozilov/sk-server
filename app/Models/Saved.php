<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Saved extends Model
{
    protected $table = 'saved';
    protected $guarded = ['id'];

    public function saveable(): MorphTo
    {
        return $this->morphTo();
    }
}
