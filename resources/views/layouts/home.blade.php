@extends('index')
@section('kontent')

<!-- Jumbotron -->
<div id="hero" class="mb-5 d-flex align-items-center">
    <div class="background-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 align-self-center mb-sm center-sm">
                @if (isset($home))
                <h1 class="title mb-0 text-secondary-emphasis"><strong>{{ $home->judul }}</strong></h1>
                <h2 class="mt-2 mb-4">{!! $home->deskripsi !!}</h2>
                <a href="#product" class="btn btn-primary btn-primary__landing-page py-2 px-4 me-auto" type="submit">Belanja Sekarang</a>
                @endif
            </div>
            <div class="col-md-8 ">
                <!-- Swiper -->
                <div class="swiper mySwiper shadow rounded overflow-hidden me-0">
                    <div class="swiper-wrapper">
                        @foreach ($videoID as $item)
                        <div class="swiper-slide" data-slide-type="vdo">
                            <div class="yt-player" data-id="{{ $item }}"></div>
                        </div>
                        @endforeach
                        @foreach ($homeImage as $item)
                        <div class="swiper-slide" data-slide-type="img">
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
                        <img src="{{ asset('images/logos/pendiri.png') }}" alt="Icon Pendiri" class="mb-4">
                        @break

                        @case(1)
                        <img src="{{ asset('images/logos/tujuan.png') }}" alt="Icon Tujuan" class="mb-4">
                        @break

                        @case(2)
                        <img src="{{ asset('images/logos/manfaat.png') }}" alt="Icon Manfaat" class="mb-4">
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
<div id="testimoni" class="py-5">
    <div class="container">
        <h5 class="text-center text-headline">TESTIMONI</h5>
        <h2 class="text-center text-headline-desc mb-5">What Our Customer's Say</h2>
        <div class="row mb-4 gy-4">
            @foreach ($testimoni as $item)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 shadow-none">
                    <div class="thumbnail">
                        <img src="{{ asset('images/post/testimoni/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->gambar }}">
                    </div>
                    <div class="card-body px-3 py-0 d-flex align-items-center justify-content-center">
                        <p class="card-text text-center text-break">"{{ $item->keterangan }}"</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Testimoni -->
<!-- Berita -->
<div id="news" class="py-5 mb-5">
    <div class="container">
        <h5 class="text-center text-headline">NEWS</h5>
        <h2 class="text-center text-headline-desc mb-5">Article About Us</h2>
        @if (isset($berita))
        <div class="row gy-4">
            @foreach($berita as $item)
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="thumbnail">
                        <img src="{{ asset('images/post/berita/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->gambar }}">
                    </div>
                    <div class="card-body p-3">
                        <h5 class="card-title text-break">{{ $item->judul }}</h5>
                    </div>
                    <div class="card-footer px-3 pb-3 pt-0 d-flex">
                        <a href="{{ $item->tautan }}" class="btn btn-primary btn-primary__landing-page align-self-center me-2" target="_blank" rel="noopener">Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>
