<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class SearchHistory extends Model
{
    protected $table = 'search_histories';
    protected $guarded = ['id'];

    public function searchable(): MorphTo
    {
        return $this->morphTo();
    }
}
