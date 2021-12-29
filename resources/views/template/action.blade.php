  <a class="btn btn-primary btn-flat" href="{{ route('show', ['id' => $sparepart->id]) }}">
    <i class="fas fa-eye">
    </i>
  </a>
  <a class="btn btn-info btn-flat ubah" href="#" data-id="{{ $sparepart->id }}" data-nama="{{  $sparepart->namaSP  }}">
    <i class="fas fa-pencil-alt">
    </i>
  </a>
  <a class="btn btn-danger btn-flat hapus" href="#" data-id="{{ $sparepart->id }}" data-nama="{{  $sparepart->namaSP  }}">
    <i class="fas fa-trash">
    </i>
  </a>