@extends('master')
@section('title', 'Dons')
@section('extra-style')
<style>
    .donation-hero {
        padding: 100px 0;
        background-size: cover;
        background-position: center;
    }
    
    .donation-logo {
        width: 150px;
        margin-bottom: 2rem;
    }
    
    .donation-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        border: 2px solid #FFD700;
    }
    
    .btn-amount {
        background: #0055A410;
        border: 2px solid #0055A4;
        color: #0055A4;
        margin: 0.5rem;
        padding: 1rem 2rem;
        border-radius: 10px;
        transition: all 0.3s;
    }
    
    .btn-amount:hover {
        background: #0055A4;
        color: white;
    }
    
    .btn-donate {
        background: #A12C2F;
        color: white;
        width: 100%;
        padding: 1.2rem;
        border-radius: 12px;
        font-size: 1.2rem;
        transition: transform 0.3s;
    }
    
    .btn-donate:hover {
        background: #821F22;
        transform: translateY(-2px);
    }
    
    .security-info {
        color: #0055A4;
        font-size: 0.9rem;
    }
</style>
@endsection

@section('content')
<div class="donation-page">
    <div class="donation-hero" style="background-image: linear-gradient(rgba(0, 85, 164, 0.9), url('{{ asset('img/fneb-logo.png') }}')">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <img src="{{asset('img/fneb-logo.png')}}" alt="FNEB" class="donation-logo">
                    <h1 class="text-white mb-4">Soutenir la FNEB</h1>
                    <p class="lead text-white">Votre contribution renforce l'éducation au Bénin</p>
                </div>
            </div>
        </div>
    </div>

    <div class="donation-form-section ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="donation-card shadow-lg">
                        <h2 class="text-center mb-4">Faire un don</h2>
                            <div class="form-group">
                                <label class="form-label">Montant du don (XOF)</label>
                                <div class="amount-buttons">
                                    <button type="button" class="btn-amount">5 000</button>
                                    <button type="button" class="btn-amount">10 000</button>
                                    <button type="button" class="btn-amount">20 000</button>
                                    <input type="number" 
                                           class="form-control custom-amount" 
                                           placeholder="Autre montant">
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <label class="form-label">Moyen de paiement</label>
                                <select class="form-select">
                                    <option>Mobile Money</option>
                                    <option>Carte Bancaire</option>
                                    <option>Virement</option>
                                </select>
                            </div>

                            <button  
                                    class="btn-donate mt-4"
                                    onclick="window.location.href='https://sandbox-me.fedapay.com/dlbpa4mV'">
                                <i class="fas fa-hand-holding-heart me-2"></i>
                                Faire un don maintenant
                            </button>
                      
                    </div>

                    <div class="security-info mt-4 text-center">
                        <i class="fas fa-lock"></i>
                        <span>Paiement 100% sécurisé</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




