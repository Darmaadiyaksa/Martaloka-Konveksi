@extends('layouts.menu')

@section('title-head', 'Job Order')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Job Order</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Reqruitment</a></li>
              <li class="breadcrumb-item active">Job Order</li>
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
          <button class="btn btn-danger mb-1" type="button" data-toggle="modal" data-target="#modal-job" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="clipboard"></i> Tambah Job Order</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabeljob">
              <thead class="text-center">
                <tr>
                  <th>Nama Perusahaan</th>
                  <th>Pekerjaan</th>
                  <th>Tanggal Interview</th>
                  <th>Kandidat</th>
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
<div class="modal fade text-left" id="modal-job" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-job"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-job" action="#" method="post">
          <input type="hidden" name="id" id="idjob">
          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Perusahaan</b></label>
                <select class="form-control select2" name="idperusahaan" id="idperusahaan" data-placeholder="Pilih" required>
                  
                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Jenis Pekerjaan</b></label>
                <select class="form-control select2" name="idjenispekerjaan" id="idjenispekerjaan" data-placeholder="Pilih" required>
                  
                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Sub Jenis Pekerjaan</b></label>
                <select class="form-control select2" name="idsubpekerjaan" id="idsubpekerjaan" data-placeholder="Pilih" required>
                  
                </select>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Tanggal Interview</b></label>
                <input type="text" name="tglinterview" id="tglinterview" class="form-control flatpickr-basic"  placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Waktu Bali</b></label>
                <input type="text" name="waktu" id="waktu" class="form-control flatpickr-time text-left"  placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Waktu Jepang</b></label>
                <input type="text" name="waktujp" id="waktujp" class="form-control flatpickr-time text-left"  placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Jumlah Kandidat</b></label>
                <input type="number" name="kandidat" id="kandidat" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Pelaksanaan</b></label>
                <div class="row mx-0 mt-50">
                  <div class="custom-control custom-control-danger custom-radio mr-2 mb-50">
                    <input type="radio" id="pl" name="pelaksanaan" value="1" class="custom-control-input" required>
                    <label class="custom-control-label" for="pl">Online</label>
                  </div>
                  <div class="custom-control custom-control-danger custom-radio mb-50">
                    <input type="radio" id="pla" name="pelaksanaan" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="pla">Offline</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Deadline Dokumen</b></label>
                <input type="text" name="deadline" id="deadline" class="form-control flatpickr-basic"  placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-12">
              <div class="form-group">
                <label><b>Penanggung Jawab</b></label>
                <select class="form-control select2" name="idpic" id="idpic" data-placeholder="Pilih" required>
                  
                </select>
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
  var table = $('#tabeljob').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('req.joborder.dt') !!}',
      columns: [
          { data: 'perusahaan.nama', name: 'perusahaan.nama' },
          { data: 'subpekerjaan.nama', name: 'subpekerjaan.nama'},
          { data: 'tanggal', name: 'tanggal', class: 'text-center' },
          { data: 'kandidat', name: 'kandidat', class: 'text-center'},
          { data: 'jmlsiswa', name: 'jmlsiswa', class: 'text-center'},
          { data: 'action', name: 'action', class: 'text-center'},
      ],
  });

  $("#idperusahaan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.perusahaan")!!}',
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

  $("#idjenispekerjaan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.jenispekerjaan")!!}',
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

  $('#idjenispekerjaan').on('change', function(){
    jenis = $(this).val()
    $('#idsubpekerjaan').val('')
    $("#idsubpekerjaan").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.subpekerjaan")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idjenis:jenis
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
  })

  
  $("#idpic").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.pegawai")!!}',
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

  $('#btnadd').on('click', function(){
      $("#modal-title-job").text('Tambah Job Order')
      $('.form-job').attr('action', "{{route('req.joborder.store')}}")
      $('#idjob').val('')
      $('#nama').val('')
  })

  $('#tabeljob tbody').on('click', '#btnedit', function () {
      $('#modal-title-job').text('Ubah Job Order')
      $('.form-job').attr('action', '{{route("req.joborder.update")}}');
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      var data = row.data()
      $('#idjob').val(data.id)
      $('#nama').val(data.nama)
  });

});
</script>
@stop
