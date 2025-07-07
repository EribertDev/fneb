@extends('master')
@section('title')
    Events Details
@endsection

@section('extra-style')
<style>
    .event-hero {
        height: 70vh;
        min-height: 500px;
        overflow: hidden;
    }
    
    .gradient-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0) 40%, rgba(0,0,0,0.8) 100%);
        z-index: 1;
    }
    
    .hero-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .hero-content {
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 2;
        padding: 4rem 0;
    }
    
    .bg-gradient {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    }
    
    .btn-primary-gradient {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
    }
    
    .gallery-item {
        transition: transform 0.3s ease;
        cursor: pointer;
    }
    
    .gallery-item:hover {
        transform: scale(1.05);
    }
    
    .timeline {
        position: relative;
        padding-left: 30px;
    }
    
    .timeline-item {
        position: relative;
        padding-bottom: 20px;
    }
    
    .timeline-badge {
        position: absolute;
        left: -15px;
        top: 0;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #dee2e6;
    }
    
    .timeline-content {
        padding-left: 25px;
        border-left: 2px solid #dee2e6;
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
                                <li class="breadcrumb-item text-white active" aria-current="page" href="{{route('evenements')}}" >Événements Details</li>  
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->



<div class="container-fluid px-0">
    <!-- Hero Section -->
    <div class="event-hero position-relative">
        <div class="gradient-overlay"></div>
        <img src="{{ asset('storage/' . $evenement->image) }}" 
             class="hero-image" 
             alt="{{ $evenement->titre }}">
        
        <div class="hero-content position-absolute text-white">
            <div class="container">
                <div class="row g-4 align-items-end">
                    <div class="col-lg-8">
                        <!-- Badge Statut -->
                        <span class="badge rounded-pill bg-gradient mb-3  @if ($evenement->statut === 'a_venir') bg-warning
                            @elseif ($evenement->statut === 'termine') bg-success
                            @else bg-danger @endif">
                            {{ ucfirst($evenement->statut) }}

                            
                       
                          
                        </span>
                        <h1 class="display-4 fw-bold mb-3">{{ $evenement->titre }}</h1>
                        <div class="d-flex flex-wrap gap-4 fs-5">
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-calendar-alt"></i>
                                {{ $evenement->date_heure->format('d M Y - H:i') }}
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $evenement->lieu }}
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu Principal -->
    <div class="container py-5">
        <div class="row g-5">
            <!-- Colonne Gauche -->
            <div class="col-lg-8">
                <!-- Description -->
                <section class="mb-5">
                    <h2 class="h3 fw-bold mb-4">À propos de l'événement</h2>
                    <div class="description-content fs-5 lh-lg">
                        {{ $evenement->description }}
                    </div>
                </section>

                <!-- Galerie -->
                <section class="mb-5">
                    <h2 class="h3 fw-bold mb-4">Galerie</h2>
                    <div class="row g-3 gallery-grid">
                        @for($i = 0; $i < 4; $i++)
                        <div class="col-6 col-md-3">
                            <div class="gallery-item ratio ratio-1x1">
                                <img src="https://picsum.photos/400?random={{ $i }}" 
                                     class="rounded-3" 
                                     alt="Gallery image {{ $i }}">
                            </div>
                        </div>
                        @endfor
                    </div>
                </section>
            </div>

            <!-- Colonne Droite -->
            <div class="col-lg-4">
                <!-- Carte Interactive -->
                <section class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h3 class="h5 fw-bold mb-3">Localisation</h3>
                        <div class="ratio ratio-16x9 rounded-3 overflow-hidden">
                       <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.440552103926!2d2.422042415333281!3d6.365359595387966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x102355584d1c5d9b%3A0x4a4d4c3177e1918b!2sUniversit%C3%A9%20d&#39;Abomey-Calavi!5e0!3m2!1sfr!2sbj!4v1648731335098!5m2!1sfr!2sbj" 
                            width="600" 
                            height="450" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                                                    </div>
                    </div>
                </section>

                <!-- Programme -->
                <section class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h3 class="h5 fw-bold mb-3">Programme</h3>
                        <div class="timeline">
                            <div class="timeline-item">
                                <div class="timeline-badge bg-primary"></div>
                                <div class="timeline-content">
                                    <h4>Debut </h4>
                                    <p class="text-muted mb-0"> {{ $evenement->date_heure->format('d M Y - H:i')}} </p>
                                </div>
                            </div>
                            <!-- Plus d'éléments du programme -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div
@endsection

