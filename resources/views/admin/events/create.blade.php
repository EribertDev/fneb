@extends('dashboard')
@section('title')   Create Events @endsection

@section('content')
<div class="container-fluid">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ isset($evenement) ? 'Modifier' : 'Créer' }} un Événement</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ isset($evenement) ? route('admin.evenements.update', $evenement) : route('admin.evenements.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($evenement)) @method('PUT') @endif

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Titre *</label>
                        <input type="text" name="titre" value="{{ old('titre', $evenement->titre ?? '') }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Type *</label>
                        <input type="text" name="type" value="{{ old('type', $evenement->type ?? '') }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Lieu *</label>
                        <input type="text" name="lieu" value="{{ old('lieu', $evenement->lieu ?? '') }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Date/Heure *</label>
                        <input type="datetime-local" name="date_heure" value="{{ old('date_heure', isset($evenement) ? $evenement->date_heure->format('Y-m-d\TH:i') : '') }}" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Statut *</label>
                        <select name="statut" class="form-select" required>
                            <option value="a_venir" {{ (old('statut', $evenement->statut ?? '') === 'a_venir') ? 'selected' : '' }}>À venir</option>
                            <option value="termine" {{ (old('statut', $evenement->statut ?? '') === 'termine') ? 'selected' : '' }}>Terminé</option>
                            <option value="annule" {{ (old('statut', $evenement->statut ?? '') === 'annule') ? 'selected' : '' }}>Annulé</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                        @if(isset($evenement) && $evenement->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $evenement->image) }}" alt="Image actuelle" style="max-height: 150px;">
                            </div>
                        @endif
                    </div>

                    <div class="col-12 mb-3">
                        <label class="form-label">Description *</label>
                        <textarea name="description" class="form-control" rows="5" required>{{ old('description', $evenement->description ?? '') }}</textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ isset($evenement) ? 'Mettre à jour' : 'Créer' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection