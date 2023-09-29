@extends('index')
@section('kontent')
    <!-- Jumbotron -->
    <div id="hero" class="mb-5 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center mb-sm center-sm">
                    <h1 class="bg-warning d-inline px-2"><strong>{{ $home->first()->judul }}</strong></h1>
                    <h3 class="mt-2 mb-4">{!! $home->first()->deskripsi !!}</h3>
                    <a href="#product" class="btn btn-primary btn-primary__landing-page py-2 px-4 me-auto"
                        type="submit">Belanja Sekarang</a>
                </div>
                <div class="col-md-6">
                    <!-- Swiper -->
                    <div class="swiper mySwiper shadow-lg rounded overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach ($homeImage as $item)
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/post/hero/' . $item->gambar) }}" alt="{{ $item->gambar }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jumbotron -->
    <!-- About -->
    <div id="about" class="mb-5">
        <div class="container">
            <h5 class="text-center text-headline">ABOUT</h5>
            <h2 class="text-center text-headline-desc mb-5">What's is Xuzu ?</h2>
            <div class="row">
                @foreach ($about as $index => $item)
                    <div class="col-12 col-md-4 mb-3">
                        <div class="card h-100" id="card-about">
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
    </div>
    <!-- End About -->
    <!-- Galeri -->
    <div id="galeri" class="py-5">
        <div class="container">
            <h5 class="text-center text-headline">GALLERY</h5>
            <h2 class="text-center text-headline-desc mb-5">Below Are Our Photos</h2>
            <!-- Swiper -->
            <div class="swiper mySwiper mb-3">
                <div class="swiper-wrapper">
                    @foreach ($galeri as $item)
                        <div class="swiper-slide rounded overflow-hidden">
                            <img src="{{ asset('images/post/galeri/' . $item->gambar) }}" alt="{{ $item->gambar }}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- End Galeri -->
    <!-- Testimoni -->
    <div id="testimoni" class="py-5 mb-5">
        <div class="container">
            <h5 class="text-center text-headline">TESTIMONI</h5>
            <h2 class="text-center text-headline-desc mb-5">What Our Customer's Say</h2>
            <div class="row mb-4 gy-4">
                @foreach ($testimoni as $item)
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100">
                            <div class="thumbnail">
                                <img src="{{ asset('images/post/testimoni/' . $item->gambar) }}" class="card-img-top"
                                    alt="{{ $item->gambar }}">
                            </div>
                            <div class="card-body p-3 d-flex align-items-center justify-content-center">
                                <p class="card-text text-center text-break">"{{ $item->keterangan }}"</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Testimoni -->
    <!-- Produk -->
    <div id="product" class="mb-5">
        <div class="container">
            <h5 class="text-center text-headline">PRODUCT</h5>
            <h2 class="text-center text-headline-desc mb-5">Featured Product</h2>
            @if (count($xuzu) or count($bintangKonveksi) or count($anekaSlempang))
                <div class="row gy-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <span class="position-absolute right-0 top-0 badge bg-badge">
                                New Produk
                            </span>
                            <div class="thumbnail">
                                <img src="{{ asset('images/post/product/xuzu/' . $xuzu[0]->gambar) }}" class="card-img-top"
                                    alt="{{ $xuzu[0]->gambar }}">
                            </div>
                            <div class="card-body p-3">
                                <h5 class="card-title">{{ $xuzu[0]->nama }}</h5>
                                <p class="card-text">{{ Str::limit($xuzu[0]->deskripsi, 45) }}</p>
                            </div>
                            <div class="card-footer px-3 pb-3 pt-0 d-flex">
                                <a href="{{ route('produkDetail.detail', $xuzu[0]->id) }}"
                                    class="btn btn-primary btn-primary__landing-page align-self-center me-2">Detail</a>
                                <a href="{{ 'https://wa.me/' . $sosmed[0]->whatsapp }}"
                                    class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
                                    <i class="ti ti-brand-whatsapp fs-6 me-1"></i>
                                    <span>Pesan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <span class="position-absolute right-0 top-0 badge bg-badge">
                                New Produk
                            </span>
                            <div class="thumbnail">
                                <img src="{{ asset('images/post/product/bintang_konveksi/' . $bintangKonveksi[0]->gambar_bk) }}"
                                    class="card-img-top" alt="{{ $bintangKonveksi[0]->gambar_bk }}">
                            </div>
                            <div class="card-body p-3">
                                <h5 class="card-title">{{ $bintangKonveksi[0]->nama_bk }}</h5>
                                <p class="card-text">{{ Str::limit($bintangKonveksi[0]->deskripsi_bk, 45) }}</p>
                            </div>
                            <div class="card-footer px-3 pb-3 pt-0 d-flex">
                                <a href="{{ route('produkDetailBK.detail', $bintangKonveksi[0]->id) }}"
                                    class="btn btn-primary btn-primary__landing-page me-2">Detail</a>
                                <a href="{{ 'https://wa.me/' . $sosmed[0]->whatsapp }}"
                                    class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
                                    <i class="ti ti-brand-whatsapp fs-6 me-1"></i>
                                    <span>Pesan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <span class="position-absolute right-0 top-0 badge bg-badge">
                                New Produk
                            </span>
                            <div class="thumbnail">
                                <img src="{{ asset('images/post/product/aneka_slempang/' . $anekaSlempang[0]->gambar_as) }}"
                                    class="card-img-top" alt="{{ $anekaSlempang[0]->gambar_as }}">
                            </div>
                            <div class="card-body p-3">
                                <h5 class="card-title">{{ $anekaSlempang[0]->nama_as }}</h5>
                                <p class="card-text">{{ Str::limit($anekaSlempang[0]->deskripsi_as, 45) }}</p>
                            </div>
                            <div class="card-footer px-3 pb-3 pt-0 d-flex">
                                <a href="{{ route('produkDetail.detail', $anekaSlempang[0]->id) }}"
                                    class="btn btn-primary btn-primary__landing-page me-2">Detail</a>
                                <a href="{{ 'https://wa.me/' . $sosmed[0]->whatsapp }}"
                                    class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
                                    <i class="ti ti-brand-whatsapp fs-6 me-1"></i>
                                    <span>Pesan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- End Produk -->
    <!-- Partner -->
    <div id="partner" class="py-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-headline">Partner Ekspedisi XUZU</h2>
                    <p class="mb-0 text-break fw-bold text-dark">Bekerja sama dengan seluruh ekspedisi di indonesia.
                        Pengiriman paket melalui mitra ekspedisi terpecaya. Pastikan paketnya sampai dengan aman dan selamat
                        smapai tujuan.</p>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-wrap">
                        <div class="logo-container overflow-hidden rounded bg-light p-3 me-3">
                            <img src="{{ asset('images/logos/JNE.svg') }}" alt="">
                        </div>
                        <div class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-sm-3 mt-md-3 mt-lg-0">
                            <img src="{{ asset('images/logos/j-t-express.svg') }}" alt="">
                        </div>
                        <div class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-3">
                            <img class="rounded" src="{{ asset('images/logos/jt-cargo.svg') }}" alt="">
                        </div>
                        <div class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-3">
                            <img src="{{ asset('images/logos/sicepat-ekspres.svg') }}" alt="">
                        </div>
                        <div class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-3">
                            <img src="{{ asset('images/logos/pos-indonesia.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Partner -->
    <!-- Our Message -->
    <div id="message" class="py-5">
        <div class="container">
            <h2 class="d-flex align-items-center text-dark text-center fw-bold">Let's Message Us</h2>
            <h5 class="text-center mb-5">Konsultasikan Kebutuhan Anda Dengan Admin Official WhatsApp Kami</h5>
            <a class="text-center d-flex justify-content-center" href="{{ 'https://wa.me/' . $sosmed[0]->whatsapp }}">
                <button type="button"
                    class="shadow btn btn-secondary btn-succes__landing-page d-flex align-items-center btn-lg">
                    <i class="ti ti-brand-whatsapp fs-6 me-2"></i>
                    <span>Konsultasi Sekarang</span>
                </button>
            </a>
        </div>
    </div>
    <!-- End Our Message -->
@endsection
