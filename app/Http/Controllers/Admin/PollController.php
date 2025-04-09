<?php

namespace App\Http\Controllers\Admin;

use App\Models\Poll;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.polls.index', [
            'polls' => Poll::public()->active()->withCount('options')->paginate(10)
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
        return view('polls.show', [
            'poll' => $poll->load('options.votes')
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poll $poll)
    {
        //
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
    }


    
public function indexPolls()
{
    //
    $polls = Poll::where('is_public', true)
    ->where('status', 'active')
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
