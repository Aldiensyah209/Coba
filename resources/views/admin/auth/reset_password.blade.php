@extends('admin.master')
@section('title', 'Reset Password')
@section('kontent')
<div class="card" id="reset-password">
  <div class="card-body p-4">
    <a href="{{ route('profile') }}" class="d-flex align-items-center mb-9">
      <i class="ti ti-arrow-left text-primary fs-6"></i>
    </a>
    <div class="d-flex align-items-center justify-content-start mb-9">
      <h5 class="card-title fw-semibold mb-0">Reset Password</h5>
    </div>
    <form id="formResetPassword" action="{{ route('updatePassword') }}" method="POST">
      @csrf
      @method('POST')
      <div class="mb-3">
        <label for="inputCurrentPassword" class="form-label">Password Lama</label>
        <input type="password" class="form-control" id="current_password" name="current_password" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
      </div>
      <div class="mb-3">
        <label for="inputNewPassword" class="form-label">Password Baru</label>
        <input type="password" class="form-control" id="new_password" name="new_password" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
      </div>
      <div class="mb-4">
        <label for="inputNewConfirmPassword" class="form-label">Konfirmasi Password Baru</label>
        <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password" oninvalid="this.setCustomValidity('Bidang tidak boleh kosong')" oninput="setCustomValidity('')" required>
      </div>
      @if(Session::get('error') && Session::get('error') != null)
      <div class="alert alert-danger mb-4">
        <b>Opps!</b> {{ Session::get('error') }}
      </div>
      @endif
      @if(Session::get('success') && Session::get('success') != null)
      <div class="alert alert-success mb-4">
        {{ Session::get('success') }}
      </div>
      @endif
      <div class="text-end">
        <button type="submit" id="save" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Simpan</button>
      </div>
    </form>
  </div>
</div>
@endsection