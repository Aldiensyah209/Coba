<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon32.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom-styles.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="{{ route('home') }}" class="text-nowrap logo-img" target="_blank" rel="noopener">
                        <img src="{{ asset('images/logos/xuzu.svg') }}" width="140" alt="Logo Xuzu" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <!-- HOME -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <!-- PRODUCT -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">PRODUCT</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/xuzu*') ? 'active' : '' }}" href="{{ route('xuzu.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-shirt"></i>
                                </span>
                                <span class="hide-menu">Xuzu</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/bintang-konveksi*') ? 'active' : '' }}" href="{{ route('bk.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-sock"></i>
                                </span>
                                <span class="hide-menu">Bintang Konveksi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/aneka-slempang*') ? 'active' : '' }}" href="{{ route('as.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-tie"></i>
                                </span>
                                <span class="hide-menu">Aneka Slempang</span>
                            </a>
                        </li>
                        <!-- LANDING PAGE -->
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">LANDING PAGE</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/home*') ? 'active' : '' }}" href="{{ route('homeAdmin.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/about*') ? 'active' : '' }}" href="{{ route('aboutAdmin.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-info-circle"></i>
                                </span>
                                <span class="hide-menu">About</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/smartbuy*') ? 'active' : '' }}" href="{{ route('smartbuyAdmin.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-building-store"></i>
                                </span>
                                <span class="hide-menu">Smart Buy</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/testimoni*') ? 'active' : '' }}" href="{{ route('testimoniAdmin.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-friends"></i>
                                </span>
                                <span class="hide-menu">Testimoni</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/galeri*') ? 'active' : '' }}" href="{{ route('galeri.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-photo"></i>
                                </span>
                                <span class="hide-menu">Galeri</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/social-media*') ? 'active' : '' }}" href="{{ route('sosmed.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-device-mobile-message"></i>
                                </span>
                                <span class="hide-menu">Social Media</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('*admin/berita*') ? 'active' : '' }}" href="{{ route('berita.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-news"></i>
                                </span>
                                <span class="hide-menu">Berita</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="{{ route('profile') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">Profile</p>
                                        </a>
                                        <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <!--  Main Content -->
            <div class="container-fluid">
                @yield('kontent')
            </div>
            <!--  Main Content End -->
        </div>
        <!-- Main Wrapper End -->
    </div>
    <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/app.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('js/modal-handler.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#formProfile').on('input change', function(e) {
                e.preventDefault();
                $('#save').attr('disabled', false);
            });
        });
    </script>
</body>

</html>