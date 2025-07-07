<!-- Footer Start -->
<div class="container-fluid bg-primary text-light footer pt-5 mt-5">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Colonne Liens rapides -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">FNEB Bénin</h4>
                <a class="btn btn-link" href="{{route('about')}}">Notre Mission</a>
                <a class="btn btn-link" href="{{route('evenements')}}">Événements</a>
                <a class="btn btn-link" href="{{ route('blog') }}">Blog Étudiant</a>
                <a class="btn btn-link" href="">FAQ</a>
            </div>

            <!-- Colonne Contact -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Nous Contacter</h4>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>
                   UAC  Abomey-Calavi, Bénin - Siège National
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone-alt me-3"></i>
                    +229 21 00 00 00
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope me-3"></i>
                   sgbef2024@gmail.com
                </p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social" href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social" href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="btn btn-outline-light btn-social" href="#">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Colonne Galerie -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Notre Activité</h4>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{asset('img/fneb-logo.png')}}" alt="Atelier étudiant">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('img/cat-1.jpg') }}" alt="Assemblée générale">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('img/cat-2.jpg') }}" alt="Événement culturel">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('img/fneb-4.jpg') }}" alt="Formation">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('img/cat-3.jpg') }}" alt="Conférence">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light p-1" src="{{ asset('img/course-3.jpg') }}" alt="Cérémonie">
                    </div>
                </div>
            </div>

            <!-- Colonne Newsletter -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Lettre d'information</h4>
                <p>Restez informé de nos dernières actualités et actions.</p>
                <form action="" method="POST">
                    @csrf
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input name="email" type="email" 
                               class="form-control border-0 w-100 py-3 ps-4 pe-5" 
                               placeholder="Votre email" required>
                        <button type="submit" 
                                class="btn btn-secondary py-2 position-absolute top-0 end-0 mt-2 me-2">
                            S'inscrire
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Section Copyright -->
    <div class="container">
        <div class="copyright">
            
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{ date('Y') }} <a class="border-bottom" href="/">FNEB Bénin</a>, Tous droits réservés.
                    <br>
                    <small>Développé par <a class="border-bottom" href="#">Cellule Tech FNEB</a></small>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Accueil</a>
                        <a href="">Mentions légales</a>
                        <a href="{{ route('contact') }}">Contact</a>
                        <a href="">Archives</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
    <i class="fas fa-arrow-up"></i>
</a>

<style>

:root {
            --primary-blue: #1A3D7C;
            --secondary-blue: #4D8EFF;
            --light-blue: #E6F0FF;
            --accent-gold: #D4AF37;
            --dark-gold: #B08C30;
            --light-gray: #f8f9fa;
            --dark-gray: #6c757d;
            --white: #ffffff;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }



       .footer {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: var(--white);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%234d8eff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.1;
        }

     
</style>