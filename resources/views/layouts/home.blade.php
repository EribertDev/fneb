@extends('master')
@section('title •','Accueil ')
@section('description', 'Description FNEB')
@section('extra-style')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
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
        --fneb-blue: #1A3D7C;
        --fneb-light-blue: #4D8EFF;
    }

    /*Blog*/
    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      
    }
    
    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
    }
    
    .featured {
        min-height: 300px;
    }
    
    .avatar {
        width: 30px;
        height: 30px;
    }

    .blog-sidebar .card {
        border-radius: 1rem;
    }
    
    .nav-pills .nav-link {
        transition: all 0.3s ease;
    }
    
    .nav-pills .nav-link.active {
        background: var(--bs-primary);
        color: white !important;
    }

    .social-share {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .blog-card:hover .social-share {
        opacity: 1;
    }

    .blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .avatar {
    
        object-fit: cover;
    }

    .featured {
        border: 2px solid #1A3D7C;
    }

    .pagination .page-link {
        color: #1A3D7C;
    }

    .pagination .page-item.active .page-link {
        background: #1A3D7C;
        border-color: #1A3D7C;
    }

    /*Sondage*/
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
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/home-caroussel1.jpg" alt=""  style="max-height: 850px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">La Voix des Étudiants Béninois</h5>
                                <h1 class="display-3 text-white animated slideInDown">Construisons ensemble l'avenir de l'éducation !</h1>
                                <p class="fs-5 text-white mb-4 pb-2">        La FNEB œuvre quotidiennement pour la défense de vos droits étudiants, la promotion de l'excellence académique 
                                    et le développement de campus inclusifs. Rejoignez la plus grande communauté étudiante du Bénin !</p>
                                    <div class="d-flex gap-3">
                                        <a href="/a-propos" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                                            <i class="fas fa-info-circle me-2"></i>Découvrir la FNEB
                                        </a>
                                        <a href="/adhesion" class="btn btn-light py-md-3 px-md-5 animated slideInRight">
                                            <i class="fas fa-handshake me-2"></i>Rejoindre la FNEB
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/home-caroussel2.jpg" alt="" style="max-height: 850px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">L'Union des Étudiants du Bénin</h5>
                                <h1 class="display-3 text-white animated slideInDown">Ensemble pour une Révolution Éducative !</h1>
                                <p class="fs-5 text-white mb-4 pb-2">
                                    La FNEB s'engage à amplifier la voix étudiante, à promouvoir l'innovation pédagogique et à créer des campus solidaires. Rejoignez-nous pour transformer l'avenir de l'éducation au Bénin !
                                </p>
                                <div class="d-flex gap-3">
                                    <a href="/presentation" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                                        <i class="fas fa-university me-2"></i>Qui sommes-nous ?
                                    </a>
                                    <a href= {{ route('register') }} class="btn btn-light py-md-3 px-md-5 animated slideInRight">
                                        <i class="fas fa-user-plus me-2"></i>Inscrivez-vous
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

 <!-- About Start -->
 <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-90 h-100 border-rounded" src="img/fneb-logo.png" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h6 class="section-title bg-white text-start text-primary pe-3">Qui sommes nous </h6>
                <h1 class="mb-4">Notre Raison d'Être</h1>
          
                <p class="mb-4"> La FNEB est le porte-voix officiel des étudiants béninois depuis [année de création]. 
                    Nous œuvrons quotidiennement pour :</p>
                    
                <div class="row gy-2 gx-4 mb-4">
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>✅ <strong>Défendre</strong> les droits sociaux et académiques des étudiants</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>✅ <strong>Promouvoir</strong> l'excellence éducative et l'innovation</p>
                    </div>
                    <div class="col-sm-6">
                        <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>✅ <strong>Construire</strong> des campus inclusifs et durables</p>
                    </div>
                    
                </div>
                <a class="btn btn-primary py-3 px-5 mt-2" href="">En Savoir plus</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                            <div class="p-4">
                            <i class="fas fa-handshake fa-3x text-primary mb-3"></i>
                            <h4>Solidarité</h4>
                            <p>Un réseau d'entraide présent dans toutes les universités du Bénin</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fas fa-gavel fa-3x text-danger mb-3"></i>
                            <h4>Intégrité</h4>
                            <p>Transparence totale dans la gestion des fonds étudiants</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fas fa-lightbulb fa-3x text-warning mb-3"></i>
                            <h4>Innovation</h4>
                            <p>Laboratoire d'idées pour l'éducation de demain</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fas fa-lightbulb fa-3x text-warning mb-3"></i>
                            <h4>Innovation</h4>
                            <p>Laboratoire d'idées pour l'éducation de demain</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->



    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">👥Le Bureau Exécutif National</h6>
                
                <h1 class="mb-5">Membres</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">[Nom] - Université d'Abomey-Calavi</h5>
                            <small><strong>Président</strong></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">[Nom] - Université d'Abomey-Calavi</h5>
                            <small><strong>Président</strong></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        
                        <div class="text-center p-4">
                            <h5 class="mb-0">[Nom] - Université d'Abomey-Calavi</h5>
                            <small><strong>Président</strong></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">[Nom] - Université d'Abomey-Calavi</h5>
                            <small><strong>Président</strong></small>
                        </div>
                    </div>
                </div>
            </div>

            
            
        </div>

    </div>
    <!-- Team End -->


    <!-- Actualités  Start -->
    <section class="news-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Actualités de la FNEB</h2>
            
            <div class="row g-4" data-masonry='{"percentPosition": true}'>
                @foreach($latestActualites as $actualite)
                <div class="col-md-6 col-lg-4">
                    <article class="news-card card h-100 shadow-lg border-0">
                        
                        <img src="{{ Storage::url($actualite->image) }}" class="card-img-top" alt="{{ $actualite->title }}"
                        style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted">{{ $actualite->created_at->translatedFormat('d M Y') }}</small>
                                <small class="text-primary">
                                    <i class="fas fa-eye me-1"></i>{{ $actualite->views ?? 0 }}
                                </small>
                            </div>
                            <h3 class="card-title h5">{{ $actualite->titre }}</h3>
                            <p class="card-text">{{ Str::limit($actualite->subtitre, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('actualites.show', $actualite->id) }}" class="btn btn-outline-primary btn-sm">Lire la suite</a>
                                <div class="social-share">
                                    <button class="btn btn-link text-muted"><i class="fab fa-facebook"></i></button>
                                    <button class="btn btn-link text-muted"><i class="fab fa-twitter"></i></button>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
            
            <!-- Pagination -->
            <nav class="mt-5">
                <div class="d-flex justify-content-center">
                    {{ $latestActualites->links() }}
                </div>
            </nav>
        </div>
    </section>
    <!-- Actualités End -->    
    
          


    <!-- Events Start -->
    <div class="container px-4 py-5" style="background: #f8fafc;">
        <h2 class="text-center mb-5">Evènements de la FNEB</h2>
        <!-- Filtres -->
        <div class="row mb-4 g-3">
                <div class="d-flex flex-wrap gap-3 justify-content-center">
                    <button class="btn btn-outline-primary rounded-pill">Tous</button>
                    <button class="btn btn-outline-primary rounded-pill">Conférences</button>
                    <button class="btn btn-outline-primary rounded-pill">Ateliers</button>
                    <button class="btn btn-outline-primary rounded-pill">Manifestations</button>
                </div>
            </div>
        </div>
    
        <!-- Liste des événements -->
        <div class="row g-4 container">
            @foreach($latestEvenements as $evenement)
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
    
    <!-- Events End -->

     <!-- BLOG Start -->
     <section class="student-blog py-5 bg-light">
        <div class="container">
            <!-- En-tête -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3">Le Blog des Étudiants</h1>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Rechercher un article...">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
                <nav class="blog-categories mt-4">
                    <div class="nav nav-pills justify-content-center">
                        <a href="{{ route('blog') }}" 
                           class="nav-link {{ !request('category') ? 'active' : '' }}">
                            Tous
                        </a>
                        @foreach(['sante', 'academique', 'emploi', 'culture','logement','evenements','technology','autre'] as $category)
                        <a href="?category={{ $category }}" 
                           class="nav-link {{ request('category') === $category ? 'active' : '' }}">
                            {{ ucfirst($category) }}
                        </a>
                        @endforeach
                    </div>
                </nav>
            </div>
    
            <!-- Contenu principal -->
            <div class="row g-4">
                <!-- Articles -->
                <div class="col-lg-8">
                    <div class="row g-4" data-masonry='{"percentPosition": true}'>
                        @forelse($latestPosts as $post)
                        @if ($loop->first)
                            <div class="col-12">
                                <article class="blog-card featured bg-white rounded-3 shadow-lg overflow-hidden">
                                    @if($post->image)
                                    <div class="row g-0">
                                        <div class="{{ $loop->first ? 'col-md-6' : 'col-12' }}">
                                            <img src="{{ asset('storage/'.$post->image) }}" 
                                                class="img-fluid h-100 object-fit-cover" 
                                                alt="{{ $post->title }}">
                                        </div>
                                        <div class="{{ $loop->first ? 'col-md-6' : 'col-12' }} p-4 d-flex flex-column">
                                            @endif
                                            
                                            <div class="mb-2">
                                                @if($loop->first && $post->created_at->diffInDays() < 7)
                                                <span class="blog-badge bg-primary px-1 fw-bold">Nouveau</span>
                                                @endif
                                                <span class="blog-badge bg-warning text-dark px-1 fw-bold ms-2">
                                                    {{ ucfirst($post->category) }}
                                                </span>
                                            </div>
                                            <h2 class="{{ $loop->first ? 'h3' : 'h5' }}">{{ $post->title }}</h2>
                                            <p class="flex-grow-1">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="author-info">
                                                    <img src="{{ $post->editor->profile_picture ? Storage::url($post->editor->profile_picture) : asset('default-avatar.png') }}"
                                                        class="avatar rounded-circle" 
                                                        alt="{{ $post->editor->name }}">
                                                    <span class="ms-2">{{ $post->editor->name }}</span>
                                                </div>
                                                <a href="{{route('post.show',$post)}}" class="btn btn-outline-primary">
                                                    Lire →
                                                </a>
                                            </div>
                                            
                                            @if($post->image)
                                        </div>
                                    </div>
                                    @endif
                                </article>
                            </div>
                        @else
                            <div class="col-md-6">
                                <article class="blog-card bg-white rounded-3 shadow-lg overflow-hidden">
                                    @if($post->image)
                                    <div class="row g-0">
                                        <div class="{{ $loop->first ? 'col-md-6' : 'col-12' }}">
                                            <img src="{{ asset('storage/'.$post->image) }}" 
                                                class="img-fluid h-100 object-fit-cover" 
                                                alt="{{ $post->title }}">
                                        </div>
                                        <div class="{{ $loop->first ? 'col-md-6' : 'col-12' }} p-4 d-flex flex-column">
                                            @endif
                                            
                                            <div class="mb-2">
                                                @if($loop->first && $post->created_at->diffInDays() < 7)
                                                <span class="blog-badge bg-primary px-1 fw-bold">Nouveau</span>
                                                @endif
                                                <span class="blog-badge bg-warning text-dark px-1 fw-bold ms-2">
                                                    {{ ucfirst($post->category) }}
                                                </span>
                                            </div>
                                            <h2 class="{{ $loop->first ? 'h3' : 'h5' }}">{{ $post->title }}</h2>
                                            <p class="flex-grow-1">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="author-info">
                                                    <img src="{{ $post->editor->profile_picture ? Storage::url($post->editor->profile_picture) : asset('default-avatar.png') }}"
                                                        class="avatar rounded-circle" 
                                                        alt="{{ $post->editor->name }}">
                                                    <span class="ms-2">{{ $post->editor->name }}</span>
                                                </div>
                                                <a href="{{route('post.show',$post)}}" class="btn btn-outline-primary">
                                                    Lire →
                                                </a>
                                            </div>
                                            
                                            @if($post->image)
                                        </div>
                                    </div>
                                    @endif
                                </article>
                            </div>
                        @endif
                        
                        @empty
                            <div class="col-12 text-center py-5">
                                <h3>Aucun article trouvé</h3>
                                <a href="{{ route('blog') }}" class="btn btn-primary">
                                    Voir tous les articles
                                </a>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($latestPosts->hasPages())
                    <nav class="mt-5">
                        {{ $latestPosts->appends(request()->query())->links() }}
                    </nav>
                    @endif
                </div>
        
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="blog-sidebar sticky-top">
                        <!-- Newsletter -->
                        <div class="card mb-4 border-0 shadow-sm">
                            <div class="card-body text-center bg-primary text-white rounded-3">
                                <i class="fas fa-envelope-open-text fa-3x mb-3"></i>
                                <h3 class="h5">Abonnez-vous à notre newsletter</h3>
                                <form action="" method="POST">
                                    @csrf
                                    <input type="email" name="email" class="form-control mb-2" required placeholder="Votre email">
                                    <button type="submit" class="btn btn-light w-100">S'abonner</button>
                                </form>
                            </div>
                        </div>

                        <!-- Articles populaires -->
                        <div class="card mb-4 border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="h5 mb-3">📌 Articles populaires</h4>
                                <div class="list-group">
                                    @foreach($popularPosts as $post)
                                    <a href="{{route('post.show',$post)}}" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <span class="blog-badge bg-primary me-2 px-2">{{ $loop->iteration }}</span>
                                        <span>{{ $post->title }}</span>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Médias sociaux -->
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h4 class="h5 mb-3">💬 Rejoignez la communauté</h4>
                                <div class="d-flex gap-3 fs-4">
                                    @foreach(config('social_links') as $network => $url)
                                    <a href="{{ $url }}" class="text-primary" target="_blank">
                                        <i class="fab fa-{{ $network }}"></i>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG End -->

    <!-- Autre Start -->
    
    <!-- Liste des sondages -->
<div class="container mx-auto px-4" style="margin-top: 200px;">
    <h2 class="text-center mb-5">Sondages Étudiants</h2>
    @forelse($latestPoll as $poll)
    <div class="bg-white rounded-xl shadow-2xl mb-8 overflow-hidden transition-all duration-300 hover:shadow-lg">
        <!-- En-tête du sondage -->
        <div class="p-6 border-b-2 border-blue-100 bg-gradient-to-r from-[#1A3D7C] to-[#4D8EFF]">
            <h3 class="text-2xl font-bold text-center mb-3">{{ $poll->question }}</h3>
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
            <button type="submit" class="w-full py-3 bg-gradient-to-r from-[#1A3D7C] to-[#4D8EFF] text-white font-semibold rounded-lg hover:opacity-90 transition-opacity btn btn-primary mt-2" style="border-radius: 10px">
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
</div>
      
    <!-- Autre End -->
@endsection
   
@section('extra-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new PureCounter({
            // Configuration personnalisée
            selector: '.purecounter',
            duration: 5,
            delay: 5,
            once: true,
            legacy: false
        });
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Configuration initiale
let pollData = {
    "Accès aux ressources": 120,
    "Transport": 85,
    "Logement": 65,
    "Autre": 30
};

// Gestion de la case "Autre"
document.querySelectorAll('input[name="pollOption"]').forEach(input => {
    input.addEventListener('change', (e) => {
        document.getElementById('otherInput').style.display = 
            e.target.value === 'Autre' ? 'block' : 'none';
    });
});

// Initialisation du graphique
const ctx = document.getElementById('resultsChart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: Object.keys(pollData),
        datasets: [{
            data: Object.values(pollData),
            backgroundColor: [
                '#FF6384',
                '#36A2EB',
                '#FFCE56',
                '#4BC0C0'
            ]
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const total = context.dataset.data.reduce((a, b) => a + b);
                        const value = context.raw;
                        const percentage = ((value * 100) / total).toFixed(1);
                        return `${context.label}: ${value} votes (${percentage}%)`;
                    }
                }
            }
        }
    }
});

