@extends('layouts.menu')

@section('title-head', 'Detail Jenis Pekerjaan')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Detail Jenis Pekerjaan</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('md.jenispekerjaan')}}">Data Jenis Pekerjaan</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-lg-4 col-sm-4">
        <div class="card">
          <div class="card-header">
            <div>
              <p class="card-text mb-0">Nama Jenis Pekerjaan</p>
              <h4 class="font-weight-bolder mb-0">{{$data->nama}}</h4>
            </div>
            <div class="avatar bg-light-info p-50 m-0">
              <div class="avatar-content">
                <i class="font-medium-5" data-feather="pocket"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4">
        <div class="card">
          <div class="card-header">
            <div>
              <p class="card-text mb-0">Jumlah Sub Jenis</p>
              <h4 class="font-weight-bolder mb-0">{{$data->sub->count()}}</h4>
            </div>
            <div class="avatar bg-light-danger p-50 m-0">
              <div class="avatar-content">
                <i class="font-medium-5" data-feather="tag"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-4">
        <div class="card">
          <div class="card-header">
            <div>
              <p class="card-text mb-0">Jumlah Siswa Magang</p>
              <h4 class="font-weight-bolder mb-0">{{$data->jmlsiswa}}</h4>
            </div>
            <div class="avatar bg-light-primary p-50 m-0">
              <div class="avatar-content">
                <i class="font-medium-5" data-feather="users"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="text-center text-lg-left">
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-sub" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="plus"></i> Tambah Sub Jenis Pekerjaan</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabeljenis">
              <thead class="text-center">
                <tr>
                  <th>Nama Sub Jenis Pekerjaan</th>
                  <th>Jumlah Siswa</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data->sub as $sub)
                  <tr>
                    <td>{{$sub->nama}}</td>
                    <td class="text-center">{{$sub->keberangkatan->count()}}</td>
                    <td></td>
                  </tr>
                @endforeach
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
<div class="modal fade text-left" id="modal-sub" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title-sub"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample form-sub" action="#" method="post">
          <input type="hidden" name="idsub" id="idsub">
          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama ID</b></label>
                <input type="text" name="nama" value="{{$data->nama}}" class="form-control" required>
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
  var table = $('#tabelsiswa').DataTable({
    autoWidth: false,
    "drawCallback": function( settings ) {
      feather.replace();
    },
    dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
    order: [[ 4, "desc" ]],

  });

});
</script>
@stop
