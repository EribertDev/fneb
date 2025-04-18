@extends('master')
@section('title') Actualités @endsection
@section('og-title', $news->titre)
@section('og-description', Str::limit(strip_tags( $news->contenu), 150))
@section('og-image', asset('storage/' .  $news->image))
@section('og-url', route('actualites.show',  $news->id))
@section('extra-style')
<style>
    .btn-facebook { background: #3b5998; color: white; }
.btn-twitter { background: #1da1f2; color: white; }
.btn-whatsapp { background: #25d366; color: white; }
.btn-copy-link { background: #6c757d; color: white; }

.social-share-btn:hover {
    opacity: 0.9;
    color: white;
}

/* Animation tooltip */
.tooltip-inner {
    background: var(--fneb-blue);
    font-size: 0.9em;
}

.bs-tooltip-top .tooltip-arrow::before {
    border-top-color: var(--fneb-blue);
}
    .media-gallery {
        position: sticky;
        top: 20px;
    }
    
    .thumbnails img {
        transition: transform 0.3s ease, opacity 0.3s ease;
        cursor: pointer;
    }
    
    .thumbnails img:hover {
        transform: scale(1.05);
    }
    
    .thumbnails img.active {
        box-shadow: 0 0 0 3px var(--bs-primary);
        opacity: 1 !important;
    }
    
    .key-points {
        background: linear-gradient(135deg, #008751 0%, #006441 100%);
    }
    
    .btn-facebook { background: #1877F2; color: white; }
    .btn-twitter { background: #1DA1F2; color: white; }
    .btn-whatsapp { background: #25D366; color: white; }
    
    .article-content {
        font-size: 1.05rem;
        line-height: 1.7;
    }
    
    .related-articles .card {
        border: none;
        transition: transform 0.3s ease;
    }
    
    .related-articles .card:hover {
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
                    <h1 class="display-3 text-white animated slideInDown">Actualités</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb   justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="">Acceuil</a></li> 
                            <li class="breadcrumb
                            -item text-white active" aria-current="page" href="{{route('actualites')}}">Actualités</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

  <!-- Vue détaillée d'une actualité -->
<section class="news-detail py-5 bg-light">
    <div class="container">
        <!-- Fil d'Ariane -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/actualites">Actualités</a></li>
                <li class="breadcrumb-item active" aria-current="page">Détail</li>
            </ol>
        </nav>

        <!-- En-tête de l'article -->
        <header class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    {{-- Affichage dynamique des catégories (ou badges) --}}
                  
                    {{-- Statut de l'actualité --}}
                    @if($news->status == 'published')
                        <span class="badge bg-warning text-dark ms-2">Publié</span>
                    @else
                        <span class="badge bg-warning text-dark ms-2">{{ ucfirst($news->status) }}</span>
                    @endif
                </div>
                <small class="text-muted">Publié le {{ $news->created_at->format('d/m/Y') }}</small>
            </div>
            <h1 class="display-5 fw-bold">{{ $news->titre }}</h1>
            <div class="d-flex gap-4 mt-3 text-muted">
             
            </div>
        </header>
    
        <div class="row g-5">
            <!-- Galerie média -->
            <div class="col-lg-5">
                <div class="media-gallery">
                    <!-- Carousel principal -->
                    <div id="mainCarousel" class="carousel slide shadow-lg" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-3">
                           
                            <div class="carousel-item  active ">
                                <img src="{{ Storage::url($news->image) }}" class="d-block w-100" alt="{{ $image->alt ?? $news->titre }}">
                             
                            </div>
                          
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
    
                    <!-- Vignettes -->
                    <div class="thumbnails mt-3">
                        <div class="row g-2">
                           
                            <div class="col-3" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="thumbnail-item">
                                <img src="{{ Storage::url($news->image) }}" class="img-fluid rounded cursor-pointer  active " alt="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Corps de l'article -->
            <div class="col-lg-7">
                <article class="article-content">
                    <div class=" text-primary lead mb-4">
                        {{ $news->excerpt ?? strip_tags($news->subtitre) }}
                    </div>
    
                    <!-- Points clés -->
                    @if($news->keyPoints && count($news->keyPoints) > 0)
                    <div class="key-points bg-primary text-white p-4 rounded-3 mb-4">
                      
                      
                    </div>
                    @endif
    
                    <!-- Contenu détaillé -->
                    <div class="content-body">
                        {!! $news->contenu !!}
                    </div>
    
                    <!-- Partage social -->
                    <div class="social-sharing mt-5 pt-4 border-top">
                        <h4 class="h6 text-muted mb-3">Partager cet article :</h4>
                        <div class="d-flex gap-3 flex-wrap">
                            <!-- Facebook -->
                            <a href="#" 
                               class="btn btn-facebook btn-sm social-share-btn"
                               onclick="window.open(this.href, 'partager', 'width=600,height=400'); return false;"
                               data-url="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}">
                                <i class="fab fa-facebook-f me-2"></i>Facebook
                            </a>
                    
                            <!-- Twitter -->
                            <a href="#" 
                               class="btn btn-twitter btn-sm social-share-btn"
                               onclick="window.open(this.href, 'partager', 'width=600,height=400'); return false;"
                               data-url="https://x.com/intent/tweet?text={{ urlencode($news->titre) }}&url={{ urlencode(Request::url()) }}">
                                <i class="fab fa-twitter me-2"></i>Twitter
                            </a>
                    
                            <!-- WhatsApp -->
                            <a href="#" 
                               class="btn btn-whatsapp btn-sm social-share-btn"
                               onclick="window.open(this.href, 'partager', 'width=600,height=400'); return false;"
                               data-url="https://api.whatsapp.com/send?text={{ urlencode($news->titre . ' ' . Request::url()) }}">
                                <i class="fab fa-whatsapp me-2"></i>WhatsApp
                            </a>
                    
                            <!-- Copier le lien -->
                            <button class="btn btn-secondary btn-sm btn-copy-link" 
                                    data-bs-toggle="tooltip" 
                                    title="Copier le lien">
                                <i class="fas fa-link me-2"></i>Copier
                            </button>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    
        <!-- Articles connexes -->
        @if($relatedNews->count() > 0)
        <section class="related-articles mt-5 pt-5">
            <h2 class="h4 mb-4">D'autres actualités qui pourraient vous intéresser</h2>
            <div class="row g-4">
                @foreach($relatedNews as $related)
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="{{ Storage::url($related->image) }}" class="card-img-top" alt="{{ $related->titre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $related->titre }}</h5>
                            <p class="card-text">{{ Str::limit($related->excerpt ?? strip_tags($related->contenu), 100) }}</p>
                            <a href="{{ route('actualites.show', $related->id) }}" class="btn btn-link">Lire →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        @endif
    </div>
</section>
@endsection

@section('extra-script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Génération des URLs de partage
        const currentUrl = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);
    
        document.querySelectorAll('.social-share-btn').forEach(btn => {
            const baseUrl = btn.dataset.url;
            btn.href = baseUrl.replace('{{ urlencode(Request::url()) }}', currentUrl)
                              .replace('{{ urlencode($news->titre) }}', title);
        });
    
        // Copie du lien
        const copyBtn = document.querySelector('.btn-copy-link');
        copyBtn.addEventListener('click', function() {
            navigator.clipboard.writeText(window.location.href)
                .then(() => {
                    const tooltip = new bootstrap.Tooltip(copyBtn, {
                        title: 'Lien copié !',
                        trigger: 'manual'
                    });
                    tooltip.show();
                    setTimeout(() => tooltip.hide(), 2000);
                })
                .catch(err => {
                    console.error('Échec de la copie : ', err);
                });
        });
    });
    </script>
@endsection
