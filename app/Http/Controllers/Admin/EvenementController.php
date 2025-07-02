<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Newsletter;
use Illuminate\Support\Str;
use App\Notifications\NewContentNotification;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::latest()->paginate(10);
        return view('admin.events.index', compact('evenements'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'lieu' => 'required|max:255',
            'date_heure' => 'required|date',
            'statut' => 'required|in:a_venir,termine,annule',
            'type' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('evenements', 'public');
        }

        $evenement=Evenement::create($validated);

        if ( $validated['statut']  === 'a_venir') {
            $subscribers = Newsletter::get();
            
            foreach ($subscribers as $subscriber) {
                $subscriber->notify(new NewContentNotification(
                    'événement',
                    $validated['titre'],
                    Str::limit(strip_tags( $validated['description']), 150),
                    route('evenements.show',$evenement->id)
                ));
            }
            
           
        }

        return redirect()->route('admin.evenements.index')
                         ->with('success', 'Événement créé avec succès');
    }

    public function edit(Evenement $evenement)
    {
        return view('admin.events.edit', compact('evenement'));
    }

    public function update(Request $request, Evenement $evenement)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'lieu' => 'required|max:255',
            'date_heure' => 'required|date',
            'statut' => 'required|in:a_venir,termine,annule',
            'type' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($evenement->image) {
                Storage::disk('public')->delete($evenement->image);
            }
            $validated['image'] = $request->file('image')->store('evenements', 'public');
        }

        $evenement->update($validated);

        return redirect()->route('admin.evenements.index')
                         ->with('success', 'Événement mis à jour avec succès');
    }

    public function destroy(Evenement $evenement)
    {
        if ($evenement->image) {
            Storage::disk('public')->delete($evenement->image);
        }
        
        $evenement->delete();
        
        return redirect()->route('admin.events.index')
                         ->with('success', 'Événement supprimé avec succès');
    }


    public function indexNews()
    {
        //
        $evenements = Evenement::query()
        ->when(request('type'), function($query) {
            $query->where('type', request('type'));
        })
            ->paginate(6);
        return view('layouts.evenements', compact('evenements'));
       
      
    }

    public function show(string $id)
{
    //
    $evenement = Evenement::findOrFail($id);

    

    return view('layouts.evenements-details', compact('evenement'));
}


    

}