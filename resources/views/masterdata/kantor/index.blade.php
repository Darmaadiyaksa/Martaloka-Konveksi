@extends('layouts.menu')

@section('title-head', 'Data Kantor')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Data Kantor</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Kantor</li>
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
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-kantor" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="plus"></i> Tambah Kantor</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelkantor">
              <thead class="text-center">
                <tr>
                  <th>Nama Kantor</th>
                  <th>Jenis</th>
                  <th>Alamat</th>
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
<div class="modal fade text-left" id="modal-kantor" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-kantor"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-kantor" action="#" method="post">
          <input type="hidden" name="idkantor" id="idkantor">
          <div class="row">
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nama Kantor</b></label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Jenis Kantor</b></label>
                <select class="form-control select2" name="idjenis" id="idjenis" data-placeholder="Pilih" required>
                  <option></option>
                  <option value="1">Pusat</option>
                  <option value="2">Cabang</option>
                </select>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Alamat Kantor</b></label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
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
  var table = $('#tabelkantor').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('md.kantor.dt') !!}',
      columns: [
          { data: 'nama', name: 'nama'},
          { data: 'idjenis', name: 'idjenis', class: 'text-center', render: function(data, type, row){
            if (data == 1) {
              return '<div class="badge badge-light-success">Pusat</div>'
            }else {
              return '<div class="badge badge-light-secondary">Cabang</div>'
            }
          }},
          { data: 'alamat', name: 'alamat' },
          { data: 'action', name: 'action', class: 'text-center'},
      ],
  });

  $('#btnadd').on('click', function(){
      $("#modal-title-kantor").text('Tambah Data Kantor')
      $('.form-kantor').attr('action', "{{route('md.kantor.store')}}")
      $('#idkantor').val('')
      $('#nama').val('')
      $('#idjenis').val('').trigger('change')
      $('#alamat').val('')
  })

  $('#tabelkantor tbody').on('click', '#btnedit', function () {
      $('#modal-title-kantor').text('Ubah Data Kantor')
      $('.form-kantor').attr('action', '{{route("md.kantor.update")}}');
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      var data = row.data()
      $('#idkantor').val(data.id)
      $('#nama').val(data.nama)
      $('#idjenis').val(data.idjenis).trigger('change')
      $('#alamat').val(data.alamat)
  });
});
</script>
@stop
