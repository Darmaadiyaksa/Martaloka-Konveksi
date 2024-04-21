@extends('layouts.menu')

@section('title-head', 'Data Perusahaan')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Data Perusahaan</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Perusahaan</li>
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
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-perusahaan" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="plus"></i> Tambah Perusahaan</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelperusahaan">
              <thead class="text-center">
                <tr>
                  <th>Nama Perusahaan</th>
                  <th>Lembaga Pengawas</th>
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
<div class="modal fade text-left" id="modal-perusahaan" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-perusahaan"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-perusahaan" action="#" method="post">
          <input type="hidden" name="idperusahaan" id="idperusahaan">
          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama ID</b></label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama JP</b></label>
                <input type="text" name="namajp" id="namajp" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Lembaga Pengawas</b></label>
                <select name="idlembaga" id="idlembaga" class="form-control select2" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-12">
              <div class="form-group">
                <label><b>Alamat Perusahaan</b></label>
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
  var table = $('#tabelperusahaan').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('md.perusahaan.dt') !!}',
      columns: [
          { data: 'nama', name: 'nama', render: function(data, type, row){
              if (row.namajp == null) {
                return data
              }else {
                return data+'<br><small class="text-muted">'+row.namajp+'</small>'
              }
          }},
          { data: 'lembaga.nama', name: 'lembaga.nama'},
          { data: 'jmlsiswa', name: 'jmlsiswa', class: 'text-center'},
          { data: 'action', name: 'action', class: 'text-center'},
      ],
  });

  $("#idlembaga").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.lembaga")!!}',
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
      $("#modal-title-perusahaan").text('Tambah Data Perusahaan')
      $('.form-perusahaan').attr('action', "{{route('md.perusahaan.store')}}")
      $('#idperusahaan').val('')
      $('#nama').val('')
      $('#namajp').val('')
      $('#alamat').val('')
      $('#idlembaga').val('').trigger('change')
  })

  $('#tabelperusahaan tbody').on('click', '#btnedit', function () {
      $('#modal-title-perusahaan').text('Ubah Data Perusahaan')
      $('.form-perusahaan').attr('action', '{{route("md.perusahaan.update")}}');
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      var data = row.data()
      $('#idperusahaan').val(data.id)
      $('#nama').val(data.nama)
      $('#namajp').val(data.namajp)
      $('#idlembaga').val(data.idlembaga).trigger('change')
  });
});
</script>
@stop
