<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::check() && Auth::user()->role === 'admin') {
            $users = User::all();
            $members = Member::all();

           return view('admin.members.index', compact('users', 'members'));
        }

        return redirect('/')->with('error', 'Accès refusé : vous devez être un administrateur.');
    }

    /**
     * Show the form for creating a new resource.
     */
  
        //
        public function create()
        {
            return view('admin.members.create');
        }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone'=>'required|string|max:20',
            'email' => 'required|email|max:255|unique:members,email',
            'position' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
            'is_visible' => 'sometimes'
        ]);

        $imagePath = $request->file('photo')->store('members', 'public');

        Member::create([
            'name' => $request->name,
            'position' => $request->position,
            'phone' => $request->phone,
            'email' => $request->email,
            'photo' => $imagePath,
            'is_visible' => $request->has('is_visible')
        ]);

        return redirect()->route('members.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
        return view('admin.members.edit', compact('member'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:members,email,'.$member->id,
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_visible' => 'sometimes'
        ]);

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo
            Storage::delete('public/'.$member->photo);
            
            $imagePath = $request->file('photo')->store('members', 'public');
            $member->photo = $imagePath;
        }

        $member->update([
            'name' => $request->name,
            'position' => $request->position,
            'phone' => $request->phone,
            'email' => $request->email,
            'is_visible' => $request->has('is_visible')
        ]);

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
        Storage::delete('public/'.$member->photo);
        $member->delete();
        return back();
    }
}
