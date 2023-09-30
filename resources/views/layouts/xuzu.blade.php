@extends('index')
@section('kontent')
    <!-- Product List -->
    <div id="product-list">
        <div class="container">
            <h5 class="text-center text-headline mt-4">XUZU STORE</h5>
            <h2 class="text-center text-headline-desc mb-5">Our Products</h2>
            <div class="row mb-5 g-4">
                @foreach ($produk as $item)
                    <div class="col-md-4 col-lg-3">
                        <div class="card h-100">
                            <div class="thumbnail">
                                <img src="{{ asset('images/post/product/xuzu/' . $item->gambar) }}" class="card-img-top"
                                    alt="{{ $item->gambar }}">
                            </div>
                            <div class="card-body p-3">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">{{ Str::limit($item->deskripsi, 45) }}</p>
                            </div>
                            <div class="card-footer px-3 pb-3 pt-0 d-flex">
                                <a href="{{ route('product_detail', ['product' => 'xuzu', 'id' => $item->id]) }}"
                                    class="btn btn-primary btn-primary__landing-page me-2">Detail</a>
                                <a href="#"
                                    class="btn btn-primary btn-succes__landing-page d-flex align-items-center">
                                    <i class="ti ti-brand-whatsapp fs-6 me-1"></i>
                                    <span>Pesan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center mb-5">
                {!! $produk->links() !!}
            </div>
        </div>
    </div>
    <!-- End Product List -->
@endsection
