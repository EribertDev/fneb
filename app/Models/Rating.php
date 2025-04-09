<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'post_id', 'identifier'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public static function generateIdentifier(): string
    {
        return hash('sha256', Request::ip() . Request::userAgent());
    }

    protected static function booted()
    {

        static::creating(function ($rating) {
            // Empêche les doublons
            if (static::where('post_id', $rating->post_id)
                ->where('identifier', $rating->identifier)
                ->exists()) {
                return false;
            }
        });
    }



// User.php
public function getAvatarUrlAttribute()
{
    return $this->avatar 
        ? asset('storage/'.$this->avatar)
        : asset('images/default-avatar.png');
}
}