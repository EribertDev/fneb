@extends('master')
@section('title', 'Paiement Terminé')
@section('extra-style')
<style>
    .success-card {
        background: white;
        padding: 2rem;
        border-radius: 20px;
        margin: 3rem 0;
        border-top: 10px solid #2d1fad;
    }
    
    .checkmark-animation {
        position: relative;
        width: 100px;
        height: 100px;
        margin: 0 auto 2rem;
    }
    
    .circle {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: #0055A4;
        animation: scaleIn 0.5s ease-out;
    }
    
    .check {
        position: absolute;
        left: 25%;
        top: 45%;
        width: 40px;
        height: 20px;
        border-left: 4px solid white;
        border-bottom: 4px solid white;
        transform: rotate(-45deg);
        animation: drawCheck 0.9s ease-out;
    }
    
    @keyframes scaleIn {
        from { transform: scale(0); }
        to { transform: scale(1); }
    }
    
    @keyframes drawCheck {
        0% { width: 0; height: 0; }
        100% { width: 40px; height: 20px; }
    }
    
    .success-logo {
        width: 120px;
        margin: 2rem 0;
    }
    
    .btn-return {
        background: #FFD700;
        color: #2a0a0c;
        padding: 1rem 2rem;
        border-radius: 8px;
        margin-top: 2rem;
        display: inline-block;
    }
    
 
    </style>
@endsection

@section('content')
<div class="success-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="success-card shadow-lg">
                    <div class="checkmark-animation">
                        <div class="circle"></div>
                        <div class="check"></div>
                    </div>
                    
                    <img src="{{ asset('img/fneb-logo.png') }}" alt="FNEB" class="success-logo">
                    
                    <h1 class="text-primary mb-4">Merci pour votre don !</h1>
                    
                    <div class="success-details">
                        <p>Votre contribution   a bien été reçue.</p>
                     
                    </div>

                    <a href="{{ route('home') }}" class="btn-return">
                        <i class="fas fa-arrow-left me-2"></i>
                        Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection