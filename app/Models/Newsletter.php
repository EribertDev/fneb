<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'token'];
    
    public static function generateToken()
    {
        return hash('sha256', uniqid());
    }

    protected static function booted()
    {
        static::creating(function ($subscriber) {
            $subscriber->token = self::generateToken();
        });
    }
}
