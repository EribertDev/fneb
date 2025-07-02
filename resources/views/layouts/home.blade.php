@extends('master')
@section('title', 'Acceuil')
@section('keywords', 'FNEB, Bénin, étudiants, éducation, solidarité, excellence')
@section('author', 'FNEB')
@section('viewport', 'width=device-width, initial-scale=1.0')
@section('og-title', 'FNEB - La Voix des Étudiants Béninois')
@section('og-description', 'La FNEB est le porte-voix des étudiants béninois, œuvrant pour la défense de leurs droits et la promotion de l’excellence académique.')
@section('og-image', asset('img/fneb-logo.png'))
@section('og-url', url()->current())

@section('description', 'Description FNEB')
@section('extra-style')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/sondages.css') }}">
<style>
     :root {
        --fneb-blue: #0055A4;
        --fneb-gold: #FFD700;
        --fneb-red: #A12C2F;
    }

    .fneb-wave {
        background: linear-gradient(135deg, var(--fneb-blue) 0%, var(--fneb-red) 100%);
        height:100%;
        clip-path: ellipse(100% 100% at 50% 0%);
    }

    .emblem-card {
        border: 3px solid var(--fneb-gold);
        border-radius: 20px;
        background: rgba(255,255,255,0.9);
        backdrop-filter: blur(10px);
    }

    .structure-timeline {
        position: relative;
        padding-left: 40px;
    }

    .structure-timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        height: 100%;
        width: 2px;
        background: var(--fneb-gold);
    }

    .timeline-item {
        position: relative;
        margin-bottom: 30px;
        padding-left: 30px;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -8px;
        top: 5px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: var(--fneb-blue);
        border: 2px solid var(--fneb-gold);
    }

    .institution-card {
        transition: transform 0.3s;
        border-bottom: 4px solid var(--fneb-blue);
    }

    .institution-card:hover {
        transform: translateY(-10px);
    }

    .motto-banner {
        background: repeating-linear-gradient(
            45deg,
            var(--fneb-blue),
            var(--fneb-blue) 20px,
            var(--fneb-gold) 20px,
            var(--fneb-gold) 40px
        );
    }
    .values-section {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.value-card {
    padding: 2rem;
    border-radius: 20px;
    text-align: center;
    height: 100%;
    transition: transform 0.3s ease;
    position: relative;
    overflow: hidden;
}

.value-card::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 4px;
    transition: height 0.3s ease;
}

.value-card:hover {
    transform: translateY(-10px);
}

.value-card:hover::after {
    height: 8px;
}

