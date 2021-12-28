@include('template.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <form action="{{ route('postPassword') }}" method="post">
    {{ csrf_field() }}

  @include('template.navbar')

  @include('template.sidebar')

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Ubah Password</h1>
            </div>
          </div>
        </div>
      </div>

      @if (Session::has('message'))
      <div class="col-sm-6 offset-sm-3 alert alert-danger" role="alert">
          {{ Session::get('message') }}
      </div>
      @endif

  <section class="content">
    <div class="row">
      <div class="col-sm-6 offset-sm-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Form Password</h3>
          </div>

          <div class="card-body">
            @if ($errors->has('current_password'))
            <span class="text-danger">{{ $errors->first('current_password') }}</span>
            @endif
            <div class="input-group mb-3">
              <input name="current_password" id="current_password" type="password" class="form-control" placeholder="Password Lama" autocomplete="off">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <div class="input-group mb-3">
              <input name="password" id="password" type="password" class="form-control" placeholder="Password Baru" autocomplete="off">
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
              <input name="confirmPassword" id="confirmPassword" type="password" class="form-control" placeholder="Konfirmasi Password" autocomplete="off">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
              <a href="#" class="btn btn-secondary float-left batal">Batal</a>
              <input type="submit" value="Ubah Password" class="btn btn-success float-right">
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
</form>

  @include('template.footer')

</div>

@include('template.script')
@include('sweetalert::alert')


<script>
  $('.batal').click(function(){
        Swal.fire({
          toast: true,
          title: "Batalkan Ubah Password?",
          text: "Data yang diisi tidak akan disimpan.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#d33',
          confirmButtonText: 'Ya, Batalkan',
          cancelButtonText: 'Tidak',
      })
      .then((result) => {
        if (result.isConfirmed) {
          window.location= "/sparepart",
          Swal.fire({
            title: "Password Batal Diubah.", 
            text: 'Data yang diisi tidak akan disimpan.',
            icon: "info"
          });
        }
      });
    });
</script>
</body>
</html>