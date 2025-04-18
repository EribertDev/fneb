<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Actualite extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'titre',
        'contenu',
        'image',
        'subtitre',
        'type',
        'status',

       
       
    ];

    protected $dates = [
       
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
