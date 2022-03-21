<table id="tbl-paket" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Tahun_Penerbit</th>
            <th>Tanggal</th>
            <th>Harga</th>
            <th>Qty</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item )
        <tr>
            <td>{{ $i = (isset($i)?++$i:$i=1) }}</td>
            <td>{{ $item->judul}}</td>
            <td>{{ $item->penerbit }}</td>
            <td>{{ $item->tahun_penerbit }}</td>
            <td>{{ $item->harga }}</td>
            <td>{{ $item->qty}}</td>
            <td>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalupdate{{ $item->id }}">
                    Update
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete{{ $item->id }}">
                    Hapus
                </button>
            </td>
        </tr>
        @include('buku/form-update')
        @include('buku/modal-delete')
        @endforeach
    </tbody>
</table>
