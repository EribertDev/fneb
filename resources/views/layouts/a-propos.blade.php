@extends('master')
@section('title')
    A propos
@endsection
@section('extra-style')
<script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js" defer></script>

@endsection
@section('content')



    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Qui sommes nous?</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Acceuil</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page" href="{{route('about')}}" >A propos</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

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
    
    
@endsection

@section('extra-script')

<script >
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
@endsection


 