<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate(['rating' => 'required|integer|between:1,5']);

        $identifier = hash('sha256', 
            $request->ip() . 
            $request->userAgent() . 
            $post->id
        );
    
        
        if ($post->ratings()->where('identifier', $identifier)->exists()) {
            return redirect()->back()
                ->withErrors(['rating' => 'Vous avez déjà noté cet article'])
                ->withInput();
        }
        $post->ratings()->create([
            'value' => $request->rating,
            'identifier' => $identifier
        ]);
    
        return redirect()->back()
        ->with('success', 'Merci pour votre notation !');
    
    }
}