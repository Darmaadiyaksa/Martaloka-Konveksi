@extends('layouts.menu')

@section('title-head', 'Pengaturan Soal Simulasi')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Soal Simulasi</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
              <li class="breadcrumb-item active">Soal Simulasi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered dt-complex-header" id="tabelprodi">
              <thead class="text-center">
                <tr>
                  <th rowspan="2">Nama Bidang</th>
                  <th colspan="2">Bank Soal</th>
                  <th rowspan="2">Aksi</th>
                </tr>
                <tr>
                  <th>SJT</th>
                  <th>PCK</th>
                </tr>
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
  var table = $('#tabelprodi').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    "drawCallback": function( settings ) {
      feather.replace();
    },
    dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarta px-2 px-lg-0">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
    ajax: '{!! route('pengaturan.soal.dt') !!}',
    columns: [
        { data: 'nama', name: 'nama'},
        { data: 'sjt', name: 'sjt', class: 'text-center'},
        { data: 'pck', name: 'pck', class: 'text-center'},
        { data: 'action', name: 'action', class: 'text-center'},
    ],
  });
});
</script>
@stop
