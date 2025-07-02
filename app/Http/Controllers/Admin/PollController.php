<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Vote;
use Illuminate\Support\Facades\Cookie;



class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

          $polls = Poll::where('is_public', true)
            ->withCount('options')
            ->paginate(10);

        return view('admin.polls.index', [
            'polls' => $polls,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.polls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    
        $poll = Poll::create([
            'question' => $request->question,
            'status' => $request->status,
            'end_at' => $request->end_at,
            'is_public' => $request->boolean('is_public')
        ]);
        foreach ($request->options as $option) {
            $poll->options()->create(['text' => $option]);
        }

        return redirect()->route('admin.polls.index')->with('success', 'Sondage créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poll $poll)
    {
        //
        
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poll $poll)
    {
        //
        return view('admin.polls.edit', [
            'poll' => $poll->load('options')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poll $poll)
    {
        //
         DB::transaction(function () use ($poll) {
        // 1. Supprimer tous les votes pour ce sondage
        Vote::whereIn('poll_option_id', $poll->options()->pluck('id'))->delete();
        
        // 2. Supprimer les options
        $poll->options()->delete();
        
        // 3. Supprimer le sondage
        $poll->delete();

    });
        
    
        return back()->with('success', 'Sondage archivé !');
    }


    
public function indexPolls()
{
    //
    $polls = Poll::where('is_public', true)
    ->where('status', 'active')
    ->withCount('options')
    ->paginate(5);

    $voterHash = request()->cookie('voterHash');


return view('layouts.sondages', compact('polls','voterHash'));

  
}

public function updatePercentages(Poll $poll)
{
    return response()->json([
        'percentages' => $poll->options->mapWithKeys(fn($option) => [
            $option->id => $option->percentage
        ])
    ]);
}

}
