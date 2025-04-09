<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Admin FNEB</title>

    <!-- Google Font: Source Sans Pro -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- AdminLTE + Plugins -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/css/OverlayScrollbars.min.css">
    
    <!-- Personnalisation FNEB -->
    <style>
        :root {
            --fneb-primary: #2563eb;
            --fneb-secondary: #1e40af;
            --fneb-accent: #93c5fd;
        }

        .main-header {
            background: var(--fneb-primary) !important;
            border-bottom: 2px solid var(--fneb-secondary);
        }

        .nav-sidebar > .nav-item > .nav-link.active {
            background: linear-gradient(90deg, var(--fneb-primary) 0%, var(--fneb-secondary) 100%);
            border-left: 4px solid var(--fneb-accent);
        }

        .card-fneb {
            border: none;
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 4px 20px rgba(37, 99, 235, 0.1);
            transition: transform 0.3s ease;
        }

        .card-fneb:hover {
            transform: translateY(-5px);
        }

        .btn-fneb {
            background: var(--fneb-primary);
            color: white;
            border-radius: 8px;
            padding: 8px 20px;
            transition: all 0.3s ease;
        }

        .btn-fneb:hover {
            background: var(--fneb-secondary);
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .brand-link {
                justify-content: center !important;
            }
            
            .main-sidebar {
                margin-left: -250px;
            }
            
            .sidebar-open .main-sidebar {
                margin-left: 0;
            }
        }
    </style>
    @yield('extra-style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars" style="color: var(--fneb-secondary);"></i>
                </a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell text-fneb-primary"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">3 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 5 nouveaux membres
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/admin" class="brand-link bg-white">
            <img src="{{ asset('img/fneb-logo.png') }}" alt="FNEB Logo" class="brand-image img-circle elevation-3">
            <span class="brand-text font-weight-bold text-dark">FNEB Admin</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Navigation -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="/admin" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Tableau de bord</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.actualites.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>Actualités</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="{{route('admin.evenements.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-calendar-alt"></i>
                            <p>Événements</p>
                        </a>
                    </li>
                    
                  
                    
                    <li class="nav-item">
                        <a href="{{route('admin.polls.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-poll"></i>
                            <p>Sondages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.posts.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-pen-nib"></i>
                            <p>Blog</p>
                        </a>
                    </li>
               
                    
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.13.1/js/jquery.overlayScrollbars.min.js"></script>

<script>
    // Activation du menu mobile
    $('[data-widget="pushmenu"]').click(function() {
        $('body').toggleClass('sidebar-open');
    });
</script>

@yield('extra-script')
</body>
</html>