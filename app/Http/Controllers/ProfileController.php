<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view('layouts.profile');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
          
          
        ]);

        Auth::user()->update($validated);

        return back()->with('success', 'Profil mis à jour !');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $path = $request->file('profile_picture')->store('profile_picture', 'public');
        
        // Suppression ancienne photo
        if (Auth::user()->photo) {
            Storage::delete('public/' . Auth::user()->photo);
        }

        Auth::user()->update(['profile_picture' => $path]);

        return back()->with('success', 'Photo de profil mise à jour !');
    }
}
