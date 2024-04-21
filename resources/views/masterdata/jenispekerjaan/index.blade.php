@extends('layouts.menu')

@section('title-head', 'Jenis Pekerjaan')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Jenis Pekerjaan</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Jenis Pekerjaan</li>
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
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-jenis" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="plus"></i> Tambah Jenis Pekerjaan</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabeljenis">
              <thead class="text-center">
                <tr>
                  <th>Nama Jenis Pekerjaan</th>
                  <th>Jumlah Sub Jenis</th>
                  <th>Jumlah Siswa</th>
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
<div class="modal fade text-left" id="modal-jenis" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-jenis"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-jenis" action="#" method="post">
          <input type="hidden" name="id" id="idjenis">
          <div class="row">
            <div class="col-xl-12">
              <div class="form-group">
                <label><b>Nama Jenis Pekerjaan</b></label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
            </div>
          </div>
          {{ csrf_field() }}
        </div>
        <div class="modal-footer">
          <button type="submit" id="btn-submit" class="btn btn-sm btn-success"><i data-feather="save"></i> Simpan</button>
          <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('page-js')
<script>
$(document).ready(function() {
  var table = $('#tabeljenis').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('md.jenispekerjaan.dt') !!}',
      columns: [
          { data: 'nama', name: 'nama' },
          { data: 'jmlsub', name: 'jmlsub', class: 'text-center'},
          { data: 'jmlsiswa', name: 'jmlsiswa', class: 'text-center'},
          { data: 'action', name: 'action', class: 'text-center'},
      ],
  });

  $('#btnadd').on('click', function(){
      $("#modal-title-jenis").text('Tambah Data Jenis Pekerjaan')
      $('.form-jenis').attr('action', "{{route('md.jenispekerjaan.store')}}")
      $('#idjenis').val('')
      $('#nama').val('')
  })

  $('#tabeljenis tbody').on('click', '#btnedit', function () {
      $('#modal-title-jenis').text('Ubah Data Jenis Pekerjaan')
      $('.form-jenis').attr('action', '{{route("md.jenispekerjaan.update")}}');
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      var data = row.data()
      $('#idjenis').val(data.id)
      $('#nama').val(data.nama)
  });
});
</script>
@stop
