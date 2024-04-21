@extends('layouts.menu')

@section('title-head', 'Pengaturan Jadwal Simulasi')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Jadwal Simulasi</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
              <li class="breadcrumb-item active">Jadwal Simulasi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-12">
        <div class="text-center text-lg-left mb-1">
          <button class="btn btn-danger my-25 my-lg-0" type="button" id="btntambahjadwal" value="" data-toggle="modal" data-target="#modal-jadwal" data-backdrop="static" data-keyboard="false"><i data-feather="plus"></i> Tambah Jadwal</button>
        </div>
      </div>

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="tabelprodi">
              <thead class="text-center">
                <th>Angkatan</th>
                <th>Jenis Simulasi</th>
                <th>Pelaksanaan</th>
                <th>Jam</th>
                <th>Aksi</th>
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
<div class="modal fade text-left" id="modal-jadwal" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-jadwal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-jadwal" action="#" method="post" enctype="multipart/form-data">
          <input type="hidden" name="angkatan" id="jadwalangkatan">
          <input type="hidden" name="idjadwal" id="idjadwal">
          <div class="row">
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Angkatan</b></label>
                <input type="text" id="angkatantampil" class="form-control" readonly>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Jenis Simulasi</b></label>
                <select class="form-control select2 idjenis" name="idjenis" data-placeholder="Pilih" required>
                  <option></option>
                  <option value="1">Serentak</option>
                  <option value="2">Mandiri</option>
                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Tanggal Mulai</b></label>
                <input type="text" name="tglmulai" id="tglmulai" class="form-control flatpickr-basic" style="background-color: white" placeholder="Pilih" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Jam Mulai</b></label>
                <input type="text" name="jammulai" id="jammulai" class="form-control flatpickr-time text-left" style="background-color: white" placeholder="Pilih" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Tanggal Berakhir</b></label>
                <input type="text" name="tglakhir" id="tglakhir" class="form-control flatpickr-basic" style="background-color: white" placeholder="Pilih" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Jam Berakhir</b></label>
                <input type="text" name="jamakhir" id="jamakhir" class="form-control flatpickr-time text-left" style="background-color: white" placeholder="Pilih" required>
              </div>
            </div>

            <div class="col-xl-12 mb-1 serentak">
              <div class="row">
                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>Jumlah Soal Ditampilkan</b></label>
                    <input type="number" name="jmlsoal" class="form-control jmlsoal" required>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-12 mb-1 mandiri">
              <div class="row">
                <div class="col-xl-6 mb-1">
                  <div class="form-group">
                    <label><b>Jumlah Soal Ditampilkan</b></label>
                    <input type="number" name="jmlsoal" class="form-control jmlsoal" required>
                  </div>
                </div>
                <div class="col-xl-6 mb-1">
                  <div class="form-group">
                    <label><b>Waktu Pengerjaan (Menit)</b></label>
                    <input type="number" name="waktu" id="waktu" class="form-control" required>
                  </div>
                </div>
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
  var table = $('#tabelprodi').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    "drawCallback": function( settings ) {
      feather.replace();
    },
    dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar px-2 px-lg-0">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
    ajax: '{!! route('pengaturan.jadwal.dt', $angkatan) !!}',
    columns: [
        { data: 'angkatan', name: 'angkatan', class: 'text-center'},
        { data: 'jenis', name: 'jenis', class: 'text-center'},
        { data: 'jadwal', name: 'jadwal', class: 'text-center'},
        { data: 'jam', name: 'jam', class: 'text-center'},
        { data: 'action', name: 'action', class: 'text-center'},
    ],
  });

  $('div.toolbar').html('<div class="text-center mt-25 mt-lg-1"><select class="form-control show-tick ms select2" id="angkatan" name="idta"></select></div>')

  $("#angkatan").select2({
    placeholder: "Pilih Angkatan",
    ajax: {
        url: '{!!route("s2.angkatan")!!}',
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

  $("#angkatan").append($("<option selected='selected'></option>").val('{{$angkatan}}').text('Angkatan {{$angkatan}}')).trigger('change');

  $('#angkatan').on('change', function(){
    var ank = $(this).val()
    table.ajax.url('/pengaturan/jadwal/dt/'+ank).load();
  })

  $('#btntambahjadwal').on('click', function(){
    $("#modal-title-jadwal").text('Tambah Jadwal Simulasi')
    $('.form-jadwal').attr('action', "{{route('pengaturan.jadwal.store')}}")
    $("#idjadwal").val('')
    $("#jadwalangkatan").val('{{$angkatan}}')
    $("#angkatantampil").val('{{$angkatan}}')
    $('.idjenis').val('').trigger('change')
    $('#tglmulai').val('')
    $('#tglakhir').val('')
    $('#jammulai').val('')
    $('#jamakhir').val('')
    $('.jmlsoal').val('')
    $('#waktu').val('')
  })

  $('#tabelprodi tbody').on('click','#btnubahjadwal', function(){
    $("#modal-title-jadwal").text('Ubah Jadwal Simulasi')
    $('.form-jadwal').attr('action', "{{route('pengaturan.jadwal.update')}}")
    $("#idjadwal").val($(this).val())
    $.get('/pengaturan/jadwal/getjadwal/'+$(this).val(), function(data){
      $("#jadwalangkatan").val(data[0])
      $("#angkatantampil").val(data[0])
      $('.idjenis').val(data[1]).trigger('change')
      $('#tglmulai').val(data[2])
      $('#tglakhir').val(data[3])
      $('#jammulai').val(data[4])
      $('#jamakhir').val(data[5])
      $('.jmlsoal').val(data[6])
      $('#waktu').val(data[7])
    })
  })

  $('.idjenis').on('change', function(){
    if ($(this).val() == 1) {
      $(".serentak").show()
      $(".mandiri").hide()
    }else if ($(this).val() == 2) {
      $(".serentak").hide()
      $(".mandiri").show()
    }else {
      $(".serentak").hide()
      $(".mandiri").hide()
    }
  })
});
</script>
@stop
