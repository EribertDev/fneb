@extends('master')

@section('title')
    Register
@endsection

@section('extra-style')
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
    ss
    .input-group-text {
        transition: background-color 0.3s ease;
    }
    </style>
    
@endsection
@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center bg-light">
    <div class="row justify-content-center w-100">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                <!-- En-tête avec logo -->
                <div class="card-header bg-primary-gradient text-center py-4">
                    <img src="{{asset('img/fneb-logo.png')}}" alt="FNEB Logo" class="mb-3" style="height: 80px;">
                    <h2 class="text-white mb-0 fw-bold">Espace Membre FNEB</h2>
                </div>

                <div class="card-body p-5">
                    <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                        @csrf

                        <!-- Email Input -->
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
                                    autocomplete="email" 
                                    autofocus>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Input -->
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
                                    autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label text-secondary" for="remember">
                                    {{ __('Se souvenir de moi') }}
                                </label>
                            </div>
                            <a href="" class="text-decoration-none text-primary">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary-gradient w-100 py-3 fw-bold fs-5">
                            {{ __('Se connecter') }}
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>

                        <!-- Registration Link -->
                        <div class="text-center mt-4">
                            <p class="text-secondary mb-0">
                                Nouveau membre ? 
                                <a href="{{ route('register') }}" class="text-primary text-decoration-none">
                                    Créer un compte
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