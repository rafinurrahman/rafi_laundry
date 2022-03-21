@extends('templates/header')

@section('content')
<div class="right_col" role="main">
<div class="card">
    <div class="card-header">
        <h3 class="card title">Paket</h3>
    </div>
    <div class="card-body">
        <button type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#formInputModal">
        Tambah Data
        </button>
        {{-- <a type="button" href="{{ route('export-paket') }}" class="btn btn-success">
        Export
        </a type="button">
        <button type=" class="btn btn-warning " data-toggle="modal" data-target="#formImport">
            </i class="fas fa-file-excel"></i>Import
        </button>
        </a> --}}
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
        @include('paket/list-all')
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
@include('paket/form')
@push('script')
<script>
  
</script>
@endpush