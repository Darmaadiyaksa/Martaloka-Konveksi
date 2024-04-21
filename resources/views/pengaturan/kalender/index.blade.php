@extends('layouts.menu')

@section('title-head', 'Kalender Kegiatan')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Kalender Kegiatan</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Kalender Kegiatan</li>
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
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-kegiatan" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="plus"></i> Tambah Kegiatan</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelkegiatan">
              <thead class="text-center">
                <tr>
                  <th></th>
                  <th>Nama Kegiatan</th>
                  <th>Jenis</th>
                  <th>Pelaksanaan</th>
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
<div class="modal fade text-left" id="modal-kegiatan" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-kegiatan"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-kegiatan" action="#" method="post">
          <input type="hidden" name="id" id="id">
          <div class="row">
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Jenis Kegiatan</b></label>
                <select class="form-control select2" name="idjenis" id="idjenis" data-placeholder="Pilih" required>
                  
                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Lokasi</b></label>
                <select class="form-control select2" name="idkantor" id="idkantor" data-placeholder="Pilih">
                  
                </select>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama Kegiatan</b></label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Tanggal Mulai</b></label>
                <input type="text" name="tglmulai" id="tglmulai" class="form-control flatpickr-basic"  placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Jam Mulai</b></label>
                <input type="text" name="jammulai" id="jammulai" class="form-control flatpickr-time text-left"  placeholder="Pilih" style="background-color: white">
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Tanggal Selesai</b></label>
                <input type="text" name="tglselesai" id="tglselesai" class="form-control flatpickr-basic"  placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Jam Selesai</b></label>
                <input type="text" name="jamselesai" id="jamselesai" class="form-control flatpickr-time text-left"  placeholder="Pilih" style="background-color: white">
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
  var table = $('#tabelkegiatan').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('kalender.dt') !!}',
      columns: [
          { data: 'tglmulai', name: 'tglmulai' },
          { data: 'nama', name: 'nama' },
          { data: 'jenis.nama', name: 'jenis.nama'},
          { data: 'pelaksanaan', name: 'pelaksanaan', class: 'text-center'},
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

  $("#idjenis").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.jeniskegiatan")!!}',
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

  $("#idkantor").select2({
    placeholder: "Pilih",
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

  $('#tglmulai').on('change', function(){
    if ($('#tglselesai').val() != null) {
      $('#tglselesai').val($(this).val())
    }
  })

  $('#btnadd').on('click', function(){
      $("#modal-title-kegiatan").text('Tambah Kegiatan')
      $('.form-kegiatan').attr('action', "{{route('kalender.store')}}")
      $('#id').val('')
      $('#idjenis').val('').trigger('change')
      $('#idkantor').val('').trigger('change')
      $('#nama').val('')
      $('#tglmulai').val('')
      $('#jammulai').val('')
      $('#tglselesai').val('')
      $('#jamselesai').val('')
  })

  $('#tabelkegiatan tbody').on('click', '#btnedit', function () {
      $('#modal-title-kegiatan').text('Ubah Kegiatan')
      $('.form-kegiatan').attr('action', '{{route("kalender.update")}}');
      var tr = $(this).closest('tr');
      var row = table.row(tr);
      var data = row.data()
      $('#id').val(data.id)
      $('#nama').val(data.nama)
      $('#tglmulai').val(data.tglmulai)
      $('#jammulai').val(data.jammulai)
      $('#tglselesai').val(data.tglselesai)
      $('#jamselesai').val(data.jamselesai)
      $("#idjenis").append($("<option selected='selected'></option>").val(data.idjenis).text(data.jenis.nama)).trigger('change');
      $("#idkantor").append($("<option selected='selected'></option>").val(data.idkantor).text(data.kantor.nama)).trigger('change');
  });
});
</script>
@stop
