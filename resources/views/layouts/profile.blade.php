@extends('master')
@section('title', 'Profile')

@section('extra-style')
<style>
    .profile-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 1rem;
    }
    
    .profile-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        padding: 2rem;
    }
    
    .profile-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .avatar-edit {
        position: relative;
        width: 150px;
        margin: 0 auto 1rem;
    }
    
    .profile-avatar {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #0055A4;
    }
    
    .avatar-upload-btn {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background: #0055A4;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.3s;
    }
    
    .avatar-upload-btn:hover {
        transform: scale(1.1);
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .btn-primary {
        background: #0055A4;
        border: none;
        padding: 1rem;
        font-size: 1.1rem;
        transition: background 0.3s;
    }
    
    .btn-primary:hover {
        background: #003F7F;
    }
    </style>
    
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-card">
        <!-- En-tête avec photo -->
        <div class="profile-header">
            <div class="avatar-edit">
                <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('default-avatar.png') }}" 
                     class="profile-avatar"
                     alt="Avatar">
                <form method="POST" action="{{ route('profile.update.avatar') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="profile_picture" id="avatarInput" hidden>
                    <label for="avatarInput" class="avatar-upload-btn">
                        <i class="fas fa-camera"></i>
                    </label>
                </form>
            </div>
            <h2>{{ Auth::user()->name }}</h2>
            <p class="text-muted">{{ Auth::user()->email }}</p>
        </div>

        <!-- Formulaire de modification -->
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nom complet</label>
                <input type="text" 
                       name="name" 
                       value="{{ old('name', Auth::user()->name) }}" 
                       class="form-control"
                       required>
            </div>

        
            <button type="submit" class="btn btn-primary w-100">
                <i class="fas fa-save me-2"></i>Enregistrer
            </button>
        </form>
    </div>
</div>

@endsection


@section('extra-script')
    <script>
    document.getElementById('avatarInput').addEventListener('change', function() {
        this.form.submit();
    });
    </script>
@endsection