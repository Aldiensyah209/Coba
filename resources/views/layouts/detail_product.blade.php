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

<!-- Product Detail -->
<div id="product-detail">
    <div class="container">
        <div class="row gx-5 my-5">
            <div class="col-md-6">
                <div class="img-container rounded overflow-hidden shadow">
                    <img src="{{ asset($image) }}" alt="{{ $image }}">
                </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
                <h3 >Deskripsi Produk</h3>
                <p class="text-muted text-break">{{ $description }}</p>
                <div class="d-flex justify-content-end fs-5 mt-5">
                    <a href="{{ 'https://wa.me/' . $whatsappPriority->whatsapp }}" class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
                        <i class="ti ti-brand-whatsapp fs-6 me-2"></i>
                        <span>Pesan</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Detail -->
@endsection