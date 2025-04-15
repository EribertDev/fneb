@extends('dashboard')
@section('title', 'Ajouter Menbre')
@section('extra-style')

@endsection

@section('content')


<div class="container-fluid">
    <div class="card shadow-lg mt-3">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">'Créer  un Menbre</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nom complet</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label>Poste</label>
                    <input type="text" name="position" class="form-control" required>
                  
                </div>
                
                <div class="mb-3">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" required>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" name="is_visible" class="form-check-input">
                    <label class="form-check-label">Visible sur l'accueil</label>
                </div>
                
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>

@endsection

