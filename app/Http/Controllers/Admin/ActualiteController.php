<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use HTMLPurifier;
use HTMLPurifier_Config;


class ActualiteController extends Controller
{
    public function index()
    {
        $actualites = Actualite::latest()->paginate(10);
        return view('admin.news.index', compact('actualites'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'subtitre' => 'nullable|max:255',
            'contenu' => 'required',
            'status' => 'required|in:draft,published,archived',
            'type' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('actualites', 'public');
        }
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $validated['contenu'] = $purifier->purify($request->contenu);
        Actualite::create($validated);

        return redirect()->route('admin.actualites.index')
                         ->with('success', 'Actualité créée avec succès');
    }

    public function edit(Actualite $actualite)
    {
        return view('admin.news.edit', compact('actualite'));
    }

    public function update(Request $request, Actualite $actualite)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'subtitre' => 'nullable|max:255',
            'contenu' => 'required',
             'status' => 'required|in:draft,published,archived',
            'type' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($actualite->image) {
                Storage::disk('public')->delete($actualite->image);
            }
            $validated['image'] = $request->file('image')->store('actualites', 'public');
        }
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $validated['contenu'] = $purifier->purify($request->contenu);
        $actualite->update($validated);

        return redirect()->route('admin.actualites.index')
                         ->with('success', 'Actualité mise à jour avec succès');
    }

    public function destroy(Actualite $actualite)
    {
        if ($actualite->image) {
            Storage::disk('public')->delete($actualite->image);
        }
        
        $actualite->delete();
        
        return redirect()->route('admin.news.index')
                         ->with('success', 'Actualité supprimée avec succès');
    }





public function indexNews()
{
    //
    $news = Actualite::where('status', 'published')
    ->latest()
    ->paginate(6);

    return view('layouts.actualites', compact('news'));
}




public function show(string $id)
{
    //
    $news = Actualite::findOrFail($id);

    // Articles connexes (même type)
    $relatedNews = Actualite::where('type', $news->type)
        ->where('id', '!=', $id)
        ->where('status', 'published')
        ->latest()
        ->take(2)
        ->get();

    return view('layouts.actualites-detail', compact('news', 'relatedNews'));
}

}