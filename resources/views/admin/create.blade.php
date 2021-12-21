  @include('template.header')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }};

  @include('template.navbar')

  @include('template.sidebar')

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Tambah Data Sparepart</h1>
            </div>
          </div>
        </div>
      </div>

  <section class="content">
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
              <input type="text" id="kodeSP" name="kodeSP" class="form-control" maxlength="15" required>
            </div>
            <div class="form-group">
              <label for="namaSP">Nama Sparepart</label>
              <input type="text" id="namaSP" name="namaSP"class="form-control" maxlength="15" required>
            </div>
          </div>
        </div>
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
                  <input type="file" accept=".obj" class="custom-file-input" id="fileObjek" name="fileObjek" required>
                  <label class="custom-file-label" for="fileObjek">Pilih File (.obj)</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Unggah</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File Video</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" accept="video/mp4,video/x-m4v,video/*" class="custom-file-input" id="fileVideo" name="fileVideo" required>
                  <label class="custom-file-label" for="fileObjek">Pilih File</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Unggah</span>
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
        <input type="submit" value="Simpan Data" class="btn btn-success float-right">
      </div>
    </div>
  </section>
</div>
</form>

  @include('template.footer')

</div>

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
          title: "Batalkan Tambah Data?",
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
            title: "Data Batal Ditambahkan.", 
            text: 'Data yang diisi tidak akan disimpan.',
            icon: "info"
          });
        }
      });
    });
</script>
</body>
</html>