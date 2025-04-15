<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{route('home')}}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><img src="{{asset('img/fneb-logo.png')}}" alt="FNEB" height="70"></h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            @if(Route::has('home'))  <a href="{{route('home')}}" class="{{ Request::is('/') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Accueil</a>@endif
            @if(Route::has('about')) <a href="{{route('about')}}"  class="{{ Request::is('/about') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">A propos</a>@endif
            @if(Route::has('actualites')) <a href="{{route('actualites')}}" class="{{ Request::is('/actualites') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Actualités</a>@endif
            @if(Route::has('evenements')) <a href="{{route('evenements')}}" class="{{ Request::is('/evenements') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Événements</a>@endif
            @if(Route::has('sondages')) <a href="{{route('sondages')}}" class="{{ Request::is('/sondage/fneb') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Sondages</a>@endif
            @if(Route::has('blog')) <a href="{{route('blog')}}" class="{{ Request::is('/blog') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Blog</a>@endif

            <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
        </div>
        
        @auth
        <!-- Menu Profil -->
        <div class="dropdown me-5" style="border-radius: 10px;">
            <button class="btn  dropdown-toggle d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                @if(auth()->user()->profile_picture)
                    <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" class="rounded-circle me-2" width="32" height="32" alt="Photo profil" style="object-fit: cover;">
                @else
                    <span class="rounded-circle bg-light text-primary d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                @endif
                <span class="d-none d-lg-inline">{{ auth()->user()->name }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                <li>
                    <button style="width: 90%; margin: auto; border-radius: 10px; transition: ease-in-out 0.2s;" class="dropdown-item" onmouseover="this.style.backgroundColor='var(--primary)';" onmouseout="this.style.backgroundColor='transparent';" >
                        <a href="{{route('profile')}}"><i class="fas fa-user-circle me-1"></i> Mon profil</a>
                    </button>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" style="width: 90%; margin: auto; border-radius: 10px; transition: ease-in-out 0.2s;" class="dropdown-item" onmouseover="this.style.backgroundColor='var(--primary)';" onmouseout="this.style.backgroundColor='transparent';">
                            <i class="fas fa-sign-out-alt me-1"></i> Déconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Se connecter<i class="fas fa-sign-in-alt ms-3"></i></a>
        @endauth
    </div>
</nav>

<!-- Modal Profil -->
@auth
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="profileModalLabel">Mon Profil</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    @if(auth()->user()->profile_picture)
                        <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" 
                             class="rounded-circle img-thumbnail" width="120" height="120" alt="Photo profil">
                    @else
                        <div class="rounded-circle bg-light text-primary d-inline-flex align-items-center justify-content-center" 
                             style="width: 120px; height: 120px; font-size: 48px;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif
                    <h4 class="mt-3">{{ auth()->user()->name }}</h4>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Nom complet</label>
                    <input style="border-radius: 5px;" type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Email</label>
                    <input style="border-radius: 5px;" type="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                </div>
                
                <div class="mb-3">
                    <label class="form-label text-muted">Rôle</label>
                    <input style="border-radius: 5px;" type="text" class="form-control" value="{{ ucfirst(auth()->user()->role) }}" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="border-radius: 5px;" data-bs-dismiss="modal">Fermer</button>
                <a href="" class="btn btn-primary" style="border-radius: 5px;">
                    <i class="fas fa-edit me-2"></i>Modifier
                </a>
            </div>
        </div>
    </div>
</div>
@endauth