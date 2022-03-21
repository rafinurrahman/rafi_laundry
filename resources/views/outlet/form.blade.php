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

        <div class="modal-body">
          <form method="POST" action="outlet/create" >
            @csrf
            <div class="form-group">
                <label for="nama" class="form-control-label my-auto"><b> Nama : </b></label>
                <div class="input-group input-group-outline">
                <input type="text" name="nama" value="{{ old('nama') }}" class="ms-2 form-control @error('nama') is-invalid @enderror">
                @error('nama')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="telp" class="form-control-label my-auto"><b> Telephone : </b></label>
                <div class="input-group input-group-outline">
                <input type="text" name="telp" value="{{ old('telp') }}" class="ms-2 form-control @error('telp') is-invalid @enderror" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                @error('telp')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
                </div>
              </div>
              <div class="form-group mt-2">
                <label for="alamat" class="form-control-label my-auto"><b> Alamat : </b></label>
                <div class="input-group input-group-outline">
                <textarea name="alamat" class="ms-2 form-control @error('alamat') is-invalid @enderror" rows="4" cols="50">{{ old('alamat') }}</textarea>
                @error('alamat')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
                </div>
              </div>

              <div class="modal fade" id="formImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Import Data Outlet</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> 
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ url(request()->segment(1).'/outlet/import') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="jenis">FILE WFS</label>
                                <input type="file" name="import" id="import">
                              </div>
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="btn-submit">Uplode</button>
                    </div>
                  </div>
                </div>
              </div>
              {{-- <div class="form-group mt-2">
                <label for="jenis_kelamin" class="form-control-label my-auto"><b> Jenis Kelamin : </b></label>
                <div class="input-group input-group-outline ms-2">
                <select name="jenis_kelamin" id="js-example-basic-single" class="form-control @error('type') is-invalid @enderror">
                    <option selected disabled value>--- Jenis Kelamin ---</option>
                    <option value="L"> L</option>
                    <option value="P"> P</option>
                </select>
                @error('jenis_kelamin')
                    <div class="text-muted">{{ $message }}</div>
                @enderror
                </div>
              </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
           </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>