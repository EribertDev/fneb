@extends('dashboard')
@section('title', isset($actualite) ? 'Modifier Actualité' : 'Créer Actualité')
@section('extra-style')
<script src="https://cdn.tiny.cloud/1/t40a2vy1t3kvif8uykya569m0q32gcscadunfjc11yysp33x/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

@endsection
@section('content')
<div class="container-fluid">
    <div class="card shadow-lg mt-3">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">{{ isset($actualite) ? 'Modifier' : 'Créer' }} une Actualité</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ isset($actualite) ? route('admin.actualites.update', $actualite) : route('admin.actualites.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($actualite)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input type="text" name="titre" value="{{ old('titre', $actualite->titre ?? '') }}" class="form-control" required>
                </div>

                <div class="mb-3">
                   
                        <label class="form-label">Sous-Titre</label>
                        <input type="text" name="subtitre" value="{{ old('subtitre', $actualite->subtitre ?? '') }}" class="form-control" required>
                    
                </div>

                <div class="mb-3">
                    <label class="form-label">Contenu</label>
                    <textarea  id ="contenu" name="contenu" class="form-control" rows="5" required>{{ old('contenu', $actualite->contenu ?? '') }}</textarea>
                </div>
                
                <div class="mb-2">
                    <div class="row">
                        <!-- Select pour le type -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Type</label>
                            <select name="type" class="form-select" required>
                                <option value="info" {{ old('type', $actualite->type ?? '') == 'info' ? 'selected' : '' }}>Information</option>
                                <option value="event" {{ old('type', $actualite->type ?? '') == 'event' ? 'selected' : '' }}>Événement</option>
                                <option value="alert" {{ old('type', $actualite->type ?? '') == 'alert' ? 'selected' : '' }}>Alerte</option>
                            </select>
                        </div>
                    
                        <!-- Select pour le statut -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Statut</label>
                            <select name="status" class="form-select" required>
                                <option value="draft" {{ old('status', $actualite->status ?? '') == 'draft' ? 'selected' : '' }}>Brouillon</option>
                                <option value="published" {{ old('status', $actualite->status ?? '') == 'published' ? 'selected' : '' }}>Publié</option>
                                <option value="archived" {{ old('status', $actualite->status ?? '') == 'archived' ? 'selected' : '' }}>Archivé</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    @if(isset($actualite) && $actualite->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $actualite->image) }}" alt="Image actuelle" style="max-height: 200px;">
                        </div>
                    @endif
                </div>

               

                <button type="submit" class="btn btn-primary">
                    {{ isset($actualite) ? 'Mettre à jour' : 'Créer' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('extra-script')
<script src="https://cdn.tiny.cloud/1/t40a2vy1t3kvif8uykya569m0q32gcscadunfjc11yysp33x/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>

 


    tinymce.init({
        selector: '#contenu',
        plugins: 'link lists image code',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code',
        height: 400,
        content_style: 'body { font-family: Arial, sans-serif; font-size:16px }'
    });

</script>
@endsection