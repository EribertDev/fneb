@extends('master')
@section('title', 'Dons')
@section('extra-style')
<style>
    .donation-hero {
        min-height: 100vh;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        padding: 2rem 0;
    }
    
    .hero-logo {
        width: 150px;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
    }
    
    .donate-cta {
        background: #FFD700;
        color: #0055A4;
        padding: 1.5rem 3rem;
        border-radius: 50px;
        font-size: 1.25rem;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(0,85,164,0.3);
    }
    
    .donate-cta:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(0,85,164,0.4);
        color: #0055A4;
    }
    
    .security-note {
        color: rgba(255,255,255,0.9);
        font-size: 0.9rem;
    }
    
    @media (max-width: 768px) {
        .donate-cta {
            padding: 1rem 2rem;
            font-size: 1.1rem;
        }
        
        h1 { font-size: 2rem; }
        .lead { font-size: 1rem; }
    }
    </style>
@endsection

@section('content')



<section class="donation-hero" style="background-image: linear-gradient(rgba(0, 85, 164, 0.85), url('fneb-banner.jpg');">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <img src="{{asset('img/fneb-logo.png')}}" alt="FNEB" class="hero-logo mb-4">
                
                <h1 class="text-white mb-3">Votre Soutien Compte</h1>
                <p class="lead text-white mb-5">Contribuez à l'avenir de l'éducation étudiante au Bénin</p>

                <button
                onclick="window.location.href='https://sandbox-me.fedapay.com/dlbpa4mV'"
                  class="donate-cta">
                    <i class="fas fa-hand-holding-heart me-2"></i>
                    Faire un don maintenant
                </button>

                <div class="security-note mt-4">
                    <i class="fas fa-lock"></i>
                    <span>Paiement 100% sécurisé</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection




