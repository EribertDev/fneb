@extends('master')
@section('title') Autre @endsection
@section('extra-style')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">


<style>

    .option-card {
            cursor: pointer;
            border: 2px solid #dee2e6;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
    
        .option-card:hover:not(.active-option) {
            transform: translateY(-3px);
            border-color:  #1A3D7C;
            box-shadow: 0 4px 15px rgba(63, 38, 204, 0.1);
        }
    
        .active-option {
            border-color:  #4D8EFF !important;
            background: rgba(212, 175, 55, 0.05);
            transform: translateY(-3px);
        }
    
        .form-check-input {
            width: 1.3em;
            height: 1.3em;
            margin-top: 0;
        }
    
        .form-check-input:checked {
            background-color: #4D8EFF;
            border-color:  #4D8EFF;
        }
    
        .check-icon {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.3s ease;
        }
    
        .active-option .check-icon {
            opacity: 1;
            transform: scale(1);
        }
        .text-gold-200 {
            color: rgba(55, 65, 212, 0.8);
        }
        
        @keyframes pulse-gold {
            0% { box-shadow: 0 0 0 0 rgba(114, 194, 240, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(97, 30, 184, 0); }
            100% { box-shadow: 0 0 0 0 rgba(5, 14, 153, 0); }
        }
        
        .voted-badge {
            animation: pulse-gold 2s infinite;
        }


        :root {
        --fneb-blue: #1A3D7C;
        --fneb-light-blue: #4D8EFF;
    }

    .bg-fneb {
        background: linear-gradient(90deg, var(--fneb-blue), var(--fneb-light-blue));
    }

    .progress {
        border-radius: 15px;
        overflow: hidden;
        background-color: #f0f4f9;
        box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    }

    .progress-bar {
        position: relative;
        transition: width 0.5s ease-in-out;
    }

    .progress-text {
        position: absolute;
        left: 10px;
        font-weight: 600;
        color: white;
        text-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }
    </style>
    
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Autre</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Acceuil</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page" href="{{route('sondages')}}" >Sondages</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

        <!-- En-tête FNEB -->
        <div class="text-center mb-5">
            <img src="{{asset('img/fneb-logo.png')}}" alt="FNEB Logo" class="mb-3" style="height: 80px;">
            <h1 class="display-5 fw-bold text-primary">Sondages Étudiants</h1>
            <p class="lead">Votre voix compte pour la communauté étudiante !</p>
        </div>
    
       <!-- Liste des sondages -->
<div class="container mx-auto px-4 py-8">
    @forelse($polls as $poll)
    <div class="bg-white rounded-xl shadow-2xl mb-8 overflow-hidden transition-all duration-300 hover:shadow-lg">
        <!-- En-tête du sondage -->
        <div class="p-6 border-b-2 border-blue-100 bg-gradient-to-r from-[#1A3D7C] to-[#4D8EFF]">
            <h2 class="text-2xl font-bold text-primary">{{ $poll->question }}</h2>
            <div class="flex items-center mt-2 text-sm text-blue-100">
                <span class="mr-4">📅 {{ $poll->end_at ? 'Clôture : '.$poll->end_at->translatedFormat('d M Y H:i') : 'Durée illimitée' }}</span>
                <span>🗳 {{ $poll->votes_count }} participations</span>
            </div>
        </div>

        @if(!$poll->hasVoted(request()->cookie('voted_polls')))
        <!-- Formulaire de vote -->
        <form method="POST" action="{{ route('polls.vote', $poll) }}" class="p-6">
            @csrf
            <div class="space-y-4 mb-6">
                <div class="row g-3">
                    @foreach($poll->options as $option)
                    <div class="col-12 col-md-6">
                        <div class="card option-card shadow-sm hover:shadow-md transition-all">
                            <label class="card-body d-flex align-items-center cursor-pointer m-0">
                                <div class="form-check me-3">
                                    <input 
                                        type="radio" 
                                        name="option_id" 
                                        value="{{ $option->id }}" 
                                        class="form-check-input"
                                        required>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="mb-0 text-[#1A3D7C]">{{ $option->text }}</h5>
                                </div>
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <button 
                type="submit" 
                class="w-full py-3 bg-gradient-to-r from-[#1A3D7C] to-[#4D8EFF] text-white font-semibold rounded-lg hover:opacity-90 transition-opacity"
            >
                Valider mon vote 🗳
            </button>
        </form>
        @else
        <!-- Résultats -->
        <div class="p-6">
            <div class="space-y-4">
                @foreach($poll->options as $option)
                <div class="relative pt-4">
                    <div class="flex justify-between mb-1">
                        <span class="text-[#1A3D7C] font-medium">{{ $option->text }}</span>
                        <span class="text-[#4D8EFF] font-bold">{{ $option->percentage }}%</span>
                    </div>
                                                   <!-- Barre de progression -->
                                                   <div class="progress flex-grow-1" style="height: 40px;">
                                                    <div class="progress-bar bg-fneb" 
                                                         role="progressbar" 
                                                         style="width: {{ $option->percentage }}%" 
                                                         aria-valuenow="{{ $option->percentage }}" 
                                                         aria-valuemin="0" 
                                                         aria-valuemax="100">
                                                        <span class="progress-text">{{ $option->percentage }}%</span>
                                                    </div>
                                                </div>
                    <div class="text-right text-sm text-gray-600 mt-1">
                        {{ $option->votes_count }} votes
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-6 text-center text-[#1A3D7C] font-semibold">
                ✅ Merci pour votre participation !
            </div>
        </div>
        @endif
    </div>
    @empty
    <div class="text-center py-12">
        <div class="text-2xl text-[#1A3D7C] mb-4">📢 Aucun sondage en cours</div>
        <p class="text-[#4D8EFF]">Revenez prochainement pour donner votre avis !</p>
    </div>
    @endforelse
</div>
    </div
 
      

@endsection


@section('extra-script')
   

@endsection