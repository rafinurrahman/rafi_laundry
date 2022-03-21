<table id="tbl-pembeli" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Alamat Pelanggan</th>
            <th>No.Telp Pelanggan</th>
            <th>Petugas Penjemputan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item )
        <tr>
            <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->tlp }}</td>
            <td>{{ $item->petugas }}</td>
            <td>
                <form action="pembeli/update/{{ $item->id }}"
                    method="POST" enctype="multipart/form-data" class="d-inline"
                    id="select_status{{ $item->id }}">
                @csrf
                <div class="input-group input-group-outline ms-2">
                    <select name="status" id="ubah_status{{ $item->id }}"
                        class="form-control @error('type') is-invalid @enderror" onchange="form.submit()">
                        <option selected
                            value="{{ old('status') ? old('status') : $item->status }}">
                            {{ $item->status }} (Saat ini)</option>
                        <option value="tercatat"> Tercatat </option>
                        <option value="penjemputan"> Penjemputan </option>
                        <option value="selesai"> Selesai </option>
                        <input type="hidden" name="id_member"
                            value="{{ old('id_member') ? old('id_member') : $item->id_member }}">
                        <input type="hidden" name="petugas"
                            value="{{ old('petugas') ? old('petugas') : $item->petugas }}">
                    </select>
                    @error('status')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                </form>
                {{-- <script>
                $('#ubah_status{{ $item->id }}').change(function() {
                    $('#select_status{{ $item->id }}').submit();
                });
                </script> --}}
        </td>
            <td>
                
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalupdate{{ $item->id }}">
                    Update
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete{{ $item->id }}">
                    Hapus
                </button>
            </td>
        </tr>
        @include('pembeli/form-update')
        @include('pembeli/modal-delete')
        @endforeach
    </tbody>
</table>
