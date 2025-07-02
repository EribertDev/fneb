@extends('master')
@section('title') Blog @endsection
    if @isset($post)
      
        @section('title-article'){{ $post->title }}@endsection
        @section('description-article'){{ Str::limit(strip_tags($post->content), 160) }}@endsection
       
        
    @endisset

@section('extra-style')
<style>
    .blog-detail {
        background: #f8f9fa;
    }
    
    .avatar {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }
    
    .post-content {
        line-height: 1.8;
        color: #444;
    }
    
    .img-content {
        width: 100%;
        height: 500px;
        border-radius: 8px;
        margin: 2rem 0;
    }
    
    .rating-stars {
        display: flex;
        gap: 0.5rem;
        direction: rtl;
    }
    
    .rating-stars input {
        display: none;
    }
    
    .rating-stars label {
        font-size: 1.5rem;
        color: #ddd;
        cursor: pointer;
        transition: color 0.3s;
    }
    
    .rating-stars input:checked ~ label,
    .rating-stars label:hover,
    .rating-stars label:hover ~ label {
        color: #ffc107;
    }
    
    .comment-card {
        transition: background-color 0.3s;
    }
    
    .comment-card:hover {
        background-color: #f8f9fa;
    }
    
    .related-posts .card {
        transition: transform 0.3s;
    }
    
    .related-posts .card:hover {
        transform: translateY(-5px);
    }
    </style>
@endsection

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">BlogDetails</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="">Acceuil</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page" href="{{route('blog')}}">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
</div>

<!-- Header End -->

<section class="blog-detail py-5">
    <div class="container">
        <!-- Article principal -->
        <article class="bg-white rounded-3 shadow-lg mb-5">
            <!-- Image de l'article -->
            @if($post->image)
            <img src="{{ asset('storage/'.$post->image) }}" 
                 class=" img-content img-fluid rounded-top" 
                 alt="{{ $post->title }}">
            @endif

            <div class="p-5">
                <!-- En-tête -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center gap-3">
                        <img  src="{{ $post->editor->profile_picture ? Storage::url($post->editor->profile_picture) : asset('default-avatar.png') }}"
                             class="avatar rounded-circle" 
                             alt="{{ $post->editor->name }}">
                        <div>
                            <h5 class="mb-0">{{ $post->editor->name }}</h5>
                            <small class="text-muted">
                                Publié le {{ $post->publication_date->translatedFormat('d M Y') }}
                            </small>
                        </div>
                    </div>
                    <span class="badge bg-primary fs-6">{{ ucfirst($post->category) }}</span>
                </div>

                <!-- Contenu -->
                <h1 class="display-5 fw-bold mb-4 text-primary">{{ $post->title }}</h1>
                <div class="post-content fs-5">
                    {!! $post->content !!}
                </div>

                <!-- Évaluation -->
                <div class="rating-section border-top pt-4 mt-5">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <h3 class="h4">Évaluation de l'article</h3>
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $averageRating ? 'text-warning' : 'text-secondary' }}"></i>
                                @endfor
                                <span class="ms-2">({{ $ratingsCount }} avis)</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @if(!$hasRated)
                            <form method="POST" action="{{ route('posts.rate', $post) }}">
                                @csrf
                                <div class="d-flex align-items-center gap-3">
                                    <div class="rating-stars">
                                        @for($i = 5; $i >= 1; $i--)
                                            <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}">
                                            <label for="star{{ $i }}" class="fas fa-star"></label>
                                        @endfor
                                    </div>
                                    <button type="submit" class="btn btn-primary">Noter</button>
                                </div>
                                @error('rating')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </form>
                            @else
                            <div class="alert alert-info mb-0">
                                Merci d'avoir noté cet article !
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- Commentaires -->
        <div class="comments-section bg-white rounded-3 shadow-lg p-5">
            <h2 class="h3 mb-4 text-primary">💬 Commentaires ({{ $post->comments_count }})</h2>

            @auth
            <!-- Formulaire de commentaire -->
            <form method="POST" action="{{ route('comments.store', $post) }}" class="mb-5">
                @csrf
                <div class="form-group">
                    <textarea name="content" 
                              class="form-control @error('content') is-invalid @enderror" 
                              rows="4" 
                              placeholder="Votre commentaire..."></textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Publier</button>
            </form>
            @else
            <div class="alert alert-warning">
                <a href="{{ route('login') }}" class="text-primary">Connectez-vous</a> pour laisser un commentaire
            </div>
            @endauth

            <!-- Liste des commentaires -->
            <div class="comments-list">
                @forelse($comments as $comment)
                <div class="comment-card border-bottom pb-4 mb-4">
                    <div class="d-flex gap-3">
                        <img  src="{{$comment->user->profile_picture ? Storage::url($post->editor->profile_picture) : asset('default-avatar.png') }}"
                             class="avatar rounded-circle" 
                             alt="{{ $comment->user->name }}">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-2">
                                <div>
                                    <h5 class="mb-0">{{ $comment->user->name }}</h5>
                                    <small class="text-muted">
                                        {{ $comment->created_at->diffForHumans() }}
                                    </small>
                                </div>
                                @can('delete', $comment)
                                <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endcan
                            </div>
                            <p class="mb-0">{{ $comment->content }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-4">
                    Aucun commentaire pour le moment
                </div>
                @endforelse

                {{ $comments->links() }}
            </div>
        </div>

        <!-- Articles similaires -->
        <div class="related-posts mt-5">
            <h3 class="h4 mb-4 text-primary">📚 Articles similaires</h3>
            <div class="row g-4">
                @foreach($relatedPosts as $related)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('storage/'.$related->image) }}" 
                             class="card-img-top" 
                             alt="{{ $related->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $related->title }}</h5>
                            <a href="{{ route('posts.show', $related) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection





@section('extra-script')

@endsection