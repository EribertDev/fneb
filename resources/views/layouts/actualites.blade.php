@extends('master')
@section('title') Actualités @endsection
@section('extra-style')
<style>
    .news-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }
    
    .news-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.15)!important;
    }
    
    .news-gallery {
        height: 250px;
        overflow: hidden;
    }
    
    .news-gallery img {
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .news-gallery:hover img {
        transform: scale(1.05);
    }
    
    .photo-count {
        font-size: 0.8rem;
        backdrop-filter: blur(2px);
        background-color: rgba(0,0,0,0.5)!important;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 8%;
    }
    
    .social-share {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .news-card:hover .social-share {
        opacity: 1;
    }
    
    .card-title {
        min-height: 3rem;
    }
    </style>
@endsection

@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Actualités</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="">Acceuil</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page" href="" >Actualités</li>
                        </ol>   
                    </nav>
                </div>  
            </div>
        </div>
    </div>
    <!-- Header End -->

   <!-- Actualités Start -->

   <section class="news-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Actualités de la FNEB</h2>
        
        <div class="row g-4" data-masonry='{"percentPosition": true}'>
            @foreach($news as $actualite)
            <div class="col-md-6 col-lg-4">
                <article class="news-card card h-100 shadow-lg border-0">
                    
                    <img src="{{ asset('storage/' .$actualite->photo) }}"  class="card-img-top" alt="{{ $actualite->title }}"
                    style="height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small class="text-muted">{{ $actualite->created_at->translatedFormat('d M Y') }}</small>
                            <small class="text-primary">
                                <i class="fas fa-eye me-1"></i>{{ $actualite->views ?? 0 }}
                            </small>
                        </div>
                        <h3 class="card-title h5">{{ $actualite->titre }}</h3>
                        <p class="card-text">{{ Str::limit($actualite->subtitre, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('actualites.show', $actualite->id) }}" class="btn btn-outline-primary btn-sm">Lire la suite</a>
                            <div class="social-share">
                                <button class="btn btn-link text-muted"><i class="fab fa-facebook"></i></button>
                                <button class="btn btn-link text-muted"><i class="fab fa-twitter"></i></button>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <nav class="mt-5">
            <div class="d-flex justify-content-center">
                {{ $news->links() }}
            </div>
        </nav>
        
    </div>
</section>

      


@endsection
@section('extra-script')
    <script>
        // Initialisation de Masonry
        var grid = document.querySelector('.row');
        var msnry = new Masonry(grid, {
            itemSelector: '.col-md-6',
            columnWidth: '.col-md-6',
            percentPosition: true
        });

        <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js"></script>
    </script>