.bg-unity { background: #0055A4; color: white; }
.bg-unity::after { background: #FFD700; }

.bg-justice { background: #A12C2F; color: white; }
.bg-justice::after { background: #FFD700; }

.bg-action { background: #FFD700; color: #2a0a0c; }
.bg-action::after { background: #A12C2F; }

.bg-commitment { background: #2a0a0c; color: white; }
.bg-commitment::after { background: #FFD700; }

.value-icon {
    margin: 1rem auto;
    padding: 1rem;
    display: inline-block;
}

.value-divider {
    width: 60px;
    height: 2px;
    background: rgba(255,255,255,0.3);
    margin: 1.5rem auto;
}

.value-card h3 {
    font-size: 1.5rem;
    margin-bottom: 1rem;
}

.value-card p {
    font-size: 0.9rem;
    line-height: 1.4;
}

.value-card small {
    display: block;
    font-style: italic;
    margin-top: 1rem;
    opacity: 0.8;
}
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
                                        <a href="{{route('about')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">
                                            <i class="fas fa-info-circle me-2"></i>Découvrir la FNEB
                                        </a>
                                        <a href="{{route('don')}}" class="btn btn-light py-md-3 px-md-5 animated slideInRight">
                                            <i class="fas fa-hand-holding-usd me-2"></i>Soutenez la FNEB
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
                                    <a href= {{ route('register') }} class="btn btn-light py-md-3 px-md-5 animated slideInRight">
                                        <i class="fas fa-user-plus me-2"></i>Inscrivez-vous
                                    </a>
                                    <a href="{{route('don')}}" class="btn btn-primary py-md-3 px-md-5 animated slideInRight">
                                        <i class="fas fa-hand-holding-usd me-2"></i>Soutenez la FNEB
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
       <!-- Valeurs FNEB -->
<section class="values-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Unité -->
            <div class="col-md-6 col-lg-4">
                <div class="value-card bg-unity">
                    <div class="value-icon">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <h3>Unité</h3>
                    <p>23 universités fédérées<br>15 000 étudiants solidaires</p>
                    <div class="value-divider"></div>
                    <small>"Seul on va vite, ensemble on va loin"</small>
                </div>
            </div>

            <!-- Justice -->
            <div class="col-md-6 col-lg-4">
                <div class="value-card bg-justice">
                    <div class="value-icon">
                        <i class="fas fa-balance-scale fa-3x"></i>
                    </div>
                    <h3>Justice</h3>
                    <p>12 commissions thématiques<br>108 résolutions annuelles</p>
                    <div class="value-divider"></div>
                    <small>"L'équité comme fondement"</small>
                </div>
            </div>

            <!-- Action -->
            <div class="col-md-6 col-lg-4">
                <div class="value-card bg-action">
                    <div class="value-icon">
                        <i class="fas fa-fist-raised fa-3x"></i>
                    </div>
                    <h3>Action</h3>
                    <p>45 événements annuels<br>92% de satisfaction étudiante</p>
                    <div class="value-divider"></div>
                    <small>"La praxis au cœur du changement"</small>
                </div>
            </div>

         
        </div>
    </div>
</section>
    <!-- Structure Organisationnelle -->
    

  

   
</div>
<!-- About End -->



    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">👥 Le Bureau Exécutif National</h6>
                <h1 class="mb-5">Membres</h1>
            </div>
            <div class="row g-4">
                @foreach($members as $member)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="{{ 0.1 + $loop->index * 0.2 }}s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img 
                                class="img-fluid" 
                                src="{{ asset('storage/' . ($member->photo ?? 'img/default-avatar.png')) }}" 
                                alt="{{ $member->name }}"
                            >
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                {{-- Si vous avez des URLs de réseaux sociaux, vous pouvez les remplacer ci‑dessous --}}
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">{{ $member->name }}</h5>
                            <small><strong>{{ $member->position }}</strong></small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Actualités  Start -->
    <section class="news-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5"> Dernières Actualités de la FNEB</h2>
            
            <div class="row g-4" data-masonry='{"percentPosition": true}'>
                @foreach($latestActualites as $actualite)
                <div class="col-md-6 col-lg-4">
                    <article class="news-card card h-100 shadow-lg border-0">
                        
                        <img src="{{ Storage::url($actualite->image) }}" class="card-img-top" alt="{{ $actualite->title }}"
                        style="height: 250px; object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted">{{ $actualite->created_at->translatedFormat('d M Y') }}</small>
                            
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
           
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('actualites') }}" class="btn btn-primary">Voir toutes les actualités</a>
        </div>
    </section>
    <!-- Actualités End -->    
    
          


    <!-- Events Start -->
    <div class="container px-4 py-5" style="background: #f8fafc;">
        <h2 class="text-center mb-5"> Derniers Evènements de la FNEB</h2>
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
        <div class="text-center mt-4">
            <a href="{{ route('evenements') }}" class="btn btn-primary">Tout les événements</a>
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
                        @foreach(['sante', 'academique', 'emploi', 'culture','logement','evenements','transport','restauration','autre'] as $category)
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

             
             
                </div>
        
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="blog-sidebar sticky-top">
                        @if(session('newsletter_success'))
                        <div class="alert alert-success mb-3">
                            {{ session('newsletter_success') }}
                        </div>
                    @endif
                        <!-- Newsletter -->
                        <div class="card mb-4 border-0 shadow-sm">
                            <div class="card-body text-center bg-primary text-white rounded-3">
                                <i class="fas fa-envelope-open-text fa-3x mb-3"></i>
                                <h3 class="h5">Abonnez-vous à notre newsletter</h3>
                                <form action="{{ route('newsletter.subscribe') }}" method="POST">
                                    @csrf
                                    <input type="email" name="email" class=" mb-2 form-control @error('email') is-invalid @enderror"  required placeholder="Votre email">
                                    <button type="submit" class="btn btn-light w-100">S'abonner</button>
                                        @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
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
            <div class="text-center mt-4">
                <a href="{{ route('blog') }}" class="btn btn-primary">Voir Tout</a>
            </div>
        </div>
    </section>
    <!-- BLOG End -->

 
    
    <!-- Liste des sondages -->
<div class="container mx-auto px-4" style="margin-top: 200px;">
    <h2 class="text-center mb-5">Sondages Étudiants</h2>
   
             @if(count($latestPoll) > 0)
                @foreach($latestPoll as $poll)
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
                                <span>{{ $poll->votes_count }} participations</span>
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
      
    <!-- Autre End -->
@endsection
   
@section('extra-script')


@endse












<script>
    // Initialisation de Masonry
    var grid = document.querySelector('.row');
    var msnry = new Masonry(grid, {
        itemSelector: '.col-md-6',
        columnWidth: '.col-md-6',
        percentPosition: true
    });

    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>

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