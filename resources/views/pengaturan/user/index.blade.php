@extends('layouts.menu')

@section('title-head', 'Pengaturan User Mahasiswa')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">User Mahasiswa</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
              <li class="breadcrumb-item active">User Mahasiswa</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered dt-complex-header" id="tabeluser">
              <thead class="text-center">
                <th>NPM</th>
                <th>Nama Mahasiswa</th>
                <th>Username</th>
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
<div class="modal fade text-left" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-jadwal">Reset User Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger mb-2" role="alert">
          <h4 class="alert-heading"><i data-feather="alert-circle" style="margin-top: -2px"></i> PERHATIAN</h4>
          <div class="alert-body">
            Perubahan username dan atau password pada sistem ini juga akan berlaku ke <b>Portal Akademik</b>.
          </div>
        </div>
        <form id="jquery-val-form" class="forms-sample form-jadwal" action="{{route('pengaturan.user.reset')}}" method="post" enctype="multipart/form-data">
          <input type="hidden" name="npm" id="npm">
          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama Mahasiswa</b></label>
                <input type="text" id="namamhs" class="form-control" readonly>
              </div>
            </div>
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Username</b></label>
                <input type="email" name="email" id="email" class="form-control" required>
              </div>
            </div>
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Password</b></label>
                <input type="text" name="password" id="password" class="form-control" required>
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
  var table = $('#tabeluser').DataTable({
    processing: true,
    serverSide: true,
    autoWidth: false,
    "drawCallback": function( settings ) {
      feather.replace();
    },
    dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar px-2 px-lg-0">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
    ajax: '{!! route('pengaturan.user.dt', $angkatan) !!}',
    columns: [
        { data: 'npm', name: 'npm'},
        { data: 'nama', name: 'nama'},
        { data: 'username', name: 'username'},
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
    table.ajax.url('/pengaturan/user/dt/'+ank).load();
  })

  $('#tabeluser tbody').on('click','#btnubahuser', function(){
    $.get('/pengaturan/user/getuser/'+$(this).val(), function(data){
      var username = ''
      if (data.user != null) {
        username = data.user.username
      }
      $("#npm").val(data.npm)
      $("#namamhs").val(data.nama)
      $("#email").val(username)
      $('#password').val('')
    })
  })
});
</script>
@stop
