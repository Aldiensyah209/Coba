@extends('LandingPage.index')
@section('kontent')

<div class="row">
    <div class="col">
        <h1>{{ $home->first()->judul }}</h1>
        <h3>{{ $home->first()->deskripsi }}</h3>
    </div>
    <div class="col">
       
    </div>
</div>

@endsection