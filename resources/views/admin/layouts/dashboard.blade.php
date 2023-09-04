@extends('admin.master')
@section('title', 'Dashboard')
@section('kontent')

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Total Baju</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">{{ count($baju) ? count($baju) : 0 }}</h4>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-center">
              <img src="images/logos/favicon.png" alt="Icon 2" class="mr-2" width="30" height="30">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Yearly Breakup</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3">$36,358</h4>
          </div>
          <div class="col-4">
            <div class="d-flex justify-content-center">
              <img src="images/logos/favicon.png" alt="Icon 2" class="mr-2" width="30" height="30">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection