@extends('layouts.menu')

@section('title-head', 'Konten Informasi')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Konten Informasi</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Konten Website</a></li>
              <li class="breadcrumb-item active">Informasi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-12">
        <div class="text-center text-lg-left">
          <a href={{route('web.informasi.create')}} class="btn btn-danger mb-1"><i data-feather="plus"></i> Tambah Informasi</a>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelberita">
              <thead class="text-center">
                <tr>
                  <th></th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Status</th>
                  <th>Tanggal Publish</th>
                  <th>Aksi</th>
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
  var table = $('#tabelberita').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('web.informasi.dt') !!}',
      columns: [
          { data: 'tglpublish', name: 'tglpublish' },
          { data: 'cover', name: 'cover', class: 'text-center', 'render': function(data, type, row){
            return '<img src="/../../'+data+'" height="40" class="rounded" alt="Gambar">';
          }},
          { data: 'judul', name: 'judul' },
          { data: 'status', name: 'status', class: 'text-center', 'render': function(data, type, row){
            if (data == 1) {
              return '<div class="badge badge-light-success">Publish</div>'
            }else {
              return '<div class="badge badge-light-danger">Draft</div>';
            }
          }},
          { data: 'tgl', name: 'tgl' },
          { data: 'action', name: 'action', class: 'text-center'},
      ],
      order: [[ 0, "desc" ]],
      columnDefs: [
        {
          "targets": [ 0 ],
          "visible": false,
          "searchable": false,
          "orderable": true
        },
      ],
  });

  $('#tabelberita tbody').on('click', '#btnhapus', function() {
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      var data = row.data()
      if (!confirm('Lanjutkan proses hapus informasi ' + data.judul + '?')) {
          event.preventDefault();
      }
  })

});
</script>
@stop
