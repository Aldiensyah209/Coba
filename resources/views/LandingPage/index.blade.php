<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bintang Konveksi</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>

<body>


    {{-- Awal Navcar --}}
    <nav class="navbar navbar-expand-lg bg-light shadow p-3 mb-5 bg-body rounded">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Colection
                        </a>
                        <ul class="dropdown-menu dropdown-colection ">
                            <li><a class="dropdown-item" href="#">Xuzu</a></li>
                            <li><a class="dropdown-item" href="#">Bintang Konveksi</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Smart Buy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Testimoni</a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
    {{-- Akhir Navbar --}}
    <!--  Main Content -->
    <div class="container-fluid">
        @yield('kontent')
    </div>


    <!--  Main Content End -->

    <!-- Main Wrapper End -->

    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>


</body>

</html>
