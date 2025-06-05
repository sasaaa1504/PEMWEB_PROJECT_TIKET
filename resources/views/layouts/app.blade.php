<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'HitTix')</title>

    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #141414; /* Netflix dark background */
            color: #e5e5e5;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: #e5e5e5;
            transition: color 0.3s ease;
        }
        .navbar-dark .navbar-nav .nav-link:hover,
        .navbar-dark .navbar-nav .nav-link:focus {
            color: #e50914; /* Netflix red */
        }
        .text-netflix-red {
            color: #e50914 !important;
        }
        .btn-netflix-red {
            background-color: #e50914;
            border-color: #e50914;
            color: #fff;
        }
        .btn-netflix-red:hover,
        .btn-netflix-red:focus {
            background-color: #b00710;
            border-color: #b00710;
            color: #fff;
        }
        footer {
            background-color: #111;
            color: #e50914;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            box-shadow: 0 -4px 8px rgba(229, 9, 20, 0.3);
        }
        footer:hover {
            color: #ff1a1a;
        }
        main.container {
            min-height: 75vh;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-netflix-red" href="{{ url('/') }}">HitTix</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-3">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/jelajah') }}">Jelajah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/tentang-kami') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/hubungi-kami') }}">Hubungi Kami</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a href="{{ route('events.create') }}" class="btn btn-netflix-red px-4 py-2">Tambah Event</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fw-semibold" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi, {{ auth()->user()->name }}!
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="{{ route('dashboard.eo') }}">Dashboard</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('gabung-eo') }}" class="btn btn-outline-light btn-sm px-3 py-2">
                                Gabung Jadi EO
                            </a>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="container py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-netflix-red mt-5 shadow-lg">
        &copy; {{ date('Y') }} HitTix. All rights reserved.
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
        
    </script>
</body>
</html>
