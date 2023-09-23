@extends('LandingPage.index')
@section('kontent')
    <!-- Jumbotron -->
    <div class="hero mb-4">
        <img class="hero-image" src="{{ asset('images/backgrounds/bg-hero.svg') }}" />
        <div class="container hero-inner">
            <div class="row">
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center headline">
                    <h1>{{ $home->first()->judul }}</h1>
                    <h3>{{ $home->first()->deskripsi }}</h3>
                </div>
                <div class="col-12 col-md-6">
                    <div id="carouselExampleAutoplaying" class="carousel  rounded slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($homeImage as $index => $item)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $index }}" class=" {{ $index == 0 ? 'active' : '' }}"
                                    aria-current="true" aria-label="{{ $item->gambar }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner rounded shadow">
                            @foreach ($homeImage as $index => $item)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('images/post/landingPage/' . $item->gambar) }}" alt="Gambar">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jumbotron -->
    <!-- About -->
    <div class="bg-about">
        <div class="container">
            <h2 class="text-center">About</h2>
            <div class="row">
                <div class="col-12 col-md-4 mb-3">
                    <div class="card" style="height: 13rem;">
                        <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/Icon Admin/pendiri.png') }}" alt="Icon" class="mb-2">
                            <h5 class="card-title"> PENDIRIAN</h5>
                            <p class="card-text">XUZU adalah brand resmi yang dicetuskan oleh Bintang Konveksi yang
                                dilounching awal tahun 2023</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card" style="height: 13rem;">
                        <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/Icon Admin/tujuan.png') }}" alt="Icon" class="mb-2">
                            <h5 class="card-title">TUJUAN</h5>
                            <p class="card-text">Menyajikan produk berkualitas premium dan berdaya saing</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <div class="card" style="height: 13rem;">
                        <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('images/Icon Admin/manfaat.png') }}" alt="Icon" class="mb-2">
                            <h5 class="card-title">MANFAAT</h5>
                            <p class="card-text">Xuzu adalah menjadi identitas pengenal bagi costumer Bintang Konveksi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
