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
    <div class="container mb-4">
        <h1 class="text-center mb-4">About</h1>
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
     <!-- End About -->
     <!-- Smart Buy -->
     <div class="container">
        <h1 class="text-center mb-4">Smart Buy</h1>
        @foreach($smartBuy as $index => $item)
        <div class="row align-items-center justify-content-between mb-4">
            @if($index % 2 == 0)
            <div class="col col-md-5">
                <h2>{{ $item->judul }}</h2>
                <p class="text-break">{{ $item->deskripsi }}</p>
            </div>
            <div class="col col-md-5 bg-primary rounded d-flex align-items-center justify-content-center" style="height: 350px;">
                <img class="image-smartbuy" src="{{ asset('images/post/landingPage/' . $item->gambar) }}" alt="{{ $item->gambar }}" />
            </div>
            @else
            <div class="col col-md-5 bg-primary rounded d-flex align-items-center justify-content-center" style="height: 350px;">
                <img class="image-smartbuy" src="{{ asset('images/post/landingPage/' . $item->gambar) }}" alt="{{ $item->gambar }}" />
            </div>
            <div class="col col-md-5">
                <h2>{{ $item->judul }}</h2>
                <p class="text-break">{{ $item->deskripsi }}</p>
            </div>
            @endif
        </div> 
        @endforeach
     </div>
@endsection
