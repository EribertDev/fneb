<!DOCTYPE html>
<html>
<head>
    <title>FNEB-@yield('title', 'Titre par défaut')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="@yield('tags')" name="keywords">
    <meta name="description" content="@yield('description', 'FNEB')">
    <meta property="og:title" content="@yield('title-article', 'FNEB')">
    <meta property="og:description" content="@yield('description-article', 'actualité')">
    <meta property="og:image" content="@yield('image-article', asset('img/fneb-logo.png'))">
    <meta property="og:url" content=@yield('url-article', 'www.fneb.com')>
    <!-- Balises Meta AI pour WhatsApp -->
    <meta property="wabot" content="enable">

    <!-- Balises Meta pour formater les messages sur WhatsApp -->
    <meta property="wa:fontStyle" content="italic">
    <meta property="wa:bold" content="true">
     <!-- Favicon -->
     <link href="{{asset('img/fneb-logo.png')}}" rel="icon">
     <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">  <!-- Pour afficher l'alerte avant suppression d'un sondage-->


     <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
 
     <!-- Icon Font Stylesheet -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">

 
     <!-- Libraries Stylesheet -->
     <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
     <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
 
     <!-- Customized Bootstrap Stylesheet -->
     <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
 
     <!-- Template Stylesheet -->
     <link href="{{asset('css/style.css')}}" rel="stylesheet">
     <link href="{{asset('css/moncss.css')}}" rel="stylesheet">

     @yield('extra-style')

</head>
<body>
     <!-- Spinner Start -->
     <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js" defer></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
    @yield('extra-script')
</body>
</html>