<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XUZU</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom-styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
</head>

<body>
    <!-- Navbar -->
    <header id="landingPage" class="py-2">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/xuzu.svg') }}" alt="" width="110">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Collection
                            </a>
                            <ul class="dropdown-menu dropdown-colection p-0">
                                <li><a class="dropdown-item" href="{{ route('landingPage.xuzu') }}">Xuzu Store</a></li>
                                <li><a class="dropdown-item" href="{{ route('landingPage.bintangKonveksi') }}">Bintang Konveksi</a></li>
                                <li><a class="dropdown-item" href="{{ route('landingPage.anekaSlempang') }}">Aneka Slempang</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('smartBuy') }}">Smart Buy</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <!-- End Navbar -->
    <!--  Main Content -->
    <main>
        @yield('kontent')
    </main>
    <!--  End Main Content -->
    <!-- Footer -->
    <footer>
        <div id="footer">
            <div class="container py-5">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <img class="mb-2" src="{{ asset('images/logos/xuzu.svg') }}" alt="" width="120">
                        <p class="text-break fw-bold text-dark">Brand fashion berkualitas premium indonesia.</p>
                    </div>
                    <div class="col-2">
                        <h4>Product</h4>
                        <ul>
                            <li>Xuzu Store</li>
                            <li>Bintang Konveksi</li>
                            <li>Aneka Slempang</li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <h4>Contact Us</h4>
                        <ul>
                            <li>081335314109</li>
                            <li>082145578840</li>
                            <li>xuzu@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-2">
                        <h4>Social Media</h4>
                    </div>
                </div>
                <p class="text-center mb-0">Copyright © 2023 PT. Bintang Konveksi Indonesia, All rights reserved</p>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/navbar-helper.js') }}"></script>
    <script src="{{ asset('js/swiper-handler.js') }}"></script>
</body>

</html>