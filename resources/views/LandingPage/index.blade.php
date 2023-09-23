<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XUZU</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom-styles.css') }}">
</head>

<body>
    {{-- NavBar --}}
    <header class="py-2 mb-4">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="#"><strong>XUZU</strong></a>
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
                            <ul class="dropdown-menu dropdown-colection p-0">
                                <li><a class="dropdown-item" href="{{ route('admin.landingpage.xuzu') }}">Xuzu</a></li>

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
            </nav>
        </div>
    </header>
    {{-- Akhir Navbar --}}
    <!--  Main Content -->
    @yield('kontent')
    <!--  Main Content End -->
    <!-- Footer -->
    <div class="card-footer text-body-secondary bg-dark-subtle py-1 mb-3">

        <p class="text-lowercasetext-lowercase text-center text-dark">CopyRIght By: Bintang Konveksi</p>

    </div>
    <!--Akhir Footer-->

    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('js/navbar-helper.js') }}"></script>
</body>

</html>
