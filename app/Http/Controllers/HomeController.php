<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Comment;
use App\Models\Evenement;
use App\Models\Poll;
use App\Models\PollOption;
use App\Models\Post;
use App\Models\Rating;
use App\Models\Vote;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $latestActualites = Actualite::where('status', 'published')->latest()->paginate(5);
        $latestEvenements = Evenement::where('statut', 'a_venir')->latest()->take(3)->get();
        $latestPosts = Post::where('status', 'published')->latest()->paginate(5);
        $popularPosts = Post::withCount('comments')->orderByDesc('comments_count')->limit(5)->get();
        $latestPoll = Poll::where('status', 'active')->latest()->take(2)->get();
        return view('layouts.home', compact('latestActualites', 'latestEvenements', 'latestPosts', 'popularPosts', 'latestPoll'));
    }
}
