<table id="tbl-paket" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>JK</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item )
        <tr>
            <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->tlp }}</td>
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalupdate{{ $item->id }}">
                    Update
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete{{ $item->id }}">
                    Hapus
                </button>
            </td>
        </tr>
        @include('member/form-update')
        @include('member/modal-delete')
        @endforeach
    </tbody>
</table>
