<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'editor_id',
        'status',
        'category',
       
        'publication_date'
    ];

    protected $casts = [
        'tags' => 'array',
        'publication_date' => 'datetime'
    ];

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('value');
    }

    public function hasRated(string $identifier): bool
    {
        return $this->ratings()->where('identifier', $identifier)->exists();
    }

    public function getExcerptAttribute()
{
    return Str::limit(strip_tags($this->content), 120);
}

public function scopePublished($query)
{
    return $query->where('status', 'published');
}
}
