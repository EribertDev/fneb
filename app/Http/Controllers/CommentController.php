<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $post->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Commentaire ajouté !');
    }

    public function destroy(Comment $comment)
    {
      
        $comment->delete();
        return back()->with('success', 'Commentaire supprimé !');
    }
}