@extends('layouts.menu')

@section('title-head', 'Daftar Sekolah')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Daftar Sekolah
          </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('md.sekolah')}}">Asal Sekolah</a></li>
              <li class="breadcrumb-item active">{{$data->provinsi->nama}}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelsekolah">
              <thead class="text-center">
                <th>Nama Sekolah</th>
                <th>Bentuk</th>
                <th>Jenis</th>
                <th>Alamat</th>
              </thead>
              <tbody>
             
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')

@endsection

@section('page-js')
<script>
$(document).ready(function() {
  var table = $('#tabelsekolah').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    "drawCallback": function( settings ) {
      feather.replace();
    },
    dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
    ajax: '{!! route('md.sekolah.dtdetil',$data->idprov) !!}',
    columns: [
        { data: 'nama', name: 'nama'},
        { data: 'bentuk', name: 'bentuk'},
        { data: 'jenis', name: 'jenis', 'render': function(data, type, row){
          if (data == 'N') {
            return 'Negeri';
          }else {
            return 'Swasta';
          }
        }},
        { data: 'alamat', name: 'alamat'},
    ],
  });
});
</script>
@stop
