@extends('layouts.menu')

@section('title-head', 'Data Pegawai')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Data Pegawai</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Pegawai</li>
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
          <a href="{{route('md.pegawai.create')}}" class="btn btn-danger mb-1"><i data-feather="plus"></i> Tambah Pegawai</a>
          <form class="d-inline" action="{{route('md.pegawai.generatenpk')}}" method="post">
            <button type="submit" class="btn btn-outline-info mb-1" type="button" ><i data-feather="refresh-cw"></i> Generate Nomor Induk</button>
            @csrf
          </form>
          <button class="btn btn-outline-success mb-1" type="button" data-toggle="modal" data-target="#modal-export" data-backdrop="static" data-keyboard="false" id="btnmahasiswa"><i data-feather="download"></i> Export Data</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered" id="tabelpegawai">
              <thead class="text-center">
                <tr>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Kantor</th>
                  <th>Jenis Kepegawaian</th>
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
<div class="modal fade" id="modal-user" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaltitleuser">Buat User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" action="#" method="post" enctype="multipart/form-data" id="formuser">
        <input type="hidden" name="role" value="1">
        <input type="hidden" name="link" id="link">
        <div class="modal-body">
          <div class="alert alert-danger mb-0" role="alert">
            <div class="alert-body">
              Tidak dapat menambahkan user baru karena <b>alamat email belum dilengkapi</b>. Silakan melengkapi alamat email pada halaman Detail.
            </div>
          </div>

          <div class="isian">
            <div class="form-group">
              <label class="col-sm-12 col-form-label"><b>Username</b></label>
              <div class="col-sm-12">
                <input type="text" name="username" id="username" class="form-control" readonly value="">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-12 col-form-label"><b>Password</b></label>
              <div class="col-sm-12">
                  <input type="text" name="password" id="password" required class="form-control">
              </div>
            </div>
          </div>
          
          {{ csrf_field() }}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success simpan"><i data-feather="save"></i> Simpan</button>
          <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-export" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaltitle">Export Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="forms-sample" action="{{route('md.pegawai.exportexcel')}}" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="jenispegawai" value="2">
          <div class="row">
            <div class="form-group col-md-12">
              <label class="col-sm-12 col-form-label"><b>Pilih Status Pegawai</b></label>
              <div class="col-sm-12">
                <select class="form-control show-tick ms select2" id="idstatus" name="idstatus">

                </select>
              </div>
            </div>
          </div>
          @csrf
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i data-feather="download"></i> Export</button>
          <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('page-js')
<script>
$(document).ready(function() {
  var table = $('#tabelpegawai').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('md.pegawai.dt',0) !!}',
      columns: [
          { data: 'nama', name: 'nama' },
          { data: 'jk.nama', name: 'jk.nama' },
          { data: 'kantor.nama', name: 'kantor.nama' },
          { data: 'jenis.nama', name: 'jenis.nama' },
          { data: 'action', name: 'action', class: 'text-center'},
      ],
  });

  $('div.toolbarstatus').html('<div class="text-center mt-25 mt-lg-1"><select class="form-control select2" id="idcabang"></select></div>')

  $("#idcabang").select2({
    placeholder: "Pilih Penempatan Pegawai",
    ajax: {
        url: '{!!route("s2.kantor")!!}',
        dataType: 'json',
        data: function (params) {
            return {
                q: $.trim(params.term)
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    },
  });

  $('#idcabang').on('change', function(){
    table.ajax.url('/masterdata/pegawai/dt/'+$(this).val()).load();
  })

  $('#tabelpegawai tbody').on('click', '#btnuser', function () {
      $('#formuser').attr('action', '{{route("md.user.store")}}');
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      if (row.data().email == null) {
        $('.alert').show();
        $('.isian').hide();
        $('.simpan').hide();
      }else {
        $('.alert').hide();
        $('.isian').show();
        $('.simpan').show();
      }
      $('#username').val(row.data().email)
      $('#username').prop('readonly', true);

      $('#link').val(row.data().id)
      $('#modaltitleuser').text('Buat User | '+row.data().nama)
  });
});
</script>
@stop
