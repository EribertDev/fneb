<?php


    namespace App\Http\Controllers;

    use App\Models\Poll;
    use App\Models\PollOption;
    use Illuminate\Support\Str;

    use App\Models\Vote;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;

    
    class VoteController extends Controller
    {
        public function vote(Request $request, Poll $poll)
    {
        if (!$poll->isActive()) {
            return back()->with('error', 'Ce sondage est clos');
        }
    
        $request->validate(['option_id' => 'required|exists:poll_options,id']);
    
        // Génération du hash UNIQUE par sondage
        $voterHash = $this->generateVoterHash($request, $poll->id);
    
        if ($poll->votes()->where('voter_hash', $voterHash)->exists()) {
            return back()->with('error', 'Vous avez déjà voté à ce sondage');
        }
    
        // Enregistrement du vote
        Vote::create([
            'poll_option_id' => $request->option_id,
            'voter_hash' => $voterHash
        ]);
    
        // Mise à jour du cookie AVEC vérification
        $votedPolls = json_decode($request->cookie('voted_polls', '[]'), true);
        
        if (!in_array($poll->id, $votedPolls)) {
            $votedPolls[] = $poll->id;
        }
    
        return back()
            ->with('success', 'Vote enregistré !')
            ->cookie('voted_polls', json_encode($votedPolls), 525600);  }

        private function generateVoterHash(Request $request): string
        {
            return Hash::make(
                $request->ip() . 
                Str::limit($request->userAgent(), 255) . 
               
                config('app.key')
            );
        }
    }

