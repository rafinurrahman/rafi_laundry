<!-- Modal -->
<div class="modal fade" id="formInputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      {{-- <div class="modal-body">
        <form method="POST" action="paket/create" >
          @csrf
          <div class="form-group">
              <label for="id_outlet" class="form-control-label my-auto"><b> ID Outlet : </b></label>
              <div class="input-group input-group-outline">
              <input type="text" name="id_outlet" value="{{ old('id_outlet') }}" class="ms-2 form-control @error('id_outlet') is-invalid @enderror">
              @error('id_outlet')
                  <div class="text-muted">{{ $message }}</div>
              @enderror
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="jenis" class="form-control-label my-auto"><b> Jenis Paket : </b></label>
              <div class="input-group input-group-outline ms-2">
              <select name="jenis" id="js-example-basic-single" class="form-control @error('type') is-invalid @enderror">
                  <option selected disabled value>--- Jenis Paket ---</option>
                  <option value="kiloan"> Kiloan </option>
                  <option value="selimut"> Selimut </option>
                  <option value="bed_cover"> Bed Cover</option>
                  <option value="kaos"> Kaos </option>
                  <option value="lain"> Lain-lain </option>
              </select>
              @error('jenis')
                  <div class="text-muted">{{ $message }}</div>
              @enderror
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="nama_paket" class="form-control-label my-auto"><b> Nama Paket : </b></label>
              <div class="input-group input-group-outline">
              <input type="text" name="nama_paket" value="{{ old('nama_paket') }}" class="ms-2 form-control @error('nama_paket') is-invalid @enderror" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
              @error('nama_paket')
                  <div class="text-muted">{{ $message }}</div>
              @enderror
              </div>
            </div>
            <div class="form-group mt-2">
              <label for="harga" class="form-control-label my-auto"><b> Harga : </b></label>
              <div class="input-group input-group-outline">
              <textarea name="harga" class="ms-2 form-control @error('harga') is-invalid @enderror" rows="4" cols="50">{{ old('harga') }}</textarea>
              @error('harga')
                  <div class="text-muted">{{ $message }}</div>
              @enderror
              </div>
            </div>
            
          
         </form>
              </div> --}}

              <div class="modal-body">
                <form method="POST" action="paket/create" >
                  @csrf
                <div class="form-group">
                    <label for="id_outlet" class="form-control-label"> Outlet </label>
                    <div class="input-group input-group-outline ms-2">
                        <select name="id_outlet" id="js-example-basic-single" class="form-control @error('type') is-invalid @enderror">
                            <option selected disabled value>--- Pilih Outlet ---</option>
                        @foreach ($outlet as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->tlp }}</option>
                        @endforeach
                        </select>
                        @error('id_outlet')
                            <div class="text-muted">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="jenis" class="form-control-label my-auto"><b> Jenis Paket : </b></label>
                    <div class="input-group input-group-outline ms-2">
                    <select name="jenis" id="js-example-basic-single" class="form-control @error('type') is-invalid @enderror">
                        <option selected disabled value>--- Pilih Jenis ---</option>
                        <option value="kiloan"> Kiloan </option>
                        <option value="selimut"> Selimut </option>
                        <option value="bed_cover"> Bed Cover </option>
                        <option value="kaos"> Kaos </option>
                        <option value="lain"> Lain </option>
                    </select>
                    @error('jenis')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="nama_paket" class="form-control-label my-auto"><b> Nama Paket : </b></label>
                    <div class="input-group input-group-outline">
                    <input type="text" name="nama_paket" value="{{ old('nama_paket') }}" class="ms-2 form-control @error('nama_paket') is-invalid @enderror">
                    @error('nama_paket')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="harga" class="form-control-label my-auto"><b> Harga Paket : </b></label>
                    <div class="input-group input-group-outline">
                    <input type="number" name="harga" value="{{ old('harga') }}" class="ms-2 form-control @error('harga') is-invalid @enderror">
                    @error('harga')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
              
            </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

