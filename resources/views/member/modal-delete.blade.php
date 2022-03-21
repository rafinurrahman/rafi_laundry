<!-- Modal Delete -->
<div class="modal fade" id="modaldelete{{ $item->id }}" tabindex="-1" aria-labelledby="modaldeletelabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <form action="/member/delete/{{ $item->id }}" method="POST" enctype="multipart/form-data" class="d-inline">
        @csrf
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
        </div>
        <div class="modal-body">
        Apakah yakin menghapus data {{ $item->nama }}, {{ $item->alamat }}?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-danger">Delete</button>
        </div>
        </form>
    </div>
    </div>
</div>
<!-- End Modal Delete -->