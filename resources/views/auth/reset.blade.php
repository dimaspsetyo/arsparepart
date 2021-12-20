<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $var_title; }}</title>

  @include('template/header')
  
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>AR</b> Sparepart</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg" style="font-style:italic">Silahkan masukkan password baru Anda</p>
      <form action="{{ route('postReset') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">

        @if ($errors->has('email'))
          <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <div class="input-group mb-3">
          <input name="email" id="email" type="email" class="form-control" placeholder="Masukkan Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        @if ($errors->has('password'))
          <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <div class="input-group mb-3">
          <input name="password" id="password" type="password" class="form-control" placeholder="Password Baru">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        @if ($errors->has('confirmPassword'))
          <span class="text-danger">{{ $errors->first('confirmPassword') }}</span>
        @endif
        <div class="input-group mb-3">
          <input name="confirmPassword" id="password" type="password" class="form-control" placeholder="Konfirmasi Password Baru">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
          </div>
        </div>
      </form
      <p class="mt-3 mb-1">
        <a href="/login">Halaman Masuk</a>
      </p>
    </div>
  </div>
</div>

<@include('template/script')
</body>
</html>
