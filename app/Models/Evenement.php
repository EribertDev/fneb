<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evenement extends Model
{
  

    protected $fillable = [
        'titre',
        'description',
        'lieu',
        'date_heure',
        'statut',
        'type',
        'image'
    ];

    protected $casts = [
        'date_heure' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    // Relations éventuelles...
}