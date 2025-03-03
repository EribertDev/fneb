@extends('master')
@section('title') Actualités @endsection
@section('extra-style')
<style>
    .news-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.15)!important;
    }
    
    .news-gallery {
        height: 250px;
        overflow: hidden;
    }
    
    .news-gallery img {
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .news-gallery:hover img {
        transform: scale(1.05);
    }
    
    .photo-count {
        font-size: 0.8rem;
        backdrop-filter: blur(2px);
        background-color: rgba(0,0,0,0.5)!important;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 8%;
    }
    
    .social-share {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .news-card:hover .social-share {
        opacity: 1;
    }
    
    .card-title {
        min-height: 3rem;
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
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="">Acceuil</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page" href="" >Actualités</li>
                        </ol>   
                    </nav>
                </div>  
            </div>
        </div>
    </div>
    <!-- Header End -->

   <!-- Actualités Start -->

   <section class="news-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Actualités de la FNEB</h2>
        
        <div class="row g-4" data-masonry='{"percentPosition": true}'>
            <!-- Article 1 -->
            <div class="col-md-6 col-lg-4">
                <article class="news-card card h-100 shadow-lg border-0">
                    <!-- Galerie Photo -->
                    <div class="news-gallery position-relative">
                        <div id="gallery1" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner rounded-top">
                                <div class="carousel-item active">
                                    <img src="img\cat-2.jpg" class="d-block w-100" alt="Événement 1">
                                </div>
                                <div class="carousel-item">
                                    <img src="img\cat-3.jpg" class="d-block w-100" alt="Événement 1">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#gallery1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#gallery1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                        <span class="badge bg-primary position-absolute top-0 start-0 m-3">Éducation</span>
                        <span class="photo-count position-absolute bottom-0 end-0 m-2 bg-dark text-white px-2 rounded">2 photos</span>
                    </div>

                    <!-- Contenu -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">15 Mars 2024</small>
                            <small class="text-primary"><i class="fas fa-eye me-1"></i>256 vues</small>
                        </div>
                        <h3 class="card-title h5">Réforme du système universitaire</h3>
                        <p class="card-text">La FNEB plaide pour une éducation plus accessible à tous les étudiants...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{route('actualités-détail')}}" class="btn btn-outline-primary btn-sm">Lire la suite</a>
                            <div class="social-share">
                                <button class="btn btn-link text-muted"><i class="fab fa-facebook"></i></button>
                                <button class="btn btn-link text-muted"><i class="fab fa-twitter"></i></button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Article 2 - Format différent -->
            <div class="col-md-6 col-lg-4">
                <article class="news-card card h-100 shadow-lg border-0">
                    <img src="img\cat-2.jpg" class="card-img-top" alt="Événement 2">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <small class="text-muted">15 Mars 2024</small>
                                <small class="text-primary"><i class="fas fa-eye me-1"></i>256 vues</small>
                            </div>
                            <h3 class="card-title h5">Réforme du système universitaire</h3>
                            <p class="card-text">La FNEB plaide pour une éducation plus accessible à tous les étudiants...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('actualités-détail')}}" class="btn btn-outline-primary btn-sm">Lire la suite</a>
                                <div class="social-share">
                                    <button class="btn btn-link text-muted"><i class="fab fa-facebook"></i></button>
                                    <button class="btn btn-link text-muted"><i class="fab fa-twitter"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </div>

        <!-- Pagination -->
        <nav class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
            </ul>
        </nav>
    </div>
</section>

      


@endsection
@section('extra-script')
    <script>
        // Initialisation de Masonry
        var grid = document.querySelector('.row');
        var msnry = new Masonry(grid, {
            itemSelector: '.col-md-6',
            columnWidth: '.col-md-6',
            percentPosition: true
        });

        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    </script>