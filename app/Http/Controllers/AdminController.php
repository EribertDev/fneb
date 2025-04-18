<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    // Afficher le tableau de bord administrateur
    public function dashboard()
        {
            if (Auth::check() && Auth::user()->role === 'admin') {
                $users = User::all();
                return view('admin.members.index', compact('users'));
            }

            return redirect('/')->with('error', 'Accès refusé : vous devez être un administrateur.');
        }

    // Afficher le formulaire de création d'utilisateur
    public function createUser()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('admin.users.create');
        }

        return redirect('/')->with('error', 'Accès refusé : vous devez être un administrateur.');
    }

    // Enregistrer un nouvel utilisateur
    public function storeUser(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|in:admin,editor,user',
                'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg',
            ]);

            $path = $request->file('profile_picture') ? $request->file('profile_picture')->store('profile_pictures', 'public') : null;

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'profile_picture' => $path,
            ]);

            return redirect()->back()->with('success', 'Utilisateur créé avec succès.');
        }

        return redirect('/')->with('error', 'Accès refusé : vous devez être un administrateur.');
    }

    public function editUser(User $user)
    {
       return response()->json($user);
    }

    public function updateUser(Request $request, $id) {
        $user = User::findOrFail($id);
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|sometimes|min:8', // Modifié
            'role' => 'required|string',
            'profile_picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        $updateData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role']
        ];
    
        // Ne mettez à jour le password que si fourni
        if (!empty($validatedData['password']) && $validatedData['password'] !== 'undefined') {
            $updateData['password'] = Hash::make($validatedData['password']);
        }
    
        // Gestion de l'image
        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $updateData['profile_picture'] = $path;
            
            // Suppression ancienne image SI la nouvelle est valide
            if ($user->profile_picture) {
                Storage::delete('public/'.$user->profile_picture);
            }
        }
    
        if ($user->update($updateData)) {
            logger()->debug('Mise à jour réussie', $updateData);
        } else {
            logger()->error('Échec de la mise à jour');
        }
    
        return redirect()->back()->with('success', 'Profil mis à jour');
    }

    public function destroyUser(User $user) {
        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }
}