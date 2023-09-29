@extends('index')

@section('kontent')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/post/product/xuzu/' . $produkDetail->gambar) }}" alt="{{ $produkDetail->nama }}"
                    class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2>{{ $produkDetail->nama }}</h2>

                <div class="card-footer px-3 pb-3 pt-0 d-flex">

                    <a href="#" class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
                        <i class="ti ti-brand-whatsapp fs-6 me-1"></i>
                        <span>Pesan</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <p class="text-muted">{{ $produkDetail->deskripsi }}</p>
            </div>
        </div>
    </div>
@endsection
