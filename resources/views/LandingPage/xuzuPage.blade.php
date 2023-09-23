@extends('LandingPage.index')
@section('kontent')
    <div class="container">
        <h2>Produk Terbaru</h2>
        <div class="row">
            @foreach ($produk as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/post/product/' . $item->gambar) }}" class="card-img-top"
                            alt="{{ $item->nama }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p class="card-text">Harga: ${{ $item->harga }}</p>
                            <a href="#" class="btn btn-primary">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
