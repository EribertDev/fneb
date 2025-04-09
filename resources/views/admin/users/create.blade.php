@extends('master')

@section('title')
    Admin Dashboard
@endsection

@section('extra-style')

@endsection

@section('content')

<div class="container">
    <h1>Créer un utilisateur</h1>
    <form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nom</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">Confirmer le mot de passe</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <label for="role">Rôle</label>
            <select id="role" name="role" class="form-control @error('role') is-invalid @enderror" required>
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
                <option value="user">User</option>
            </select>
            @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <input id="profile_picture" name="profile_picture" type="file" class="form-control @error('profile_picture') is-invalid @enderror">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Créer</button>
        </div>
    </form>
</div>

@endsection

@section('extra-script')

@endsection