<!-- End Berita -->
<!-- Produk -->
<div id="product" class="mb-5">
    <div class="container">
        <h5 class="text-center text-headline">PRODUCT</h5>
        <h2 class="text-center text-headline-desc mb-5">Featured Product</h2>
        @if (isset($xuzu) or isset($bintangKonveksi) or isset($anekaSlempang))
        <div class="row gy-4">
            <div class="col-md-4">
                <div class="card h-100">
                    <span class="position-absolute right-0 top-0 badge bg-badge">
                        New Produk
                    </span>
                    <div class="thumbnail">
                        <img src="{{ asset('images/post/product/xuzu/' . $xuzu->gambar) }}" class="card-img-top" alt="{{ $xuzu->gambar }}">
                    </div>
                    <div class="card-body p-3">
                        <h5 class="card-title">{{ $xuzu->nama }}</h5>
                        <p class="card-text">{{ Str::limit($xuzu->deskripsi, 45) }}</p>
                    </div>
                    <div class="card-footer px-3 pb-3 pt-0 d-flex">
                        <a href="{{ route('product_detail', ['product' => 'xuzu', 'id' => $xuzu->id]) }}" class="btn btn-primary btn-primary__landing-page align-self-center me-2">Detail</a>
                        <a href="{{ 'https://wa.me/' . $whatsappPriority->whatsapp }}" class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
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
                        <img src="{{ asset('images/post/product/bintang_konveksi/' . $bintangKonveksi->gambar_bk) }}" class="card-img-top" alt="{{ $bintangKonveksi->gambar_bk }}">
                    </div>
                    <div class="card-body p-3">
                        <h5 class="card-title">{{ $bintangKonveksi->nama_bk }}</h5>
                        <p class="card-text">{{ Str::limit($bintangKonveksi->deskripsi_bk, 45) }}</p>
                    </div>
                    <div class="card-footer px-3 pb-3 pt-0 d-flex">
                        <a href="{{ route('product_detail', ['product' => 'bintang-konveksi', 'id' => $bintangKonveksi->id]) }}" class="btn btn-primary btn-primary__landing-page me-2">Detail</a>
                        <a href="{{ 'https://wa.me/' . $whatsappPriority->whatsapp }}" class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
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
                        <img src="{{ asset('images/post/product/aneka_slempang/' . $anekaSlempang->gambar_as) }}" class="card-img-top" alt="{{ $anekaSlempang->gambar_as }}">
                    </div>
                    <div class="card-body p-3">
                        <h5 class="card-title">{{ $anekaSlempang->nama_as }}</h5>
                        <p class="card-text">{{ Str::limit($anekaSlempang->deskripsi_as, 45) }}</p>
                    </div>
                    <div class="card-footer px-3 pb-3 pt-0 d-flex">
                        <a href="{{ route('product_detail', ['product' => 'aneka-slempang', 'id' => $anekaSlempang->id]) }}" class="btn btn-primary btn-primary__landing-page me-2">Detail</a>
                        <a href="{{ 'https://wa.me/' . $whatsappPriority->whatsapp }}" class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
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
            <div class="col-md-6 align-self-center pe-md-3">
                <h2 class="text-headline">Partner Ekspedisi XUZU</h2>
                <p class="mb-0 text-break fw-bold text-dark">Bekerja sama dengan seluruh ekspedisi di Indonesia.
                    Pengiriman paket melalui mitra ekspedisi terpercaya. Pastikan paketnya sampai dengan aman dan selamat
                    sampai tujuan.</p>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap">
                    <a href="https://jne.co.id/shipping-fee" class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-5 mt-md-5 mt-lg-0 flex-fill" target="_blank" rel="noopener">
                        <img src="{{ asset('images/logos/JNE.svg') }}" alt="Logo JNE">
                    </a>
                    <a href="https://www.jet.co.id/rates" class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-3 mt-md-3 mt-lg-0 flex-fill" target="_blank" rel="noopener">
                        <img src="{{ asset('images/logos/j-t-express.svg') }}" alt="Logo J&T Express">
                    </a>
                    <a href="https://lionparcel.com/tarif" class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-3 flex-fill" target="_blank" rel="noopener">
                        <img class="rounded" src="{{ asset('images/logos/lion-parcel.png') }}" alt="Logo Lion Parcel">
                    </a>
                    <a href="https://indahonline.com/shipping/rates" class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-3 flex-fill" target="_blank" rel="noopener">
                        <img class="rounded" src="{{ asset('images/logos/indah-logistik-cargo.svg') }}" alt="Logo Indah Logistik">
                    </a>
                    <a href="https://www.jtcargo.id/networkQuery?type=2&senderAddressVal=&receiveAddressVal=&sender=%7B%22areaId%22%3A%22%22,%22cityId%22%3A%22%22,%22provinceId%22%3A%22%22%7D&receive=%7B%22areaId%22%3A%22%22,%22cityId%22%3A%22%22,%22provinceId%22%3A%22%22%7D&weight" class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-3 flex-fill" target="_blank" rel="noopener">
                        <img class="rounded" src="{{ asset('images/logos/jt-cargo.svg') }}" alt="Logo J&T Cargo">
                    </a>
                    <a href="https://www.sicepat.com/deliveryFee" class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-3" target="_blank" rel="noopener">
                        <img src="{{ asset('images/logos/sicepat-ekspres.svg') }}" alt="Logo Si Cepat Express">
                    </a>
                    <a href="https://www.posindonesia.co.id/id/check-tarif" class="logo-container overflow-hidden rounded bg-light p-3 me-3 mt-3" target="_blank" rel="noopener">
                        <img src="{{ asset('images/logos/pos-indonesia.svg') }}" alt="Logo Pos Indonesia">
                    </a>
                    <a href="https://www.ninjaxpress.co/id-id#price-estimate" class="logo-container d-block overflow-hidden rounded bg-light p-3 me-3 mt-3" target="_blank" rel="noopener">
                        <img src="{{ asset('images/logos/ninja-ekspres.png') }}" alt="Logo Ninja Express">
                    </a>
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
        <h5 class="text-center mb-5">Konsultasikan Kebutuhan Anda Hanya Dengan Admin Official WhatsApp Kami</h5>
        <a class="text-center d-flex justify-content-center" href="{{ 'https://wa.me/' . $whatsappPriority->whatsapp }}">
            <button type="button" class="shadow btn btn-secondary btn-succes__landing-page d-flex align-items-center btn-lg">
                <i class="ti ti-brand-whatsapp fs-6 me-2"></i>
                <span>Konsultasi Sekarang</span>
            </button>
        </a>
    </div>
</div>
<!-- End Our Message -->
@endsection