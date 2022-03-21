@extends('templates/header')

@section('content')
<div class="right_col" role="main">
<div class="card">
    <div class="card-header">
        <h3 class="card title">Algoritma</h3>
    </div>
    <div class="card-body">
    <div>

    <div style="margin-top:20px">
        @if(session('success'))
        <div class="alert alert-succes" role="alert" id="succes-alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">$times;</span>
        </button>
        <ul>
            @foreach ($erros->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div

        
     @endif
    </div>


        {{-- Utama --}}
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
            </div>
            </div>
        </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3>Form</h3>
            </div>
            <div class="card-body">
            <form id="formKaryawan">
                <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="id" placeholder="ID" required>
                  </div>
                </div>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                  </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-3">
                    <input class="form-check-input" type="radio" value="L" name="jk" id="jk">
                    <label class="form-check-label">Laki-Laki</label>
                  </div>
                  <div class="col-sm-3">
                    <input class="form-check-input" type="radio" value="P" name="jk" id="jk">
                    <label class="form-check-label">Perempuan</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="btnSubmit" class="btn btn-primary">Submit</button>
                  <button type="button" id="btnReset" class="btn btn-secondary" >Cancel</button>
                </div>

                 </div>
                  <input type="search" class="form-control col-sm-2" name="search" id="search">
                  <button class="btn btn-success" type="button" id="btnSearch">Cari</button>
                  <table class="table table-compact table-stripped table-bordered" id="tblKaryawan">
              </form>
            </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Data</h3>
            </div>
            <div class="card-body">
                    <div class="card-body">
                    </div>
                    <button class="btn btn-success" type="button" id="Sorting">Sorting</button>
                      </div>
                        <table class="table table-compact table-stripped table-bordered" id="tblKaryawan">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" align="center">belum ada data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </section>

        {{-- End Utama --}}


    </div>
    </div>
    <!--   /.card-body  -->
    <div class="card-footer">

    </div>
    <!--   /.card footer -->
</div>
</div>
@endsection
@push('script')
<script>
function insert(){
    const data = $('#formKaryawan').serializeArray();
    // console.log(data)
    let newData ={}
    data.forEach(function(item){
        let name = item['name']
        let value = (name === 'id'? Number(item['value']):item['value'])
        newData[name] = value
    })
    return newData
}

function insertionSort(arr, key)
{
    let i,  j, id, value;
    for (i = 1; i <arr.length; i++)
    {
        value = arr[i];
        id = arr[i][key]
        j = i - 1;
        while (j >= 0 && arr[j][key] > id)
        {
            arr[j + 1] = arr[j];
            j = j - 1;
        }
        arr[j + 1] = value;
    }
    return arr
}

function showData(arr){
    let row = ''
    if(arr.length == null){
        return row = '<tr><td colspan="3">Belum ada data</td></tr>'
    }
    arr.forEach(function(item, index){
        row += `<tr>`
        row += `<td>${item['id']}</td>`
        row += `<td>${item['nama']}</td>`
        row += `<td>${item['jk']}</td>`
        row += `</tr>`
    })
    return row
}

function searhcing(arr, key, teks){
    for(let i= 0; i <arr.length; i++){
        if(arr[i][key] == teks)
            return i
    }
    return -1
}

$(function(){
  //property
  let dataKaryawan = []
  //events
  $('#formKaryawan').on('submit',function(e){
    e.preventDefault()
    dataKaryawan.push(insert())
    $('#tblKaryawan tbody').html(showData(dataKaryawan))
    console.log(dataKaryawan)
  })

  $('#Sorting').on('click', function(){
      dataKaryawan = insertionSort(dataKaryawan, 'id')

      $('#tblKaryawan tbody').html(showData(dataKaryawan))
      console.log(dataKaryawan)
  })
  $('#btnSearch').on('click', function(e){
      let teksSearch = $('#Search').val()
      let id = searhcing(dataKaryawan, 'id', teksSearch)
      let data = []
      if(id > 0)
        data.push(dataKaryawan[id])
      console.log(id)
      console.log(data)
      $('#tblKaryawan tbody').html(showData(data))
  })
  //end of events
})
</script>
@endpush