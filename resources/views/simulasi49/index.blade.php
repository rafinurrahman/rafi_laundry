@extends('templates/header')

@section('content')
<div class="right_col" role="main">
<div class="card">
    <div class="card-header">
        <h3 class="card title">Simulasi Gaji Karyawan</h3>
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
        </div>
    @endif
    </div>
    {{-- Utama --}}
        <!--Content Header (Page header)-->
<section class="content-header">
    <div class="container-fluid">
    <div class="row">  
    </div>
    </div> <!--/.container-fluid -->
</section>

{{-- Main Content --}}
<section class="content">
    {{-- form --}}
    <div class="card">
        <div class="card-header">
            <h3>Simulasi Gaji Karyawan</h3>
        </div>
        <div class="card-body">
        <form id="formKaryawan">
            <div class="form-group row">
                <label for="id" class="col-sm-2 col-form-label">ID Karyawan</label>
                <div class="col-sm-2">
                <input type="text" class="form-control" name="id" placeholder="ID" required>
              </div>
            </div>
            <div class="form-group row">
                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-5">
                <input class="form-check-input" type="radio" value="L" name="jk" id="jk">
                <label class="form-check-label">Laki-Laki</label>
              </div>
              <div class="col-sm-5">
                <input class="form-check-input" type="radio" value="P" name="jk" id="jk">
                <label class="form-check-label">Perempuan</label>
              </div>
            </div>
            <div class="form-group row">
                <label for="anak" class="col-sm-2 col-form-label">Jumlah anak</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" name="anak" placeholder="0" required>
              </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Karyawan</label>
                <div class="col-sm-5">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" required>
              </div>
            </div>
            <div class="form-group row">
                <label for="status" class="col-sm-2 col-form-label">Status Menikah</label>
                <div class="col-sm-5">
                <select name   ="status" 
                        class  ="form-select"
                        id     ="exampleFormControlSelect12"
                        aria-describedby="inputGroupPrepend3"
                        required="required">
                        <option>Single</option>
                        <option>Couple</option>
                </select>
                
              </div>
            </div>

            <div class="form-group row">
                <label for="tahun" class="col-sm-2 col-form-label">Mulai Bekerja</label>
                <div class="col-sm-5">
                <input type="date" class="form-control" name="tahun" placeholder="tahun" required>
              </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-5">
                    <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                    <button class="btn btn-default" id="btnReset" type="submit">Reset</button>
                </div>
            </div>
    {{-- end of form --}}
                    
                    
            <!-- /.card-body -->           
    <!-- /.card-body -->

   {{-- data --}}
   <div class="card">
       <div class="card-header">
           <h3>Data</h3>
       </div>
       <div class="row card-body">
        <div>
            <button class="btn btn-success " type="button" id="sorting">Sorting</button>
        </div>
        <input type="search" class="form-control col-sm-2" name="search" id="search">
        <button class="btn btn-success" type="button" id="btnSearch">Cari</button>
           <table class="table table-compact table-stripped table-bordered" id="tblKaryawan">
               <thead>
                   <tr>
                       <td>ID</td>
                       <td>Nama</td>
                       <td>Jenis Kelamin</td>
                       <td>Status</td>
                       <td>Jumlah Anak</td>
                       <td>Mulai Bekerja</td>
                       <td>Gaji Awal</td>
                       <td>Tunjangan</td>
                       <td>Total Gaji</td>
                   </tr>
               </thead>
               <tbody>
                   <tr>
                       <td colspan="6" align="center"> Belum ada data</td>
                   </tr>
               </tbody>
           </table>
       </div>
       </div>
       {{-- end data --}}
</section>
{{-- /.content --}}
  {{-- End Utama --}}
</div>
</div>
<!--   /.card-body  -->
<div class="card-footer">
    Footer 
</div>
<!--   /.card footer -->
</div>
</div>
@endsection
@push('script')
<script>
  function insert(){
const data = $('#formKaryawan').serializeArray();
let newData = {}
data.forEach(function(item,index){
    let name = item['name']
    let value = (name === 'id'? Number(item['value']):item['value'])
    newData[name] = value
    })
    return newData

// function insert(){
//     const data =$('#formBuku').serializeArray()
//     let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
//     let newData = {}
//     data.forEach(function(item, index){
//         let name = item['name']
//         let  value = (name === 'id_buku' ||
//                     name === 'qty' ||
//                     name === 'harga'
//                     ? Number(item['value']);item['value'])
//         newData[name] = value
//     })
//     console.log(newData)

//     localStorage.setitem('dataBuku', JSON.stringify([...dataBuku, newData]))
//     return newData
// }

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
        row += `<td>${item['status']}</td>`
        row += `<td>${item['anak']}</td>`
        row += `<td>${item['tahun']}</td>`
        // row += `<td>${item['gaji']}</td>`
        row += `<td>2000000</td>`
        // row += `<td>${item['tunjangan']}</td>`
        row += `<td>${item['totalgaji']}</td>`           
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


function insertionSort(arr, key)
{
    let i, j, id, value;
    for (i = 1; i< arr.length; i++)
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

$(function(){
  //initialize
  let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
  $('#tblKaryawan tbody').html(showData(dataKaryawan))
    //console.log(dataKaryawan) 
  
  //events
  $('#formKaryawan').on('submit',function(e){
    e.preventDefault()
    dataKaryawan.push(insert())

    $('#tblKaryawan tbody').html(showData(dataKaryawan))
    console.log(dataKaryawan)

    $('#btnSearch').on('click', function(e){
        let teksSearch = $('#search').val()
        let id = searching(dataKaryawan, 'id', teksSearch)
        let data = []
        if(id >= 0)
            data.push(dataKaryawan[id])
        console.log(id)
        console.log(data)
        $('#tblKaryawan tbody').html(showData(data))
    })
  })

  $('#sorting').on('click', function(){
      dataKaryawan = insertionSort(dataKaryawan, 'id')

      $('#tblKaryawan tbody').html(showData(dataKaryawan))
      console.log(dataKaryawan)
  })
  //end of events
})
</script>
@endpush