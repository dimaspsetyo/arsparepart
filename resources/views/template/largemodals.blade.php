<style>
  .modal {
      text-align: center;
  }
</style>

<form action="{{ route('show', $sparepart->id) }}" method="get" enctype="multipart/form-data">
  {{ csrf_field() }}
<div class="modal fade" id="modal-video">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ $sparepart->fileVideo }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="1%">Video</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><img class="img-fluid"src="{{ url('/upload/video/'.$sparepart->fileVideo) }}"></td>
            </form>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-objek">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">{{ $sparepart->fileObjek }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="1%">Objek</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><img class="img-fluid" src="{{ url('/upload/objek/'.$sparepart->fileObjek) }}"></td>
            </form>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</form>