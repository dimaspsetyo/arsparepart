  @include('template.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('template.navbar')

  @include('template.sidebar')

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Ubah Data Sparepart</h1>
            </div>
          </div>
        </div>
      </div>

  <section class="content">

    <form action="{{ route('update', $sparepart->id) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">DETAIL SPAREPART</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="kodeSP">Kode Sparepart</label>
              <input type="text" id="kodeSP" name="kodeSP" value="{{ $sparepart->kodeSP }}" class="form-control" maxlength="15" required>
            </div>
            <div class="form-group">
              <label for="namaSP">Nama Sparepart</label>
              <input type="text" id="namaSP" name="namaSP" value="{{ $sparepart->namaSP }}" class="form-control" maxlength="15" required>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-md-6">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">UNGGAH FILE</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputFile">File Objek 3D</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="fileObjek" name="fileObjek">
                  <label class="custom-file-label" for="fileObjek">{{ $sparepart->fileObjek }}</label>
                </div>
                <div class="input-group-append">
                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-objek">
                    <i class="fas fa-eye">
                    </i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <a href="#" class="btn btn-secondary batal">Batal</a>
        <input type="submit" value="Ubah Data" class="btn btn-success float-right">
      </div>
    </div>
  </form>
  </section>
  </div>
  @include('template.footer')
</div>

@include('template.largemodals')
@include('template.script')

<script src="{{ asset('../adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>

<script>
  $('.batal').click(function(){
        Swal.fire({
          toast: true,
          title: "Batalkan Ubah Data?",
          text: "Data yang diisi tidak akan disimpan.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#d33',
          confirmButtonText: 'Buang Perubahan',
          cancelButtonText: 'Tidak',
      })
      .then((result) => {
        if (result.isConfirmed) {
          window.location= "/sparepart",
          Swal.fire({
            title: "Data Batal Diubah.", 
            text: 'Data yang diisi tidak akan disimpan.',
            icon: "info"
          });
        }
      });
    });
</script>
</body>
</html>