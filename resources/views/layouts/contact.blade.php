@extends('master')
@section('title') Contact @endsection
@section('extra-style')
@endsection
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Contact</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="{{route('home')}}">Acceuil</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page" href="{{route('contact')}}" >Contact</li>
                        </ol>   
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
<!-- Contact Début -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Contactez-nous</h6>
            <h1 class="mb-5">Contactez-nous pour toute demande</h1>
        </div>
        <div class="row g-4">
            <!-- Coordonnées -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <h5>Nos Coordonnées</h5>
                <p class="mb-4">Pour toute question relative à vos droits étudiants, aux services universitaires ou à nos activités, n'hésitez pas à nous contacter.</p>
                
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Siège Social</h5>
                        <p class="mb-0">Rue 450, Haie Vive<br>Cotonou, Bénin</p>
                        <p class="mt-2"><strong>Antenne Porto-Novo :</strong><br>Av. Jean-Paul II, Face Campus</p>
                    </div>
                </div>
                
                <div class="d-flex align-items-center mb-3">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Téléphones</h5>
                        <p class="mb-0"><a href="tel:+22921303030">+229 21 30 30 30</a></p>
                        <p class="mb-0"><a href="tel:+22997979797">+229 97 97 97 97 (Urgences)</a></p>
                    </div>
                </div>
                
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center justify-content-center flex-shrink-0 bg-primary" style="width: 50px; height: 50px;">
                        <i class="fa fa-envelope-open text-white"></i>
                    </div>
                    <div class="ms-3">
                        <h5 class="text-primary">Emails</h5>
                        <p class="mb-0"><a href="mailto:contact@fneb.bj">contact@fneb.bj</a></p>
                        <p class="mb-0"><a href="mailto:urgence@fneb.bj">urgence@fneb.bj</a></p>
                    </div>
                </div>

                <div class="mt-4 pt-3">
                    <h6 class="text-primary">Réseaux Sociaux</h6>
                    <div class="d-flex gap-3 mt-2">
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>

            <!-- Carte -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.440552103926!2d2.422042415333281!3d6.365359595387966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x102355584d1c5d9b%3A0x4a4d4c3177e1918b!2sUniversit%C3%A9%20d&#39;Abomey-Calavi!5e0!3m2!1sfr!2sbj!4v1648731335098!5m2!1sfr!2sbj"
                    frameborder="0" style="min-height: 300px; border:0;" allowfullscreen="" 
                    aria-hidden="false" tabindex="0"></iframe>
            </div>

            <!-- Formulaire -->
            <div class="col-lg-4 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <form id="contactForm">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="nom" placeholder="Votre nom" required>
                                <label for="nom">Votre nom complet</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Votre email" required>
                                <label for="email">Adresse email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <select class="form-select" id="sujet">
                                    <option value="general">Question générale</option>
                                    <option value="bourse">Demande de bourse</option>
                                    <option value="urgence">Urgence étudiante</option>
                                    <option value="partenariat">Partenariat</option>
                                </select>
                                <label for="sujet">Nature de votre demande</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Laissez votre message ici" 
                                id="message" style="height: 150px" required></textarea>
                                <label for="message">Détails de votre demande</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">
                                <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact Fin -->
@endsection
@section('extra-script')
@endsection
    