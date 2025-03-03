@extends('master')
@section('title') Blog @endsection
@section('extra-style')
<style>
    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
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
    
    .object-fit-cover {
        object-fit: cover;
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
    </style>
@endsection

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Blog</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="">Acceuil</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page" href="{{route('blog')}}">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
</div>

<!-- Header End -->

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
                <div class="nav nav-pills justify-content-center" id="nav-tab" role="tablist">
                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#all">Tous</button>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#education">Éducation</button>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#career">Carrière</button>
                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#campus">Vie Campus</button>
                </div>
            </nav>
        </div>

        <!-- Contenu principal -->
        <div class="row g-4">
            <!-- Articles -->
            <div class="col-lg-8">
                <div class="row g-4" data-masonry='{"percentPosition": true}'>
                    <!-- Article vedette -->
                    <div class="col-12">
                        <article class="blog-card featured bg-white rounded-3 shadow-lg overflow-hidden">
                            <div class="row g-0">
                                <div class="col-md-6">
                                    <img src="img\course-1.jpg" class="img-fluid h-100 object-fit-cover" alt="...">
                                </div>
                                <div class="col-md-6 p-4 d-flex flex-column">
                                    <div class="mb-2">
                                        <span class="badge bg-primary">Nouveau</span>
                                        <span class="badge bg-warning text-dark ms-2">Éducation</span>
                                    </div>
                                    <h2 class="h3">Comment réussir sa première année universitaire</h2>
                                    <p class="flex-grow-1">Guide complet avec les conseils des anciens...</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="author-info">
                                            <img src="img\testimonial-1.jpg" class="avatar rounded-circle" alt="Auteur">
                                            <span class="ms-2">Alice D.</span>
                                        </div>
                                        <a href="#" class="btn btn-outline-primary">Lire →</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Article standard -->
                    <div class="col-md-6">
                        <article class="blog-card bg-white rounded-3 shadow-lg">
                            <div class="position-relative">
                                <img src="post1.jpg" class="card-img-top" alt="...">
                                <span class="badge bg-dark position-absolute top-0 end-0 m-3">5 min</span>
                            </div>
                            <div class="p-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <small class="text-muted">15 Mars 2024</small>
                                    <div class="social-share">
                                        <button class="btn btn-link text-muted"><i class="fas fa-share-alt"></i></button>
                                    </div>
                                </div>
                                <h3 class="h5">Top 10 des applications pour étudiants</h3>
                                <p class="text-muted">Les outils indispensables pour booster sa productivité...</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-comments me-2 text-primary"></i>
                                        <small>24 commentaires</small>
                                    </div>
                                    <a href="#" class="stretched-link"></a>
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Plus d'articles... -->
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

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="blog-sidebar sticky-top">
                    <!-- Newsletter -->
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-body text-center bg-primary text-white rounded-3">
                            <i class="fas fa-envelope-open-text fa-3x mb-3"></i>
                            <h3 class="h5">Abonnez-vous à notre newsletter</h3>
                            <input type="email" class="form-control mb-2" placeholder="Votre email">
                            <button class="btn btn-light w-100">S'abonner</button>
                        </div>
                    </div>

                    <!-- Articles populaires -->
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="h5 mb-3">📌 Articles populaires</h4>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                                    <span class="badge bg-primary me-2">1</span>
                                    <span>Comment financer ses études</span>
                                </a>
                                <!-- Plus d'éléments... -->
                            </div>
                        </div>
                    </div>

                    <!-- Médias sociaux -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="h5 mb-3">💬 Rejoignez la communauté</h4>
                            <div class="d-flex gap-3 fs-4">
                                <a href="#" class="text-primary"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="text-info"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-danger"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('extra-script')
<!-- Librairies nécessaires -->
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endsection