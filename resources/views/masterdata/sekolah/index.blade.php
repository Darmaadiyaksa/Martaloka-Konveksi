@extends('layouts.menu')

@section('title-head', 'Data Asal Sekolah')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Data Asal Sekolah
          </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Masterdata</a></li>
              <li class="breadcrumb-item active">Asal Sekolah</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row">
      <div class="col-12">
        <div class="text-center div text-lg-left">
          <button class="btn btn-danger mb-1" data-toggle="modal" data-target="#modalsekolah" data-backdrop="static" data-keyboard="false" name="button"><i data-feather="plus"></i> Tambah Sekolah</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelprovinsi">
              <thead class="text-center">
                <th>Provinsi Asal</th>
                <th>Jumlah Sekolah</th>
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
<div class="modal fade text-left" id="modalsekolah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modaltitledokumen">Tambah Data Asal Sekolah</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample" action="{{route('md.sekolah.store')}}" method="post" enctype="multipart/form-data" id="formjalur">
          <div class="row">
            <div class="form-group col-lg-12">
              <label class="col-sm-12 col-form-label"><b>Nama Sekolah</b></label>
              <div class="col-sm-12">
                <input type="text" name="nama" class="form-control" required>
              </div>
            </div>

            <div class="form-group col-lg-12">
              <label class="col-sm-12 col-form-label"><b>Alamat Sekolah</b></label>
              <div class="col-sm-12">
                <input type="text" name="alamat" class="form-control" required>
              </div>
            </div>

            <div class="form-group col-lg-6">
              <label class="col-sm-12 col-form-label"><b>Provinsi Asal</b></label>
              <div class="col-sm-12">
                <select class="form-control show-tick ms select2" name="idprov" id="provsekolah" required>

                </select>
              </div>
            </div>

            <div class="form-group col-lg-6">
              <label class="col-sm-12 col-form-label"><b>NPSN</b></label>
              <div class="col-sm-12">
                <input type="text" name="npsn" class="form-control" required>
              </div>
            </div>

            <div class="form-group col-lg-12">
              <label class="col-sm-12 col-form-label"><b>ID Dapodik</b></label>
              <div class="col-sm-12">
                <input type="text" name="idsekolah" class="form-control">
              </div>
            </div>

            <div class="form-group col-lg-6">
              <label class="col-sm-12 col-form-label"><b>Bentuk</b></label>
              <div class="col-sm-12">
                <select class="form-control show-tick ms select2" name="bentuk" data-placeholder="Pilih" required>
                  <option></option>
                  <option value="SMA">SMA</option>
                  <option value="SMK">SMK</option>
                </select>
              </div>
            </div>

            <div class="form-group col-lg-6">
              <label class="col-sm-12 col-form-label"><b>Jenis Sekolah</b></label>
              <div class="col-sm-12">
                <select class="form-control show-tick ms select2" name="jenis" data-placeholder="Pilih" required>
                  <option></option>
                  <option value="N">Negeri</option>
                  <option value="S">Swasta</option>
                </select>
              </div>
            </div>

            <div class="form-group col-lg-12">
              <label class="col-sm-12 col-form-label"><b>Koordinat Lokasi</b></label>
              <div class="col-sm-12">
                <input type="text" name="koordinat" class="form-control">
              </div>
            </div>
          </div>
          @csrf
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i data-feather="save"></i> Simpan</button>
          <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal">Kembali</button>
        </div>
        </form>
    </div>
  </div>
</div>
@endsection

@section('page-js')
<script>
$(document).ready(function() {
  var table = $('#tabelprovinsi').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    "drawCallback": function( settings ) {
      feather.replace();
    },
    dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
    ajax: '{!! route('md.sekolah.dt') !!}',
    columns: [
        { data: 'provinsi.nama', name: 'provinsi.nama'},
        { data: 'jumlah', name: 'jumlah', class: 'text-center'},
        { data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
    ],
  });

  $("#provsekolah").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.sekolahprovinsi")!!}',
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
  
});
</script>
@stop
