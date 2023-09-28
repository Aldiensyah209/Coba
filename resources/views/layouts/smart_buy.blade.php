@extends('index')
@section('kontent')
<!-- Smart Buy -->
<div id="smart-buy">
    @foreach ($smartBuy as $index => $item)
    @if ($index % 2 == 0)
    <div class="bg-smart-buy py-5">
        <div class="container">
            <div class="card mb-3">
                <div class="row">
                    <div class="col-md-6 align-self-center mb-sm">
                        <div class="img-container rounded">
                            <img src="{{ asset('images/post/smart_buy/' . $item->gambar) }}" class="img-fluid rounded-start" alt="{{ $item->gambar }}">
                        </div>
                    </div>
                    <div class="col-md-6 ps-5 align-self-center">
                        <h2>{{ $item->judul }}</h2>
                        <p class="card-text text-break text-black fw-medium">{!! $item->deskripsi !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="smart-buy bg-smart-buy-1 py-5">
        <div class="container">
            <div class="card mb-3">
                <div class="row">
                    <div class="col-md-6 align-self-center mb-sm">
                        <h2>{{ $item->judul }}</h2>
                        <p class="card-text text-break text-black fw-medium">{!! $item->deskripsi !!}</p>
                    </div>
                    <div class="col-md-6 image-sb align-self-center">
                        <div class="img-container rounded">
                            <img src="{{ asset('images/post/smart_buy/' . $item->gambar) }}" class="img-fluid rounded-start" alt="{{ $item->gambar }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
<!-- End Smart Buy -->
@endsection