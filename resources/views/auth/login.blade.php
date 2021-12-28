<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $var_title; }}</title>

  @include('template.header')

</head>
<body class="hold-transition login-page">

  @if (Session::has('message'))
  <div class="alert alert-danger" role="alert">
      {{ Session::get('message') }}
  </div>
  @endif


<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>AR</b> Sparepart</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg" style="font-style:italic">Halaman ini khusus diakses oleh admin</p>

      <form action="{{ route('postLogin') }}" method="post">
        {{ csrf_field(); }}
        <div class="input-group mb-3">
          <input id="email" type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password" type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <p class="mb-1">
              <a href="/forgot">Lupa Password?</a>
            </p>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@include('sweetalert::alert')

<!-- Bootstrap 4 -->
<script src="{{ asset('../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('../adminlte/dist/js/adminlte.js') }}"></script>

</body>
</html>
