@extends('admin.master')
@section('title', 'Profile')
@section('kontent')

<div class="card" id="profile">
  <div class="card-body p-4">
    <div class="d-flex align-items-center justify-content-start mb-9">
      <h5 class="card-title fw-semibold mb-0">Profile</h5>
    </div>
    <div class="text-nowrap logo-img text-center d-block py-3 w-100" target="_blank" rel="noopener">
      <img src="{{ asset('images/profile/user-1.jpg') }}" width="140" alt="Profile Image" class="rounded-circle" />
    </div>
    <form id="formProfile" action="{{ route('updateProfile') }}" method="POST">
      @csrf
      @method('POST')
      <div class="mb-3">
        <label for="exampleInputName" class="form-label @error('name') is-invalid @enderror">Username</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->first()->name }}" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
        <div class="invalid-feedback">@error('name') {{$message}} @enderror</div>
      </div>
      <div class="mb-4">
        <label for="exampleInputEmail" class="form-label @error('email') is-invalid @enderror">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->first()->email }}" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
        <div class="invalid-feedback">@error('email') {{$message}} @enderror</div>
      </div>
      <div class="d-flex align-items-center justify-content-end mb-4">
        <a class="text-primary fw-bold" href="{{ route('resetPassword') }}">Reset Password ?</a>
      </div>
      <button type="submit" id="save" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" disabled>Simpan</button>
    </form>
  </div>
</div>

@endsection