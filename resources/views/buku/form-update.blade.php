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
          <form method="POST" action="buku/update/{{ $item->id }}" >
            @csrf
             <div class="form-group">
                <label for="judul" class="form-control-label my-auto"><b> Judul : </b></label>
                <div class="input-group input-group-outline">
                <input type="text" name="judul" value="{{ old('judul') ? old('judul') : $item->judul}}" class="ms-2 form-control @error('judul') is-invalid @enderror">
                @error('judul')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="penerbit" class="form-control-label my-auto"><b> Penerbit : </b></label>
                <div class="input-group input-group-outline">
                <input type="text" name="penerbit" value="{{ old('penerbit') ? old('penerbit') : $item->penerbit}}" class="ms-2 form-control @error('penerbit') is-invalid @enderror">
                @error('penerbit')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="tahun_penerbit" class="form-control-label my-auto"><b> Penerbit : </b></label>
                <div class="input-group input-group-outline">
                <input type="text" name="tahun_penerbit" value="{{ old('tahun_penerbit') ? old('tahun_penerbit') : $item->tahun_penerbit}}" class="ms-2 form-control @error('tahun_penerbit') is-invalid @enderror" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                @error('tahun_penerbit')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="tanggal" class="form-control-label my-auto"><b> Tanggal : </b></label>
                <div class="input-group input-group-outline ms-2">
                  <input type="date" name="tanggal" value="{{ old('tanggal') ? old('tanggal') : $item->tanggal}}" class="ms-2 form-control @error('tanggal') is-invalid @enderror">
                @error('tanggal')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="harga" class="form-control-label my-auto"><b> Harga : </b></label>
                <div class="input-group input-group-outline">
                <input type="text" name="harga" value="{{ old('harga') ? old('harga') : $item->harga}}" class="ms-2 form-control @error('harga') is-invalid @enderror" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                @error('harga')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="qty" class="form-control-label my-auto"><b> Qty : </b></label>
                <div class="input-group input-group-outline">
                <input type="text" name="qty" value="{{ old('qty') ? old('qty') : $item->qty}}" class="ms-2 form-control @error('qty') is-invalid @enderror" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                @error('qty')
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