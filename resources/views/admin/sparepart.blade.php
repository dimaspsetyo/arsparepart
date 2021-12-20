  @include('template.header')
  <link rel="stylesheet" href="{{ asset('../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('../adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('template.navbar')

  @include('template.sidebar')

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <a href="{{ route('create') }}"  class="btn btn-info btn-block">
              <i class="fa fa-plus"></i> Tambah Data Sparepart
            </a>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Database Sparepart</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID Sparepart</th>
                    <th>Kode Sparepart</th>
                    <th>Nama Sparepart</th>
                    <th>Tanggal Edit</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($spareparts as $sparepart)
                  <tr>
                    <td>{{ $sparepart->id }}</td>
                    <td>{{ $sparepart->kodeSP }}</td>
                    <td>{{ $sparepart->namaSP }}</td>
                    <td>{{ date_format($sparepart->updated_at, 'jS M Y') }}</td>
                    <td class="project-actions text-right">
                      @include('template.action')
                    </td>
                  </tr>
                  @endforeach
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div
    </section>
  </div>
  @include('template.footer')
</div>

@include('sweetalert::alert')

@include('template.script')

@include('template.datatables')


<script>
  $('.ubah').click(function(){
    var sparepartid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');

      Swal.fire({
        toast: true,
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

<script>
  $('.hapus').click(function(){
    var sparepartid = $(this).attr('data-id');
    var nama = $(this).attr('data-nama');

      Swal.fire({
        toast:true,
        title: "Hapus Data?",
        text: "Sparepart '"+nama+"'akan dihapus.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data',
        cancelButtonText: 'Batal',
    })
    .then((result) => {
      if (result.isConfirmed) {
        window.location= "/delete/"+sparepartid+""
      }
    });
  });
</script>

<script src="{{ asset('../adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>

</body>
</html>
