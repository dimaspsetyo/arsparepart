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
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
  @endif

<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>AR</b> Sparepart</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg" style="font-style:italic">Masukkan email Anda. Kami akan mengirimkan tautan ke email Anda.</p>
      <form action="{{ route('postForgot') }}" method="POST">
        {{ csrf_field() }}
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <div class="input-group mb-3">
          <input name="email" type="email" class="form-control" placeholder="Masukkan Email" id="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Kirim tautan</button>
          </div>
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="/login">Halaman Masuk</a>
      </p>
    </div>
  </div>
</div>
@include('template.script')

</body>
</html>
