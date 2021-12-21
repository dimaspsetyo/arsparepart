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
              <h1 class="m-0">Detail Sparepart</h1>
            </div>
          </div>
        </div>
      </div>
    <section class="content">
      <form action="{{ route('show', $sparepart->id) }}" method="get" enctype="multipart/form-data">
        {{ csrf_field() }}
      <div class="row">
        <div class="col-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Sparepart</h3>
            </div>
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode Sparepart</th>
                        <th>Nama Sparepart</th>
                        <th>Tanggal ditambahkan</th>
                        <th>Tanggal diubah</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                      <td>{{ $sparepart->kodeSP }}</td>
                      <td>{{ $sparepart->namaSP }}</td>
                      <td>{{ date_format($sparepart->created_at, 'jS M Y') }}</td>
                      <td>{{ date_format($sparepart->updated_at, 'jS M Y') }}</td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">File Video</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>File Video</label>
                <ul class="list-unstyled">
                  <li>
                      <a href="{{ route('video', ['id' => $sparepart->id]) }}" class="text-info">
                        <i class="far fa-fw fa-eye"></i>
                        {{ $sparepart->fileVideo }}
                      </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">File Objek 3D</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>File Objek 3D</label>
                <ul class="list-unstyled">
                  <li>
                      <a href="{{ route('objek', ['id' => $sparepart->id]) }}" class="btn text-info">
                        <i class="far fa-fw fa-eye"></i>
                        {{ $sparepart->fileObjek }}
                      </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
      <div class="row">
        <div class="col-sm-6">
          <a href="{{ route('sparepart') }}" class="btn btn-secondary">Kembali</a>
            <a class="btn btn-info ubah" href="#" data-id="{{ $sparepart->id }}" data-nama="{{  $sparepart->namaSP  }}">
              <i class="fas fa-pencil-alt"></i>
              Ubah Data
            </a>
        </div>
      </div>
    </section>
  </div>
  @include('template.footer')
</div>

@include('template.largemodals')

@include('template.script')

@include('template.datatables')

<script>
  $('.ubah').click(function(){
    var sparepartid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');

      Swal.fire({
        toast:true,
        position:'bottom-end',
        title: "Ubah Data?",
        text: "Ubah data sparepart '"+nama+"'",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ubah Data',
        cancelButtonText: 'Batal',
    })
    .then((result) => {
      if (result.isConfirmed) {
        window.location= "/edit/"+sparepartid+""
      }
    });
  });
</script>

</body>
</html>