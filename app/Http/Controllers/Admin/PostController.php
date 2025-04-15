<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Support\Facades\Storage;

use App\Policies\PostPolicy;
use HTMLPurifier;
use HTMLPurifier_Config;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::with('editor')
       ->where('editor_id', auth()->id())
       ->latest('publication_date')
       ->paginate(9);

        return view('admin.blog.index', compact('posts'));
    }

    public function indexBlog() {
        
        
        $posts = Post::query()
        ->with(['editor', 'comments'])
        ->when(request('search'), function($query) {
            $query->where('title', 'like', '%'.request('search').'%')
                  ->orWhere('content', 'like', '%'.request('search').'%');
        })
        ->when(request('category'), function($query) {
            $query->where('category', request('category'));
        })
        ->published()
        ->orderBy('publication_date', 'desc')
        ->withCount('comments')
        ->paginate(6);

    $popularPosts = Post::withCount('comments')
        ->orderByDesc('comments_count')
        ->limit(5)
        ->get();

return view('layouts.blog', compact('posts', 'popularPosts'));
    }

    public function showPost(Post $post) {
        $identifier = Rating::generateIdentifier();
    
        return view('layouts.post-details', [
            'post' => $post->load(['editor', 'comments.user']),
            'averageRating' => $post->ratings()->avg('value'),
            'ratingsCount' => $post->ratings()->count(),
            'hasRated' => $post->ratings()->where('identifier', $identifier)->exists(),
            'comments' => $post->comments()->paginate(10),
            'relatedPosts' => Post::where('category', $post->category)
                ->where('id', '!=', $post->id)
                ->limit(3)
                ->get()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.blog.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:sante,academique,emploi,culture,logement,evenements,transport,restauration,autre',
            'image' => 'nullable|image',
        ]);
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $validated['content'] = $purifier->purify($request->content);

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' =>  $validated['content'] ,
            'editor_id' => auth()->id(),
            'category' => $request->category,
            'status' => 'published',
            'tags' => $request->tags ? json_encode(explode(',', $request->tags)) : null,
            'image' => $request->file('image') ? $request->file('image')->store('posts') : null,
        ]);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
       
        return view('admin.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
      
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|in:draft,published,archived',
        ]);
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        
        //  purifies le contenu ici
        $validated = $request->only(['title', 'status']);
        $validated['content'] = $purifier->purify($request->content);
        if ($request->hasFile('image')) {
            Storage::delete($post->image);
            $post->image = $request->file('image')->store('posts', 'public');
        }
    
        // la mise à jour avec les données validées et purifiées
        $post->update($validated);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
       
        $post->delete();
        return redirect()->route('posts.index');
    }
}
