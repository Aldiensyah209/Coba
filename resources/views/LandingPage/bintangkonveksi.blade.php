@extends('LandingPage.index')
@section('kontent')
    <div class="container">
        <h2>Produk Terbaru</h2>
        <div class="row">
            @foreach ($produkBk as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                    <div class="card h-80">
                        <img src="{{ asset('images/post/product/' . $item->gambar_bk) }}" class="card-img-top img-fluid"
                            alt="{{ $item->nama_bk }}" style="object-fit: cover; object-position: center; height: 250px;">
                        <div class="card-body">
                            <h5 class="card-title text-center" style="font-size: 16px;">{{ $item->nama_bk }}</h5>
                            <a href="#" class="btn btn-primary align-content-center btn-sm"
                                style="font-size: 12px;">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
