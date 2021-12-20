  @include('template.header')
      <!-- DataTables -->
      <link rel="stylesheet" href="{{ asset('../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('../adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body class="layout-top-nav">
<div class="wrapper">

  <!-- Preloader -->
  @include('template.preloader')

<!-- Main content -->
<section class="content">
  <!-- Main row -->
  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">ARSparepart</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Aksi</th>
              <th>Kode Sparepart</th>
              <th>Nama Sparepart</th>
            </tr>
            </thead>
            <tbody>
              @foreach($sparepart as $sparepart)
            <tr>
              <td class="project-actions text-right">
                <a class="btn btn-primary btn-sm" href="{{ route('objek', ['id' => $sparepart->id]) }}">
                  <i class="fas fa-eye">
                  </i>
                </a>
              </td>
              <td>{{ $sparepart->kodeSP }}</td>
              <td>{{ $sparepart->namaSP }}</td>
            </tr>
            @endforeach
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- footer -->
@include('template.footer')


</div>
<!-- ./wrapper -->

@include('template.script')
@include('template.datatables')

</body>
</html>
