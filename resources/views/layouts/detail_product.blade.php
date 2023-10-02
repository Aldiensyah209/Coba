@extends('index')
@section('kontent')
    <?php
    switch ($category) {
        case 'xuzu':
            $image = 'images/post/product/xuzu/' . $productDetail->gambar;
            $product_name = $productDetail->nama;
            $description = $productDetail->deskripsi;
            break;
        case 'bintangKonveksi':
            $image = 'images/post/product/bintang_konveksi/' . $productDetail->gambar_bk;
            $product_name = $productDetail->nama_bk;
            $description = $productDetail->deskripsi_bk;
            break;
        case 'anekaSlempang':
            $image = 'images/post/product/aneka_slempang/' . $productDetail->gambar_as;
            $product_name = $productDetail->nama_as;
            $description = $productDetail->deskripsi_as;
            break;
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($image) }}" alt="{{ $image }}" class="img-fluid produk-img">
            </div>

            <div class="col-md-4 product-description product-full">
                <h3>Deskripsi Produk</h3>
                @if (strlen($description) > 400)
                    <p class="text-muted product-summary">{{ Str::limit($description, 400) }}</p>
                    <p class="text-muted product-full" style="display: none;">{{ $description }}</p>
                    <a href="#" class="btn btn-link show-more">Selengkapnya</a>
                @else
                    <p class="text-muted">{{ $description }}</p>
                @endif
            </div>

            <div class="col-md-9 product-button">
                <a href="#" class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
                    <i class="ti ti-brand-whatsapp fs-6 me-1"></i>
                    <span>Pesan</span>
                </a>
            </div>
        </div>
    </div>
@endsection
