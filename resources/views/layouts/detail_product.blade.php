@extends('index')
@section('kontent')

<?php
switch($category) {
    case('xuzu'):
        $image = 'images/post/product/xuzu/' . $productDetail->gambar;
        $product_name = $productDetail->nama;
        $description = $productDetail->deskripsi;
        break;
    case('bintangKonveksi'):
        $image = 'images/post/product/bintang_konveksi/' . $productDetail->gambar_bk;
        $product_name = $productDetail->nama_bk;
        $description = $productDetail->deskripsi_bk;
        break;
    case('anekaSlempang'):
        $image = 'images/post/product/aneka_slempang/' . $productDetail->gambar_as;
        $product_name = $productDetail->nama_as;
        $description = $productDetail->deskripsi_as;
        break;
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset($image) }}" alt="{{ $image }}"
                class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>{{ $product_name }}</h2>

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
            <p class="text-muted">{{ $description }}</p>
        </div>
    </div>
</div>

@endsection
