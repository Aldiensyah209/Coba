@extends('LandingPage.index')
@section('kontent')
    <div class="row">
        <div class="col d-flex flex-column justify-content-center">
            <h1>{{ $home->first()->judul }}</h1>
            <h3>{{ $home->first()->deskripsi }}</h3>
        </div>
        <div class="col">
            <div id="carouselExampleAutoplaying" class="carousel  rounded slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($homeImage as $index => $item)
                        <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{ $index }}" class=" {{ $index == 0 ? 'active' : '' }}"
                            aria-current="true" aria-label="{{ $item->gambar }}"></button>
                    @endforeach
                </div>
                <div class="carousel-inner rounded">
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
@endsection