// Gestion de la soumission
document.getElementById('pollForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const selectedOption = document.querySelector('input[name="pollOption"]:checked').value;
    const otherText = document.querySelector('#otherInput input').value;
    
    if(selectedOption === 'Autre' && !otherText) {
        alert('Veuillez préciser votre réponse');
        return;
    }

    // Enregistrement du vote (à remplacer par appel API en réel)
    pollData[selectedOption]++;
    
    // Mise à jour du graphique
    chart.data.labels = Object.keys(pollData);
    chart.data.datasets[0].data = Object.values(pollData);
    chart.update();

    // Réinitialisation du formulaire
    this.reset();
    document.getElementById('otherInput').style.display = 'none';
});
</script>

<script>
    // Initialisation de Masonry
    var grid = document.querySelector('.row');
    var msnry = new Masonry(grid, {
        itemSelector: '.col-md-6',
        columnWidth: '.col-md-6',
        percentPosition: true
    });

    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const events = [
        {
            title: 'Réunion ',
            start: '2025-02-24T10:00:00',
            end: '2025-03-15T12:00:00',
            location: 'Salle B203',
            description: 'Préparation des élections universitaires'
        },
        {
            title: 'Atelier',
            start: '2025-02-24T14:00:00',
            end: '2025-03-15T17:00:00',
            location: 'Bibliothèque centrale',
            description: 'Avec M. Adébayo, expert en création d\'entreprise'
        }
    ];

    // Configuration Calendrier Mensuel
    const calendarEl = document.getElementById('monthCalendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: false,
        locale: 'fr',
        events: events,
        dateClick: function(info) {
            updateDailyEvents(info.date);
        },
        eventDidMount: function(arg) {
            arg.el.innerHTML = `
                <div class="d-flex align-items-center p-1">
                    <div class="event-badge me-2">${formatTime(arg.event.start)}</div>
                    <div class="event-title" >${arg.event.title}</div>
                </div>
                
            `;
        }
        
    });

    // Gestion Navigation
    document.getElementById('prevMonth').addEventListener('click', () => {
        calendar.prev();
        updateMonthHeader();
    });

    document.getElementById('nextMonth').addEventListener('click', () => {
        calendar.next();
        updateMonthHeader();
    });

    // Mise à jour de l'interface
    function updateMonthHeader() {
        const currentDate = calendar.getDate();
        document.getElementById('currentMonth').textContent = 
            currentDate.toLocaleDateString('fr-FR', { month: 'long', year: 'numeric' });
    }

    function updateDailyEvents(date) {
        const selectedDate = date.toISOString().split('T')[0];
        const dailyEvents = events.filter(event => 
            event.start.startsWith(selectedDate)
        );

        const eventsHtml = dailyEvents.map(event => `
            <div class="list-group-item">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="mb-1">${event.title}</h5>
                        <small class="text-muted">${formatTime(event.start)} - ${formatTime(event.end)}</small>
                        <div class="mt-2">📍 ${event.location}</div>
                    </div>
                    <button class="btn btn-sm btn-outline-primary">+ Détails</button>
                </div>
                ${event.description ? `<p class="mt-2 mb-0">${event.description}</p>` : ''}
            </div>
        `).join('');
if (dailyEvents.length === 0) {
            document.getElementById('dailyEvents').innerHTML = `
                <div class="text-center text-muted">Aucun événement prévu pour le ${date.toLocaleDateString('fr-FR')}</div>
            `;
        } else {
            document.getElementById('dailyEvents').innerHTML = eventsHtml;
        }
        document.getElementById('selectedDate').textContent = 
            'Événements du ' + date.toLocaleDateString('fr-FR', { 
                weekday: 'long', 
                day: 'numeric', 
                month: 'long' 
            });
    }

    function formatTime(dateString) {
        const date = new Date(dateString);
        return date.toLocaleTimeString('fr-FR', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });
    }

    // Initialisation
    calendar.render();
    updateMonthHeader();
    updateDailyEvents(new Date());
});
</script>
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js" defer></script>
@endsection