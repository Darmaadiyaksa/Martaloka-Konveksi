@extends('layouts.menu')

@section('title-head', 'Data Siswa')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Data Siswa</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Siswa</li>
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
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-siswa" data-backdrop="static" data-keyboard="false" id="btnmahasiswa"><i data-feather="plus"></i> Tambah Siswa</button>
          <button class="btn btn-outline-success mb-1" type="button"  data-toggle="modal" data-target="#modal-export" data-backdrop="static" data-keyboard="false" id="btnmahasiswa"><i data-feather="download"></i> Export Data</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered" id="tabelsiswa">
              <thead class="text-center">
                <tr>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Status</th>
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
  var table = $('#tabelsiswa').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('md.siswa.dt') !!}',
      columns: [
          { data: 'nama', name: 'nama'},
          { data: 'jk.nama', name: 'jk.nama', class: 'text-center' },
          { data: 'status.nama', name: 'status.nama', class: 'text-center' },
          { data: 'action', name: 'action', class: 'text-center' },
      ],
  });

  $("#idagama").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.agama")!!}',
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

  $("#idkec").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.kecamatan")!!}',
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

  $("#idstatus").select2({
    placeholder: "Semua Status",
    ajax: {
        url: '{!!route("s2.statuskerja")!!}',
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

  $("#idstatus2").select2({
    placeholder: "Pilih Status Pegawai",
    ajax: {
        url: '{!!route("s2.statuskerja")!!}',
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

  $('#idstatus2').on('change', function(){
    var idstatusguru = $(this).val()
    table.ajax.url('/masterdata/pegawai/dt/'+idstatusguru).load();
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
