<!-- Modal -->
<div class="modal fade" id="modalupdate{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="POST" action="pembeli/update/{{ $item->id }}" >
          @csrf
          <div class="form-group">
              <label for="id_member" class="form-control-label my-auto"><b> ID Member : </b></label>
              <div class="input-group input-group-outline">
              <input type="text" name="id_member" value="{{ old('id_member') ? old('id_member') : $item->id_member}}" readonly class="ms-2 form-control @error('id_member') is-invalid @enderror">
              @error('id_member')
                  <div class="text-muted">{{ $message }}</div>
              @enderror
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="petugas" class="form-control-label my-auto"><b> Petugas : </b></label>
              <div class="input-group input-group-outline">
              {{-- <input type="text" name="petugas" value="{{ old('petugas') ? old('petugas') : $item->petugas}}" class="ms-2 form-control @error('petugas') is-invalid @enderror" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"> --}}
              <input type="text" name="petugas" value="{{ old('petugas') ? old('petugas') : $item->petugas}}" class="ms-2 form-control @error('petugas') is-invalid @enderror">
              @error('petugas')
                  <div class="text-muted">{{ $message }}</div>
              @enderror
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="status" class="form-control-label my-auto"><b> Status  : </b></label>
              <div class="input-group input-group-outline ms-2">
              <select name="status" id="js-example-basic-single" class="form-control @error('type') is-invalid @enderror">
                  <option selected value="{{ old('status') ? old('status') : $item->status}}"> {{ $item->status }} - Saat ini </option>
                  <option value="tercatat"> Tercatat </option>
                  <option value="penjemputan"> Penjemputan </option>
                  <option value="selesai">Selesai</option>
              </select>
              @error('status')
                  <div class="text-muted">{{ $message }}</div>
              @enderror
              </div>
            </div>
           

            
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
         </form>
              </div>
              <div class="modal-footer">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>