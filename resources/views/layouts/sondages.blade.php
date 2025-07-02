@extends('master')
@section('title') Autre @endsection
@section('extra-style')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">


<link rel="stylesheet" href="{{ asset('css/sondages.css') }}">
@endsection

@section('content')
    <!-- Header Start -->
      <!-- Header -->
    <div class="header">
        <div class="header-content">
            <div class="logo-container">
                <img src="{{asset('img/fneb-logo.png')}}" alt="FNEB Logo" class="logo">
            </div>
            <h1 class="header-title">Sondages Étudiants</h1>
            <p class="header-subtitle">Votre voix compte pour la communauté étudiante !</p>
            
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}" class="breadcrumb-link">Accueil</a>
                </li>
                
                <li class="breadcrumb-item">
                    <a href="{{route('sondages')}}" class="breadcrumb-link">Sondages</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Header End -->

 <!-- Main Content -->
    <div class="container">
     
        <div class="sondages-container">
            @if(count($polls) > 0)
                @foreach($polls as $poll)
                <div class="sondage-card">
                    <div class="sondage-header">
                        <h2 class="sondage-title">{{ $poll->question }}</h2>
                        <div class="sondage-meta">
                            <div class="sondage-meta-item">
                                <i class="far fa-calendar-alt"></i>
                                <span>
                                    @if($poll->end_at)
                                        Clôture: {{ $poll->end_at->format('d M Y') }}
                                    @else
                                        Durée illimitée
                                    @endif
                                </span>
                            </div>
                            <div class="sondage-meta-item">
                                <i class="far fa-user"></i>
                                <span>{{ $poll->total_votes }} participations</span>
                            </div>
                        </div>
                    </div>
                    
                    @if(!$poll->hasVoted(request()->cookie('voted_polls')))
                    <form method="POST" action="{{ route('polls.vote', $poll) }}" class="sondage-body">
                        @csrf
                        <div class="options-grid">
                            @foreach($poll->options as $option)
                            <div class="option-card" onclick="selectOption(this, {{ $option->id }})">
                                <div class="option-radio"></div>
                                <div class="option-text">{{ $option->text }}</div>
                                <input type="radio" name="option_id" value="{{ $option->id }}" class="option-radio-input" style="display: none;" required>
                            </div>
                            @endforeach
                        </div>
                        
                        <button type="submit" class="vote-button">Valider mon vote</button>
                    </form>
                    @else
                    <div class="sondage-body">
                        <div class="results-container">
                            @foreach($poll->options as $option)
                            <div class="result-item">
                                <div class="result-header">
                                    <div class="result-text">{{ $option->text }}</div>
                                    <div class="result-percentage">{{ $option->percentage }}%</div>
                                </div>
                                <div class="progress-container">
                                    <div class="progress-bar" style="width: {{ $option->percentage }}%">
                                        <div class="progress-value">{{ $option->percentage }}%</div>
                                    </div>
                                </div>
                            
                            </div>
                            @endforeach
                            
                            <div class="thank-you">
                                <div class="thank-you-icon">✓</div>
                                <div class="thank-you-text">Merci pour votre participation !</div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            @else
            <div class="empty-polls">
                <h3>📢 Aucun sondage en cours</h3>
                <p>Revenez prochainement pour donner votre avis !</p>
            </div>
            @endif
        </div>
       
    </div>
    

 
      

@endsection


@section('extra-script')
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animation des barres de progression
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                
                setTimeout(() => {
                    bar.style.width = width;
                }, 300);
            });
            
            // Fonction de sélection d'option
            window.selectOption = function(card, optionId) {
                // Retire la sélection de toutes les options
                const allCards = card.parentElement.querySelectorAll('.option-card');
                allCards.forEach(c => c.classList.remove('selected'));
                
                // Ajoute la sélection à l'option cliquée
                card.classList.add('selected');
                
                // Coche le radio bouton correspondant
                const radioInput = card.querySelector('.option-radio-input');
                if (radioInput) {
                    radioInput.checked = true;
                }
            };
        });
    </script>

@endsection