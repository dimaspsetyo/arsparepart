  <a class="btn btn-primary btn-sm" href="{{ route('show', ['id' => $sparepart->id]) }}">
    <i class="fas fa-eye">
    </i>
  </a>
  <a class="btn btn-info btn-sm ubah" href="#" data-id="{{ $sparepart->id }}" data-nama="{{  $sparepart->namaSP  }}">
    <i class="fas fa-pencil-alt">
    </i>
  </a>
  <a class="btn btn-danger btn-sm hapus" href="#" data-id="{{ $sparepart->id }}" data-nama="{{  $sparepart->namaSP  }}">
    <i class="fas fa-trash">
    </i>
  </a>