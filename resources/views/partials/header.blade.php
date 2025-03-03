
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"> <img src="{{asset('img/fneb-logo.png')}}" alt="FNEB" height="70"> </i></h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                @if(Route::has('home'))  <a href="{{route('home')}}" class="{{ Request::is('/') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Acceuil</a>@endif
                @if(Route::has('about')) <a href="{{route('about')}}"  class="{{ Request::is('/about') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">A propos</a>@endif
                @if(Route::has('news')) <a href="{{route('news')}}" class="{{ Request::is('/news') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">Actualités</a>@endif
                <div class="nav-item dropdown">
                    <a href="{{route('events')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Evenements</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="{{route('events')}}" class="dropdown-item">Evenements</a>
                        <a href="{{route('blog')}}" class="dropdown-item">Blog </a>
                        <a href="{{route('autre')}}" class="dropdown-item">Autre </a>
                    </div>
                </div>
                <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->