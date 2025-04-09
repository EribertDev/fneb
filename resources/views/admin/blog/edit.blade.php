@extends('dashboard')
@section('title', 'BlogCreate')

@section('extra-style')
<script src="https://cdn.tiny.cloud/1/t40a2vy1t3kvif8uykya569m0q32gcscadunfjc11yysp33x/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<style>
    .form-container {
        max-width: 800px;
        margin: 2rem auto;
        padding: 0 1rem;
    }
    
    .form-container h2 {
        color: #1A3D7C;
        font-size: 2rem;
        margin-bottom: 2rem;
        text-align: center;
    }
    
    .post-form {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .form-group label {
        display: block;
        color: #1A3D7C;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    
    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        padding: 0.8rem;
        border: 2px solid #1A3D7C;
        border-radius: 8px;
        font-size: 1rem;
    }
    
    .form-group textarea {
        resize: vertical;
        min-height: 150px;
    }
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .error {
        border-color: #dc3545 !important;
    }
    
    .error-message {
        color: #dc3545;
        margin-top: 0.5rem;
        font-size: 0.9rem;
    }
    
    .file-input {
        position: relative;
        overflow: hidden;
    }
    
    .file-input input[type="file"] {
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }
    
    .file-button {
        display: inline-block;
        background: #1A3D7C;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 6px;
        cursor: pointer;
    }
    
    .file-name {
        margin-left: 1rem;
        color: #666;
    }
    
    .form-actions {
        border-top: 1px solid #eee;
        padding-top: 1.5rem;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }
    
    .cancel-btn {
        padding: 0.8rem 1.5rem;
        border: 2px solid #1A3D7C;
        border-radius: 8px;
        color: #1A3D7C;
        text-decoration: none;
        transition: background 0.3s;
    }
    
    .cancel-btn:hover {
        background: #f0f4f9;
    }
    
    .submit-btn {
        background: linear-gradient(to right, #1A3D7C, #4D8EFF);
        color: white;
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: opacity 0.3s;
    }
    
    .submit-btn:hover {
        opacity: 0.9;
    }
    
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }
    </style>
@endsection

@section('content')

<<div class="form-container">
    <h2>{{ isset($post) ? 'Modifier l\'article' : 'Nouvel Article' }}</h2>

    <form class="post-form" method="POST" 
          action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}"
          enctype="multipart/form-data">
        @csrf
        @isset($post) @method('PUT') @endisset

        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="title" 
                   value="{{ old('title', $post->title ?? '') }}"
                   class="{{ $errors->has('title') ? 'error' : '' }}">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label>Contenu</label>
            <textarea name="content"
                        id="contentInput" 
                      class="{{ $errors->has('content') ? 'error' : '' }}"
                      rows="8">{{ old('content', $post->content ?? '') }}</textarea>
            @error('content')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Image mise en avant</label>
                <div class="file-input">
                    <input type="file" name="image">
                    <span class="file-button">Choisir un fichier</span>
                    <span class="file-name"></span>
                </div>
            </div>

            <div class="form-group">
                <label>Catégorie</label>
                <select name="category">
                    @foreach(['sante', 'academique', 'emploi', 'culture','logement','evenements','technology','autre'] as $category)
                    <option value="{{ $category }}" {{ (old('category', $post->category ?? '') === $category ? 'selected' : '') }}>
                        {{ ucfirst($category) }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Tags (séparés par des virgules)</label>
                @php
                $tags = '';
                if (isset($post) && $post->tags) {
                    $decoded = json_decode($post->tags, true);
                    if (is_array($decoded)) {
                        $tags = implode(',', $decoded);
                    } else {
                        // Si json_decode ne retourne pas un tableau, on utilise la valeur brute
                        $tags = $post->tags;
                    }
                }
            @endphp
            
            <input type="text" name="tags" value="{{ old('tags', $tags) }}">
            
            </div>

            @isset($post)
            <div class="form-group">
                <label>Statut</label>
                <select name="status">
                    @foreach(['draft', 'published', 'archived'] as $status)
                    <option value="{{ $status }}" {{ (old('status', $post->status) === $status) ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                    @endforeach
                </select>
            </div>
            @endisset

            
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.posts.index') }}" class="cancel-btn">Annuler</a>
            <button type="submit" class="submit-btn">
                {{ isset($post) ? 'Mettre à jour' : 'Publier' }}
            </button>
        </div>
    </form>
</div>
@endsection

@section('extra-script')
<script>
    document.querySelector('.file-input input[type="file"]').addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Aucun fichier choisi';
        this.nextElementSibling.textContent = fileName;
    });
</script>

<script src="https://cdn.tiny.cloud/1/t40a2vy1t3kvif8uykya569m0q32gcscadunfjc11yysp33x/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    tinymce.init({
        selector: '#contentInput',
        plugins: 'link lists image code',
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright | bullist numlist | link image | code',
        height: 400,
        content_style: 'body { font-family: Arial, sans-serif; font-size:16px }'
    });
});
</script>
@endsection