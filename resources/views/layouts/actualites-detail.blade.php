@extends('master')
@section('title') Actualités @endsection
@section('extra-style')
<style>
    .media-gallery {
        position: sticky;
        top: 20px;
    }
    
    .thumbnails img {
        transition: transform 0.3s ease, opacity 0.3s ease;
        cursor: pointer;
    }
    
    .thumbnails img:hover {
        transform: scale(1.05);
    }
    
    .thumbnails img.active {
        box-shadow: 0 0 0 3px var(--bs-primary);
        opacity: 1 !important;
    }
    
    .key-points {
        background: linear-gradient(135deg, #008751 0%, #006441 100%);
    }
    
    .btn-facebook { background: #1877F2; color: white; }
    .btn-twitter { background: #1DA1F2; color: white; }
    .btn-whatsapp { background: #25D366; color: white; }
    
    .article-content {
        font-size: 1.05rem;
        line-height: 1.7;
    }
    
    .related-articles .card {
        border: none;
        transition: transform 0.3s ease;
    }
    
    .related-articles .card:hover {
        transform: translateY(-5px);
    }
    </style>
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Actualités</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb   justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="">Acceuil</a></li> 
                            <li class="breadcrumb
                            -item text-white active" aria-current="page" href="{{route('news')}}">Actualités</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

  <!-- Vue détaillée d'une actualité -->
<section class="news-detail py-5 bg-light">
    <div class="container">
        <!-- Fil d'Ariane -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/actualites">Actualités</a></li>
                <li class="breadcrumb-item active" aria-current="page">Détail</li>
            </ol>
        </nav>

        <!-- En-tête de l'article -->
        <header class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <span class="badge bg-primary">Éducation</span>
                    <span class="badge bg-warning text-dark ms-2">En cours</span>
                </div>
                <small class="text-muted">Publié le 15/03/2024</small>
            </div>
            <h1 class="display-5 fw-bold">Réforme historique du système universitaire béninois</h1>
            <div class="d-flex gap-4 mt-3 text-muted">
                <small><i class="fas fa-user-edit me-1"></i>Par Koffi Adéwalé</small>
                <small><i class="fas fa-eye me-1"></i>1 245 vues</small>
            </div>
        </header>

        <!-- Contenu principal -->
        <div class="row g-5">
            <!-- Galerie média -->
            <div class="col-lg-7">
                <div class="media-gallery">
                    <!-- Carousel principal -->
                    <div id="mainCarousel" class="carousel slide shadow-lg" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-3">
                            <div class="carousel-item active">
                                <img src="img\cat-2.jpg" class="d-block w-100" alt="Réunion des délégués">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>Assemblée générale des représentants étudiants</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="img\cat-3.jpg" class="d-block w-100" alt="Discussions">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>

                    <!-- Vignettes -->
                    <div class="thumbnails mt-3">
                        <div class="row g-2">
                            <div class="col-3" data-bs-target="#mainCarousel" data-bs-slide-to="0">
                                <img src="img\cat-2.jpg" class="img-fluid rounded cursor-pointer active" alt="Miniature 1">
                            </div>
                            <div class="col-3" data-bs-target="#mainCarousel" data-bs-slide-to="1">
                                <img src="img\cat-3.jpg" class="img-fluid rounded cursor-pointer" alt="Miniature 2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Corps de l'article -->
            <div class="col-lg-5">
                <article class="article-content">
                    <div class="lead mb-4">
                        La FNEB a obtenu gain de cause après 6 mois de négociations intensives avec le ministère...
                    </div>

                    <!-- Points clés -->
                    <div class="key-points bg-primary text-white p-4 rounded-3 mb-4">
                        <h3 class="h5 mb-3"><i class="fas fa-star me-2"></i>Les avancées majeures</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2">✔️ Augmentation de 30% des bourses</li>
                            <li class="mb-2">✔️ Création de 5 nouvelles bibliothèques</li>
                            <li class="mb-2">✔️ Programme de transport subventionné</li>
                        </ul>
                    </div>

                    <!-- Contenu détaillé -->
                    <div class="content-body">
                        <p>Après plusieurs mois de mobilisation intensive, les représentants de la FNEB...</p>
                        
                        <h3 class="h4 mt-4">Prochaines étapes</h3>
                        <p>La mise en œuvre progressive des mesures débutera dès le 1er avril 2024...</p>
                    </div>

                    <!-- Partage social -->
                    <div class="social-sharing mt-5 pt-4 border-top">
                        <h4 class="h6 text-muted mb-3">Partager cet article :</h4>
                        <div class="d-flex gap-3">
                            <a href="#" class="btn btn-facebook btn-sm">
                                <i class="fab fa-facebook-f me-2"></i>Facebook
                            </a>
                            <a href="#" class="btn btn-twitter btn-sm">
                                <i class="fab fa-twitter me-2"></i>Twitter
                            </a>
                            <a href="#" class="btn btn-whatsapp btn-sm">
                                <i class="fab fa-whatsapp me-2"></i>WhatsApp
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <!-- Articles connexes -->
        <section class="related-articles mt-5 pt-5">
            <h2 class="h4 mb-4">D'autres actualités qui pourraient vous intéresser</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="related1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nouveau programme de bourses</h5>
                            <p class="card-text">Découvrez les critères d'éligibilité...</p>
                            <a href="#" class="btn btn-link">Lire →</a>
                        </div>
                    </div>
                </div>
                <!-- Ajouter d'autres articles -->
            </div>
        </section>
    </div>
</section>
@endsection
