<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <h1>Xuzu Admin</h1>
                </a>
                <form action="{{ route('login') }}" method="POST">
                  @csrf
                  @method('POST')
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label @error('name') is-invalid @enderror">Username</label>
                    <input type="text" class="form-control" id="inputName" name="name">
                    <div class="invalid-feedback">@error('name') {{$message}} @enderror</div>
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label @error('password') is-invalid @enderror">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password">
                    <div class="invalid-feedback">@error('password') {{$message}} @enderror</div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" id="flexCheckChecked" name="remember_checkbox">
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remember this device
                      </label>
                    </div>
                  </div>
                  @if(session('error'))
                  <div class="alert alert-danger">
                    <b>Opps!</b> {{session('error')}}
                  </div>
                  @endif
                  <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Body Wrapper End -->
  <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>