@extends('master')
@section('title •','Accueil ')
@section('description', 'Description FNEB')
@section('extra-style')
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js" defer></script>

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
                                    <a href="/inscription" class="btn btn-light py-md-3 px-md-5 animated slideInRight">
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


   <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="achievements-section bg-dark text-white py-5">
                <div class="row text-center">
                    <div class="col-md-3">
                        <h3 class="text-warning purecounter" data-purecounter-start="0" data-purecounter-end="150"   data-purecounter-separator="true"
                        data-purecounter-separator-symbol=" " data-duration="100">15k+</h3>
                        <p class="lead">Étudiants membres</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-warning purecounter" data-purecounter-start="0" data-purecounter-end="78"   data-purecounter-separator="true"
                        data-purecounter-separator-symbol=" ">78</h3>
                        <p class="lead">Succès des campagnes</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-warning purecounter" data-purecounter-start="0" data-purecounter-end="120"   data-purecounter-separator="true"
                        data-purecounter-separator-symbol=" ">120</h3>
                        <p class="lead">Partenariats</p>
                    </div>
                    <div class="col-md-3">
                        <h3 class="text-warning purecounter" data-purecounter-start="0" data-purecounter-end="25"   data-purecounter-separator="true"
                        data-purecounter-separator-symbol=" ">25</h3>
                        <p class="lead">Ans d'engagement</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   </div>


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">👥Le Bureau Exécutif National</h6>
                
                <h1 class="mb-5">Menbres</h1>
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
    
          
    <!-- Actualités End -->    


     <!-- Events Start -->
     <div class="container py-5">
        <div class="row g-4">
            <!-- Calendrier Mensuel -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="mb-0" id="currentMonth"></h3>
                            <div class="btn-group">
                                <button class="btn btn-light btn-sm" id="prevMonth"><i class="fas fa-chevron-left"></i></button>
                                <button class="btn btn-light btn-sm" id="nextMonth"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="monthCalendar"  class="bg-white rounded-3 shadow-lg" ></div>
                    </div>
                </div>
            </div>
    
            <!-- Événements du Jour Sélectionné -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning">
                        <h3 class="mb-0" id="selectedDate">Événements du jour</h3>
                    </div>
                    <div class="card-body">
                        <div id="dailyEvents" class="list-group"></div>
                    </div>
                </div>
            </div>
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
    <!-- BLOG End -->

    <!-- Autre Start -->

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Formulaire de Sondage -->
                <div class="card shadow-lg mb-4">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Sondage : Quel est votre principal défi académique ?</h3>
                    </div>
                    <div class="card-body">
                        <form id="pollForm">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pollOption" id="option1" value="Accès aux ressources">
                                    <label class="form-check-label" for="option1">Accès aux ressources pédagogiques</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pollOption" id="option2" value="Transport">
                                    <label class="form-check-label" for="option2">Transport vers le campus</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pollOption" id="option3" value="Logement">
                                    <label class="form-check-label" for="option3">Problèmes de logement</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pollOption" id="otherOption" value="Autre">
                                    <label class="form-check-label" for="otherOption">Autre (précisez)</label>
                                </div>
                                <div id="otherInput" class="mt-2" style="display: none;">
                                    <input type="text" class="form-control" placeholder="Votre réponse...">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Voter</button>
                        </form>
                    </div>
                </div>
    
                <!-- Graphique des Résultats -->
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white">
                        <h3 class="mb-0">Résultats en temps réel</h3>
                    </div>
                    <div class="card-body">
                        <div class="chart-container" style="position: relative; height:400px;">
                            <canvas id="resultsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
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
    @endsection