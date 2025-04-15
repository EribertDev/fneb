@extends('master')
@section('title')
    A propos
@endsection
@section('extra-style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
</style>
@endsection
@section('content')






 
    <!-- Héro avec Emblème -->
    <header class="fneb-wave position-relative">
        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center py-5">
                <div class="col-lg-8 text-center">
                    <div class="emblem-card p-5 mt-5">
                        <img src="{{asset('img/fneb-logo.png')}}" alt="Emblème FNEB" class="img-fluid mb-4" style="max-height: 150px;">
                        <h1 class="display-4 fw-bold text-primary">Fédération Nationale des Étudiants du Bénin</h1>
                        <div class="motto-banner text-white p-3 my-4 rounded">
                            <h2 class="m-0">Unité • Justice • Action</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<!-- Valeurs FNEB -->
<section class="values-section py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Unité -->
            <div class="col-md-6 col-lg-3">
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
            <div class="col-md-6 col-lg-3">
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
            <div class="col-md-6 col-lg-3">
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

            <!-- Engagement -->
            <div class="col-md-6 col-lg-3">
                <div class="value-card bg-commitment">
                    <div class="value-icon">
                        <i class="fas fa-hand-holding-heart fa-3x"></i>
                    </div>
                    <h3>Engagement</h3>
                    <p>7 institutions spécialisées<br>500 bourses annuelles</p>
                    <div class="value-divider"></div>
                    <small>"L'étudiant au centre"</small>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Structure Organisationnelle -->
    <section id="structure" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Architecture Institutionnelle</h2>
            
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="structure-timeline">
                        <div class="timeline-item">
                            <h3>Sections Fédérales</h3>
                            <ul class="list-unstyled">
                                <li>• Université d'Abomey-Calavi</li>
                                <li>• Université Nationale d'Agriculture</li>
                                <li>• Université de Parakou</li>
                                <li>• Représentations Internationales (20+ étudiants)</li>
                            </ul>
                        </div>
                        
                        <div class="timeline-item">
                            <h3>Unions d'Entités</h3>
                            <div class="row row-cols-2 row-cols-md-3 g-2">
                                <div class="col">
                                    <div class="badge bg-primary">EPAC</div>
                                </div>
                                <!-- Ajouter les autres entités -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card h-100 border-0 shadow-lg">
                        <div class="card-body">
                            <h3 class="card-title">Couverture Nationale</h3>
                            <img src="map-benin.png" alt="Carte du Bénin" class="img-fluid">
                            <div class="legend mt-3">
                                <span class="badge bg-primary me-2">Sections Fédérales</span>
                                <span class="badge bg-success">Institutions Spécialisées</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Institutions Spécialisées -->
    <section id="institutions" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Piliers Institutionnels</h2>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="institution-card card h-100 text-center">
                        <div class="card-header bg-primary text-white">
                            <i class="fas fa-icons fa-3x"></i>
                        </div>
                        <div class="card-body">
                            <h4>BACE</h4>
                            <p>Ensemble Artistique et Culturel des Étudiants</p>
                            <small class="text-muted">Club UNESCO agréé</small>
                        </div>
                    </div>
                </div>
                
                <!-- Ajouter autres institutions -->
            </div>
        </div>
    </section>

    <!-- Objectifs & Devoirs -->
    <section id="objectifs" class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <h3 class="mb-4">Nos Combats</h3>
                    <div class="accordion">
                        <div class="accordion-item">
                            <h4 class="accordion-header">
                                <button class="accordion-button">Éducation pour tous</button>
                            </h4>
                            <div class="accordion-body">
                                <p>Démocratisation de l'accès à l'enseignement supérieur</p>
                            </div>
                        </div>
                        <!-- Ajouter autres objectifs -->
                    </div>
                </div>

                <div class="col-lg-6">
                    <h3 class="mb-4">Engagements Membres</h3>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-check-circle me-2 text-gold"></i>
                            Respect des biens publics universitaires
                        </li>
                        <!-- Ajouter autres devoirs -->
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Devoirs -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Devoirs des Membres</h2>
            
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <div class="timeline-content">
                                <h5>Respect des valeurs</h5>
                                <p>Adhésion aux principes de démocratie et de justice sociale</p>
                            </div>
                        </div>
                        
                        <div class="timeline-item">
                            <div class="timeline-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="timeline-content">
                                <h5>Engagement collectif</h5>
                                <p>Participation active à la vie associative étudiante</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


  


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


 