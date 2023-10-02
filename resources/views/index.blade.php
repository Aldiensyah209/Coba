<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>XUZU</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom-styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
</head>

<body>
    <!-- Navbar -->
    <header id="landingPage" class="py-2">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/logos/xuzu.svg') }}" alt="Logo Xuzu" width="110">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Collection
                            </a>
                            <ul class="dropdown-menu dropdown-colection p-0">
                                <li><a class="dropdown-item" href="{{ route('landingPage.xuzu') }}">Xuzu Store</a></li>
                                <li><a class="dropdown-item" href="{{ route('landingPage.bintangKonveksi') }}">Bintang
                                        Konveksi</a></li>
                                <li><a class="dropdown-item" href="{{ route('landingPage.anekaSlempang') }}">Aneka
                                        Slempang</a></li>
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
            <div class="container pt-5 pb-4">
                <div class="row mb-5 gy-4">
                    <div class="col-md-6">
                        <img class="mb-3" src="{{ asset('images/logos/xuzu.svg') }}" alt="Logo Xuzu" width="120">
                        <p class="text-break fw-bold text-dark">Brand fashion berkualitas premium indonesia.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row gy-4">
                            <div class="col-md-6 col-lg-4">
                                <h4 class="mb-2 mb-md-3">Product</h4>
                                <ul class="fw-bold">
                                    <li><a href="{{ route('landingPage.xuzu') }}">Xuzu Store</a></li>
                                    <li><a href="{{ route('landingPage.bintangKonveksi') }}">Bintang Konveksi</a></li>
                                    <li><a href="{{ route('landingPage.anekaSlempang') }}">Aneka Slempang</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <h4 class="mb-2 mb-md-3">Contact Us</h4>
                                <ul class="fw-bold">
                                    <li>081335314109</li>
                                    <li>082145578840</li>
                                    <li>xuzu@gmail.com</li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <h4 class="mb-2 mb-md-3">Social Media</h4>
                                <div class="d-flex align-items-center">
                                    <div class="icon-sosmed me-2">
                                        <img src="{{ asset('images/logos/instagram.svg') }}" alt="Logo Instagram"
                                            width="40">
                                    </div>
                                    <div class="text-sosmed">
                                        @foreach ($instagram as $item)
                                            <a class="d-block fw-bold" href="#">{{ '@' . $item }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="icon-sosmed me-2">
                                        <img src="{{ asset('images/logos/facebook.svg') }}" alt="Logo Facebook"
                                            width="40">
                                    </div>
                                    <div class="text-sosmed">
                                        @foreach ($facebook as $item)
                                            <a class="d-block fw-bold" href="#">{{ '@' . $item }}</a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="icon-sosmed me-2">
                                        <img src="{{ asset('images/logos/tiktok.svg') }}" alt="Logo TikTok"
                                            width="40">
                                    </div>
                                    <div class="text-sosmed">
                                        @foreach ($tiktok as $item)
                                            <a class="d-block fw-bold" href="#">{{ '@' . $item }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <h4 class="mb-2 mb-md-3">Location</h4>
                                <a class="d-block container-lokasi rounded overflow-hidden"
                                    href="https://maps.app.goo.gl/QQNvmjtQiHF9bXrp8" target="_blank" rel="noopener">
                                    <img src="{{ asset('images/backgrounds/maps-lokasi.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center mb-0 fw-bold text-haki">Copyright © 2023 PT. Bintang Konveksi Indo, All rights
                    reserved</p>
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
    <script src="{{ asset('js/detail.js') }}"></script>
</body>

</html>
