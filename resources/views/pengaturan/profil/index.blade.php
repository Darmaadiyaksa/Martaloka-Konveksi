@extends('layouts.menu')

@section('title-head', 'Profil Perusahaan')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Profil Perusahaan</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Pengauran</a></li>
              <li class="breadcrumb-item active">Profil Perusahaan</li>
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
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-profil" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="edit"></i> Perbarui Profil</button>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped mb-0">
                <tr>
                  <td>Nama Perusahaan</td>
                  <td class="px-0" style="width: 1px">:</td>
                  <th>{{$data->nama}}</th>
                </tr>
                <tr>
                  <td>Alamat Perusahaan</td>
                  <td class="px-0" style="width: 1px">:</td>
                  <th>
                    @if ($data->alamat == null)
                      <div class="badge badge-light-danger">Belum Dilengkapi</div>
                    @else
                      {{$data->alamat}} 
                    @endif
                  </th>
                </tr>
                <tr>
                  <td>Telepon</td>
                  <td class="px-0" style="width: 1px">:</td>
                  <th>
                    @if ($data->telp == null)
                      <div class="badge badge-light-danger">Belum Dilengkapi</div>
                    @else
                      {{$data->telp}} 
                    @endif
                  </th>
                </tr>
                <tr>
                  <td>Email</td>
                  <td class="px-0" style="width: 1px">:</td>
                  <th>
                    @if ($data->email == null)
                      <div class="badge badge-light-danger">Belum Dilengkapi</div>
                    @else
                      {{$data->email}} 
                    @endif
                  </th>
                </tr>
                <tr>
                  <td>Facebook</td>
                  <td class="px-0" style="width: 1px">:</td>
                  <th>
                    @if ($data->facebook == null)
                      <div class="badge badge-light-danger">Belum Dilengkapi</div>
                    @else
                      {{$data->facebook}} 
                    @endif
                  </th>
                </tr>
                <tr>
                  <td>Instagram</td>
                  <td class="px-0" style="width: 1px">:</td>
                  <th>
                    @if ($data->instagram == null)
                      <div class="badge badge-light-danger">Belum Dilengkapi</div>
                    @else
                      {{$data->instagram}} 
                    @endif
                  </th>
                </tr>
                <tr>
                  <td>Youtube</td>
                  <td class="px-0" style="width: 1px">:</td>
                  <th>
                    @if ($data->youtube == null)
                      <div class="badge badge-light-danger">Belum Dilengkapi</div>
                    @else
                      {{$data->youtube}} 
                    @endif
                  </th>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td class="px-0" style="width: 1px">:</td>
                  <th>
                    @if ($data->deskripsi == null)
                      <div class="badge badge-light-danger">Belum Dilengkapi</div>
                    @else
                      {{$data->deskripsi}} 
                    @endif
                  </th>
                </tr>
              </table>
              <hr class="m-0">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')
<div class="modal fade text-left" id="modal-profil" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-jenis">Perbarui Profil Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="jquery-val-form" class="forms-sample" action="{{route('profil.update')}}" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nama Perusahaan</b></label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{$data->nama}}" required>
              </div>
            </div>
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Telepon</b></label>
                <input type="number" name="telp" class="form-control" value="{{$data->telp}}" required>
              </div>
            </div>
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Alamat Perusahaan</b></label>
                <input type="text" name="alamat" class="form-control" value="{{$data->alamat}}" required>
              </div>
            </div>
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Email</b></label>
                <input type="email" name="email" class="form-control" value="{{$data->email}}" required>
              </div>
            </div>
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Facebook</b></label>
                <input type="text" name="facebook" class="form-control" value="{{$data->facebook}}" required>
              </div>
            </div>
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Instagram</b></label>
                <input type="text" name="instagram" class="form-control" value="{{$data->instagram}}" required>
              </div>
            </div>
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Youtube</b></label>
                <input type="text" name="youtube" class="form-control" value="{{$data->youtube}}" required>
              </div>
            </div>
            <div class="col-xl-12">
              <div class="form-group">
                <label><b>Deskripsi</b></label>
                <textarea name="deskripsi" class="form-control" cols="30" rows="3" required>{{$data->deskripsi}}</textarea>
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
  
});
</script>
@stop
