<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $table = 'contact_forms';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'message',
    ];
}
