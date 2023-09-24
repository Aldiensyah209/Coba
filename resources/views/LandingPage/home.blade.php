@extends('LandingPage.index')
@section('kontent')

<!-- Jumbotron -->
<div class="hero py-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h1><strong>{{ $home->first()->judul }}</strong></h1>
                <h3 class="mb-4">{{ $home->first()->deskripsi }}</h3>
                <button class="btn btn-primary py-2 px-4 me-auto" type="submit">Belanja Sekarang</button>
            </div>
            <div class="col-md-6">
                <div id="carouselExampleAutoplaying" class="carousel  rounded slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($homeImage as $index => $item)
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}" class=" {{ $index == 0 ? 'active' : '' }}" aria-current="true" aria-label="{{ $item->gambar }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner rounded shadow">
                        @foreach ($homeImage as $index => $item)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ asset('images/post/landingPage/' . $item->gambar) }}" alt="Gambar">
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
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
<div class="container mb-5">
    <h5 class="text-center text-headline">ABOUT</h5>
    <h2 class="text-center text-headline-desc mb-5">What's is Xuzu ?</h2>
    <div class="row">
        @foreach ($about as $index => $item)
        <div class="col-12 col-md-4 mb-3">
            <div class="card">
                <div class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                    @switch($index)
                    @case(0)
                    <img src="{{ asset('images/logos/pendiri.png') }}" alt="Icon" class="mb-4">
                    @break
                    @case(1)
                    <img src="{{ asset('images/logos/tujuan.png') }}" alt="Icon" class="mb-4">
                    @break
                    @case(2)
                    <img src="{{ asset('images/logos/manfaat.png') }}" alt="Icon" class="mb-4">
                    @break
                    @endswitch
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text">{{ $item->deskripsi }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- End About -->
<!-- Smart Buy -->
@foreach($smartBuy as $index => $item)
@if($index % 2 == 0)
<div class="smart-buy bg-smart-buy py-5">
    <div class="container">
        <div class="card mb-3">
            <div class="row">
                <div class="col-md-6 image-sb d-flex align-items-center">
                    <div class="img-container rounded">
                        <img src="{{ asset('images/post/landingPage/'. $item->gambar) }}" class="img-fluid rounded-start" alt="{{ $item->gambar }}">
                    </div>
                </div>
                <div class="col-md-6 ps-5 d-flex flex-column justify-content-center">
                    <h2>{{ $item->judul }}</h2>
                    <p class="card-text text-break">{!! $item->deskripsi !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="smart-buy bg-smart-buy-1 py-5">
    <div class="container">
        <div class="card mb-3">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h2>{{ $item->judul }}</h2>
                    <p class="card-text text-break text-black fw-medium">{{ $item->deskripsi }}</p>
                </div>
                <div class="col-md-6 image-sb d-flex align-items-center">
                    <div class="img-container rounded">
                        <img src="{{ asset('images/post/landingPage/'. $item->gambar) }}" class="img-fluid rounded-start" alt="{{ $item->gambar }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach
<!-- End Smart Buy -->
<!-- Produk -->
<div class="container my-5">
    <h5 class="text-center text-headline">PRODUCT</h5>
    <h2 class="text-center text-headline-desc mb-5">Featured Product</h2>
    @if(count($xuzu) OR count($bintangKonveksi))
    <div class="row">
        @foreach($xuzu as $item)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <span class="position-absolute right-0 top-0 badge bg-danger">
                    New Produk
                </span>
                <img src="{{ asset('images/post/product/'. $item->gambar) }}" class="card-img-top" alt="{{ $item->gambar }}" height="240">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama }}</h5>
                    <p class="card-text">{{ Str::limit($item->deskripsi, 25) }}</p>
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
        @foreach($bintangKonveksi as $item)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <span class="position-absolute right-0 top-0 badge bg-danger">
                    New Produk
                </span>
                <img src="{{ asset('images/post/product/'. $item->gambar_bk) }}" class="card-img-top" alt="{{ $item->gambar_bk }}" height="240">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->nama_bk }}</h5>
                    <p class="card-text">{{ Str::limit($item->deskripsi_bk, 25) }}</p>
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection