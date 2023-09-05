@extends('admin.master')
@section('title', 'Dashboard')
@section('kontent')

<div class="row">
  <div class="col-md-3 col-sm-4">
    <div class="card bg-danger" style="--bs-bg-opacity: .1;">
      <div class="card-body">
        <div class="d-flex justify-content-center mb-9">
          <img src="images/logos/Baju.svg" alt="Icon 2" width="80" height="70">
        </div>
        <h4 class="mb-1 fw-semibold text-danger text-center">Baju</h4>
        <h2 class="mb-0 fw-semibold text-danger text-center">{{ count($baju) ? count($baju) : 0 }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-4">
    <div class="card bg-primary" style="--bs-bg-opacity: .1;">
      <div class="card-body">
        <div class="d-flex justify-content-center mb-9">
          <img src="images/logos/Celana.svg" alt="Icon 2" width="80" height="70">
        </div>
        <h4 class="mb-1 fw-semibold text-primary text-center">Celana</h4>
        <h2 class="mb-0 fw-semibold text-primary text-center">{{ count($baju) ? count($baju) : 0 }}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-4">
    <div class="card bg-warning" style="--bs-bg-opacity: .1;">
      <div class="card-body">
        <div class="d-flex justify-content-center mb-9">
          <img src="images/logos/Aksesoris.svg" alt="Icon 2" width="80" height="70">
        </div>
        <h4 class="mb-1 fw-semibold text-warning text-center">Aksesoris</h4>
        <h2 class="mb-0 fw-semibold text-warning text-center">{{ count($baju) ? count($baju) : 0 }}</h2>
      </div>
    </div>
  </div>

</div>

@endsection