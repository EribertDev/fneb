<!-- Footer Start -->
<div class="container-fluid bg-primary text-light footer pt-5 mt-5">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Colonne Liens rapides -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">FNEB Bénin</h4>
                <a class="btn btn-link" href="">Notre Mission</a>
                <a class="btn btn-link" href="">Adhésion</a>
                <a class="btn btn-link" href="">Événements</a>
                <a class="btn btn-link" href="{{ route('blog') }}">Blog Étudiant</a>
                <a class="btn btn-link" href="">FAQ</a>
            </div>

            <!-- Colonne Contact -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Nous Contacter</h4>
                <p class="mb-2">
                    <i class="fa fa-map-marker-alt me-3"></i>
                    Cotonou, Bénin - Siège National
                </p>
                <p class="mb-2">
                    <i class="fa fa-phone-alt me-3"></i>
                    +229 21 00 00 00
                </p>
                <p class="mb-2">
                    <i class="fa fa-envelope me-3"></i>
                    contact@fnebbenin.org
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