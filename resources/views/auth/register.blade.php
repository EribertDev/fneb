@extends('master')

@section('title')
    Register
@endsection
<style>
    .bg-primary-gradient {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
    }
    
    .btn-primary-gradient {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
    }
    
    .form-control {
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    
    .input-group-text {
        transition: background-color 0.3s ease;
    }
    
    /* Style personnalisé pour l'upload de fichier */
    .custom-file-input::-webkit-file-upload-button {
        visibility: hidden;
    }
    </style>
@section('extra-style')

@endsection

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center bg-light">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                <!-- En-tête avec logo -->
                <div class="card-header bg-primary-gradient text-center py-4">
                    <img src="{{asset('img/fneb-logo.png')}}" alt="FNEB Logo" class="mb-3" style="height: 80px;">
                    <h2 class="text-white mb-0 fw-bold">Adhésion à la FNEB</h2>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf

                        <!-- Nom Complet -->
                        <div class="mb-4">
                            <label for="name" class="form-label text-secondary">{{ __('Nom Complet') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-user text-primary"></i>
                                </span>
                                <input id="name" type="text" 
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                    name="name" 
                                    placeholder="Koffi Adéwalé"
                                    value="{{ old('name') }}" 
                                    required 
                                    autocomplete="name" 
                                    autofocus>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label text-secondary">{{ __('Adresse Email') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-envelope text-primary"></i>
                                </span>
                                <input id="email" type="email" 
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                    name="email" 
                                    placeholder="exemple@fneb.bj"
                                    value="{{ old('email') }}" 
                                    required 
                                    autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="mb-4">
                            <label for="password" class="form-label text-secondary">{{ __('Mot de passe') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-primary"></i>
                                </span>
                                <input id="password" type="password" 
                                    class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                    name="password" 
                                    placeholder="••••••••"
                                    required 
                                    autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Confirmation Mot de passe -->
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label text-secondary">{{ __('Confirmer le mot de passe') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-lock text-primary"></i>
                                </span>
                                <input id="password-confirm" type="password" 
                                    class="form-control form-control-lg" 
                                    name="password_confirmation" 
                                    placeholder="••••••••"
                                    required 
                                    autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Photo de profil -->
                        <div class="mb-4">
                            <label for="profile_picture" class="form-label text-secondary">{{ __('Photo de profil') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-camera text-primary"></i>
                                </span>
                                <input type="file" 
                                    class="form-control form-control-lg @error('profile_picture') is-invalid @enderror" 
                                    id="profile_picture" 
                                    name="profile_picture"
                                    accept="image/*">
                                @error('profile_picture')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <small class="text-muted">Formats acceptés : JPG, PNG (max 2MB)</small>
                        </div>

                        <!-- Bouton d'inscription -->
                        <button type="submit" class="btn btn-primary-gradient w-100 py-3 fw-bold fs-5">
                            {{ __('Créer mon compte') }}
                            <i class="fas fa-user-plus ms-2"></i>
                        </button>

                        <!-- Lien de connexion -->
                        <div class="text-center mt-4">
                            <p class="text-secondary mb-0">
                                Déjà membre ? 
                                <a href="{{ route('login') }}" class="text-primary text-decoration-none">
                                    Connectez-vous ici
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')

@endsection