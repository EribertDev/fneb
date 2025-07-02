@extends('master')
@section('title') Blog @endsection
@section('extra-style')


<style>
    .blog-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      
    }
    
    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
    }
    
    .featured {
        min-height: 300px;
    }
    
    .avatar {
        width: 30px;
        height: 30px;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .blog-sidebar .card {
        border-radius: 1rem;
    }
    
    .nav-pills .nav-link {
        transition: all 0.3s ease;
    }
    
    .nav-pills .nav-link.active {
        background: var(--bs-primary);
        color: white !important;
    }
    
    .social-share {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .blog-card:hover .social-share {
        opacity: 1;
    }




.blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.avatar {
  
    object-fit: cover;
}

.featured {
    border: 2px solid #1A3D7C;
}

.pagination .page-link {
    color: #1A3D7C;
}

.pagination .page-item.active .page-link {
    background: #1A3D7C;
    border-color: #1A3D7C;
}
    </style>
@endsection

@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Blog</h1>
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

<section class="student-blog py-5 bg-light">
    <div class="container">
        <!-- En-tête -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold mb-3">Le Blog des Étudiants</h1>
            <form action="{{ route('blog') }}" method="GET">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <input type="text" class="form-control" 
                                   name="search" 
                                   placeholder="Rechercher un article..."
                                   value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <nav class="blog-categories mt-4">
                <div class="nav nav-pills justify-content-center">
                    <a href="{{ route('blog') }}" 
                       class="nav-link {{ !request('category') ? 'active' : '' }}">
                        Tous
                    </a>
                    @foreach(['sante', 'academique', 'emploi', 'culture','logement','evenements','transport','restauration','autre'] as $category)
                    <a href="?category={{ $category }}" 
                       class="nav-link {{ request('category') === $category ? 'active' : '' }}">
                        {{ ucfirst($category) }}
                    </a>
                    @endforeach
                </div>
            </nav>
        </div>

        <!-- Contenu principal -->
        <div class="row g-4">
            <!-- Articles -->
            <div class="col-lg-8">
                <div class="row g-4" data-masonry='{"percentPosition": true}'>
                    @forelse($posts as $post)
                    <div class="{{ $loop->first ? 'col-12' : 'col-md-6' }}">
                        <article class="blog-card {{ $loop->first ? 'featured' : '' }} bg-white rounded-3 shadow-lg overflow-hidden">
                            @if($post->image)
                            <div class="row g-0">
                                <div class="{{ $loop->first ? 'col-md-6' : 'col-12' }}">
                                    <img src="{{ Storage::url($post->image) }}" 
                                         class="img-fluid h-100 object-fit-cover" 
                                         alt="{{ $post->title }}">
                                </div>
                                <div class="{{ $loop->first ? 'col-md-6' : 'col-12' }} p-4 d-flex flex-column">
                                    @endif
                                    
                                    <div class="mb-2">
                                        @if($loop->first && $post->created_at->diffInDays() < 7)
                                        <span class="badge bg-primary">Nouveau</span>
                                        @endif
                                        <span class="badge bg-warning text-dark ms-2">
                                            {{ ucfirst($post->category) }}
                                        </span>
                                    </div>
                                    <h2 class="{{ $loop->first ? 'h3' : 'h5' }}">{{ $post->title }}</h2>
                                    <p class="flex-grow-1">{{ Str::limit(strip_tags($post->content), 120) }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="author-info">
                                            <img src="{{ $post->editor->profile_picture ? Storage::url($post->editor->profile_picture) : asset('default-avatar.png') }}"
                                                 class="avatar rounded-circle" 
                                                 alt="{{ $post->editor->name }}">
                                            <span class="ms-2">{{ $post->editor->name }}</span>
                                        </div>
                                        <a href="{{route('post.show',$post)}}" class="btn btn-outline-primary">
                                            Lire →
                                        </a>
                                    </div>
                                    
                                    @if($post->image)
                                </div>
                            </div>
                            @endif
                        </article>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <h3>Aucun article trouvé</h3>
                        <a href="{{ route('blog') }}" class="btn btn-primary">
                            Voir tous les articles
                        </a>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if($posts->hasPages())
                <nav class="mt-5">
                    {{ $posts->appends(request()->query())->links() }}
                </nav>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="blog-sidebar sticky-top">
                    <!-- Newsletter -->
                    @if(session('newsletter_success'))
                        <div class="alert alert-success mb-3">
                            {{ session('newsletter_success') }}
                        </div>
                    @endif
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-body text-center bg-primary text-white rounded-3">
                            <i class="fas fa-envelope-open-text fa-3x mb-3"></i>
                            <h3 class="h5">Abonnez-vous à notre newsletter</h3>
                            <form action="{{ route('newsletter.subscribe') }}" method="POST">
                                @csrf
                                <input type="email" name="email" class=" mb-2 form-control @error('email') is-invalid @enderror"  required placeholder="Votre email">
                                <button type="submit" class="btn btn-light w-100">S'abonner</button>
                                    @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                            </form>
                        </div>
                    </div>

                    <!-- Articles populaires -->
                    <div class="card mb-4 border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="h5 mb-3">📌 Articles populaires</h4>
                            <div class="list-group">
                                @foreach($popularPosts as $post)
                                <a href="{{route('post.show',$post)}}" 
                                   class="list-group-item list-group-item-action d-flex align-items-center">
                                    <span class="badge bg-primary me-2">{{ $loop->iteration }}</span>
                                    <span>{{ $post->title }}</span>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Médias sociaux -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h4 class="h5 mb-3">💬 Rejoignez la communauté</h4>
                            <div class="d-flex gap-3 fs-4">
                                @foreach(config('social_links') as $network => $url)
                                <a href="{{ $url }}" class="text-primary" target="_blank">
                                    <i class="fab fa-{{ $network }}"></i>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('extra-script')
<!-- Librairies nécessaires -->
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
@endsection