<table id="tbl-paket" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Outlet</th>
            <th>Jenis</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item )
        <tr>
            <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jenis }}</td>
            <td>{{ $item->nama_paket }}</td>
            <td>{{ $item->harga }}</td>
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalupdate{{ $item->id }}">
                    Update
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete{{ $item->id }}">
                    Hapus
                </button>
            </td>
        </tr>
        @include('paket/form-update')
        @include('paket/modal-delete')
        @endforeach
    </tbody>
</table>
