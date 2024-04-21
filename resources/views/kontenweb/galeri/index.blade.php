@extends('layouts.menu')

@section('title-head', 'Konten Galeri')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Konten Galeri</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Konten Website</a></li>
              <li class="breadcrumb-item active">Galeri</li>
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
          <a href={{route('web.galeri.create')}} class="btn btn-danger mb-1"><i data-feather="plus"></i> Tambah Foto Galeri</a>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelgaleri">
              <thead class="text-center">
                <tr>
                  <th></th>
                  <th>Foto</th>
                  <th>Judul</th>
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
  var table = $('#tabelgaleri').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('web.galeri.dt') !!}',
      columns: [
          { data: 'tglpublish', name: 'tglpublish' },
          { data: 'gambar', name: 'gambar', class: 'text-center', 'render': function(data, type, row){
            return '<img src="/../../'+data+'" height="60" class="rounded" alt="Gambar">';
          }},
          { data: 'judul', name: 'judul' },
          { data: 'tgl', name: 'tgl', class: 'text-center' },
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

  $('#tabelgaleri tbody').on('click', '#btnhapus', function() {
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      var data = row.data()
      if (!confirm('Lanjutkan proses hapus foto ' + data.judul + '?')) {
          event.preventDefault();
      }
  })

});
</script>
@stop
