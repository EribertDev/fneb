@extends('master')
@section('title')
    Événements
@endsection
@section('extra-style')
<style>
        .badge {
        position: absolute;
        top: 15px;
        left: 15px;
        padding: 5px 15px;
        border-radius: 20px;
       
        font-size: 0.9rem;
    }
    .badgee {
        position: absolute;
        top: 15px;
        right: 1px;
        padding: 5px 15px;
        border-radius: 20px;
       
        font-size: 0.9rem;
    }
    .event-card {
        border-radius: 1rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(37, 99, 235, 0.15);
    }
    
    .bg-gradient {
        background: linear-gradient(135deg, var(--fneb-primary) 0%, var(--fneb-secondary) 100%);
    }
    
    .bg-primary-transparent {
        background-color: rgba(37, 99, 235, 0.1);
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .btn-primary-gradient {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        border: none;
        color: white;
        transition: all 0.3s ease;
    }
    
    .btn-primary-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
    }
    
    :root {
        --fneb-primary: #2563eb;
        --fneb-secondary: #1e40af;
    }
    </style>
@endsection
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Événements</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Acceuil</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page" href="{{route('evenements')}}" >Événements</li>  
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container-fluid px-4 py-5" style="background: #f8fafc;">
        <!-- Filtres -->
        <div class="row mb-4 g-3">
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <a  href="{{route('evenements')}}" class="btn btn-outline-primary rounded-pill">Tous</button>
                    <a  href="?type=conference"  class="btn btn-outline-primary rounded-pill">Conférences</a>
                    <a href="?type=atelier" class="btn btn-outline-primary rounded-pill">Ateliers</a>
                    <a href="?type=seminaire" class="btn btn-outline-primary rounded-pill">Seminaires</a>
                    <a href="?type=autre" class="btn btn-outline-primary rounded-pill">Autre</a>

                </div>

            </div>
        </div>
    
        <!-- Liste des événements -->
        <div class="row g-4">
            @foreach($evenements as $evenement)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="event-card card border-0 shadow-sm h-100 overflow-hidden transition-all">
                    <!-- Image -->
                    <div class="event-image position-relative" style="height: 250px;">
                        <img src="{{ asset('storage/' . $evenement->image) }}" 
                             class="img-fluid w-100 h-100 object-fit-cover"
                             alt="{{ $evenement->titre }}">
                        
                        <!-- Badge Statut -->
                        <div class="">
                            <span class="badgee rounded-pill bg-gradient 
                                @if($evenement->statut === 'a_venir') bg-warning
                                @elseif($evenement->statut === 'termine') bg-success
                                @else bg-danger @endif">
                                {{ ucfirst($evenement->statut) }}
                            </span>
                        </div>
                    </div>
    
                    <!-- Contenu -->
                    <div class="card-body">
                        <!-- Type -->
                        <span class="badge rounded-pill bg-primary-transparent text-primary mb-2 ">
                            {{ $evenement->type }}
                        </span>
                        
                        <h3 class="h5 fw-bold mb-3">{{ $evenement->titre }}</h3>
                        
                        <!-- Métadonnées -->
                        <div class="d-flex flex-column gap-2 text-muted">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-calendar-day text-primary"></i>
                                {{ $evenement->date_heure->format('d M Y - H:i') }}
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                {{ $evenement->lieu }}
                            </div>
                        </div>
    
                        <!-- Bouton Détails -->
                        <div class="mt-4">
                            <a href="{{ route('evenements.show', $evenement->id) }}" 
                               class="btn btn-primary-gradient w-100 rounded-pill py-2 fw-bold">
                                Voir détails <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>









@endsection

@section('extra-script')


@endsection