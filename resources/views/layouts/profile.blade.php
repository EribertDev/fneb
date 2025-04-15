@extends('master')
@section('title', 'Profile')

@section('extra-style')
<style>
    .user-profile {
        min-height: 100vh;
    }
    
    .profile-header {
        background: linear-gradient(135deg, #1A3D7C, #4D8EFF);
        padding-bottom: 4rem;
    }
    
    .avatar-wrapper {
        position: relative;
        width: 200px;
        margin: 0 auto;
    }
    
    .profile-avatar {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        border: 4px solid white;
        object-fit: cover;
    }
    
    .avatar-upload input[type="file"] {
        display: none;
    }
    
    .avatar-edit-btn {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        transition: all 0.3s;
    }
    
    .avatar-edit-btn:hover {
        transform: scale(1.1);
    }
    
    .stat-item {
        background: rgba(255,255,255,0.1);
        padding: 1rem;
        border-radius: 8px;
        text-align: center;
        min-width: 120px;
    }
    
    .stat-value {
        font-size: 1.5rem;
        font-weight: 600;
    }
    
    .stat-label {
        font-size: 0.9rem;
        opacity: 0.9;
    }
    
    .profile-nav .nav-link {
        color: #444;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        margin: 0.25rem 0;
        transition: all 0.3s;
    }
    
    .profile-nav .nav-link.active {
        background: #f0f4f9;
        color: #1A3D7C;
        font-weight: 500;
    }
    
    .profile-nav .nav-link:hover {
        background: #f8f9fa;
    }
    </style>
@endsection

@section('content')
<div class="user-profile">
    <!-- En-tête du profil -->
    <div class="profile-header bg-gradient-primary">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-4 text-center">
                    <div class="avatar-wrapper">
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}"
                             class="profile-avatar" 
                             alt="Avatar de {{ auth()->user()->name }}">
                        <form  action="{{ route('profile.avatar') }}" 
                              enctype="multipart/form-data" class="avatar-upload">
                            @csrf  @method('PUT')
                            <input type="file" name="avatar" id="avatarInput" accept="image/*">
                            <label for="avatarInput" class="avatar-edit-btn">
                                <i class="fas fa-camera"></i>
                            </label>
                        </form>
                    </div>
                </div>
                <div class="col-md-8 text-white mt-4 mt-md-0">
                    <h1 class="display-5">{{ auth()->user()->name }}</h1>
                    <p class="lead mb-0">{{ auth()->user()->role }}</p>
                    <div class="d-flex gap-3 mt-3">
                        <div class="stat-item">
                            <div class="stat-value">{{ auth()->user()->created_at->diffForHumans() }}</div>
                            <div class="stat-label">Membre depuis</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">12</div>
                            <div class="stat-label">Contributions</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="container py-5">
        <div class="row">
            <!-- Navigation secondaire -->
            <div class="col-md-3 mb-4">
                <div class="profile-nav card shadow-sm">
                    <div class="card-body">
                        <nav class="nav flex-column">
                            <a class="nav-link active" href="#personal-info">
                                <i class="fas fa-user me-2"></i>Informations personnelles
                            </a>
                            <a class="nav-link" href="#security">
                                <i class="fas fa-lock me-2"></i>Sécurité
                            </a>
                            <a class="nav-link" href="#notifications">
                                <i class="fas fa-bell me-2"></i>Notifications
                            </a>
                            <a class="nav-link" href="#activity">
                                <i class="fas fa-chart-line me-2"></i>Activité
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Section d'édition -->
            <div class="col-md-9">
                <!-- Informations personnelles -->
                <div class="card shadow-sm mb-4" id="personal-info">
                    <div class="card-header bg-white">
                        <h2 class="h5 mb-0">Informations personnelles</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf @method('PUT')

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nom complet</label>
                                    <input type="text" 
                                           name="name" 
                                           class="form-control"
                                           value="{{ old('name', auth()->user()->name) }}"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" 
                                           name="email" 
                                           class="form-control"
                                           value="{{ old('email', auth()->user()->email) }}"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Téléphone</label>
                                    <input type="tel" 
                                           name="phone" 
                                           class="form-control"
                                           value="{{ old('phone', auth()->user()->phone) }}">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>Enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Sécurité -->
                <div class="card shadow-sm mb-4" id="security">
                    <div class="card-header bg-white">
                        <h2 class="h5 mb-0">Sécurité du compte</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Mot de passe actuel</label>
                                <input type="password" 
                                       name="current_password" 
                                       class="form-control"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nouveau mot de passe</label>
                                <input type="password" 
                                       name="password" 
                                       class="form-control"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirmer le mot de passe</label>
                                <input type="password" 
                                       name="password_confirmation" 
                                       class="form-control"
                                       required>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-lock me-2"></i>Changer le mot de passe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('extra-script')
<script>
    // Prévisualisation de l'avatar
    document.getElementById('avatarInput').addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = function() {
            document.querySelector('.profile-avatar').src = reader.result;
        }
        reader.readAsDataURL(e.target.files[0]);
        this.form.submit();
    });
    </script>
@endsection