<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    //
    protected $fillable = [
        'name', 
        'position',
        'photo',
        'is_visible',
        'phone',
        'email'
    ];
}
