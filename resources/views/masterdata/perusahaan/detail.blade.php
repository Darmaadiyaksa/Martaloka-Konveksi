@extends('layouts.menu')

@section('title-head', 'Detail Perusahaan')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Detail Perusahaan</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('md.perusahaan')}}">Data Perusahaan</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body text-center">
            <img src="{{$data->logo == null ? asset('assets/images/company-logo.png') : asset($data->logo)}}" class="rounded" width="80%" alt="Logo">
            <button class="btn btn-danger btn-sm mt-75" type="button"  data-toggle="modal" data-target="#modal-perusahaan" data-backdrop="static" data-keyboard="false" id="btnadd"><i data-feather="edit"></i> Ubah Data</button>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="card">
          <div class="card-body">
            <table class="table table-striped mb-0">
              <tr>
                <td>Nama Perusahaan</td>
                <td class="px-0" style="width: 1px">:</td>
                <th>
                  {{$data->nama}}
                  @if ($data->namajp != null)
                    <i class="text-muted" data-feather="chevrons-right"></i> {{$data->namajp}}
                  @endif
                </th>
              </tr>
              <tr>
                <td>Lembaga Pengawas</td>
                <td class="px-0" style="width: 1px">:</td>
                <th>
                  {{$data->lembaga->nama}}
                  @if ($data->lembaga->namajp != null)
                    <i class="text-muted" data-feather="chevrons-right"></i> {{$data->lembaga->namajp}}
                  @endif
                </th>
              </tr>
              <tr>
                <td>Jumlah Siswa</td>
                <td class="px-0" style="width: 1px">:</td>
                <th>{{count($data->keberangkatan)}} Orang</th>
              </tr>
              <tr>
                <td>Alamat Perusahaan</td>
                <td class="px-0" style="width: 1px">:</td>
                <th>
                  @if (count($data->alamat) > 0)
                    @if (count($data->alamat) > 1)
                      <ul class="pl-1 m-0">
                        @foreach ($data->alamat as $da)
                          <li>{{$da->alamat}}</li>
                        @endforeach
                      </ul>
                    @else
                      {{$data->alamat[0]->alamat}}
                    @endif
                  @else
                    <div class="badge badge-light-danger">Belum Ditentukan</div>
                  @endif
                </th>
              </tr>
              <tr>
                <td></td>
                <td class="px-0" style="width: 1px"></td>
                <td>
                  <button class="btn btn-sm btn-outline-danger" style="white-space: nowrap"><i data-feather="plus"></i> Tambah Alamat</button>
                </td>
              </tr>
            </table>
            <hr class="m-0">
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelsiswa">
              <thead class="text-center">
                <th>Nama Siswa</th>
                <th>Paspor</th>
                <th>Alamat Perusahaan</th>
                <th>Sub Jenis Pekerjaan</th>
                <th>Tanggal Keberangkatan</th>
              </thead>
              <tbody>
                @foreach ($data->keberangkatan as $d)
                  <tr>
                    <td>{{$d->siswa->nama}}</td>
                    <td class="text-center">{{$d->siswa->nopaspor}}</td>
                    <td>{{$d->alamat->alamat}}</td>
                    <td>
                      @if ($d->idsubpekerjaan == null)
                        <div class="badge badge-light-danger">Belum Ditentukan</div>
                      @else
                        {{$d->subpekerjaan->nama}}
                      @endif
                    </td>
                    <td><span class="d-none">{{$d->tglberangkat}}</span>{{ (new \App\Helper)->tanggal($d->tglberangkat) }}</td>
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
<div class="modal fade text-left" id="modal-perusahaan" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Data Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample form-perusahaan" action="{{route("md.perusahaan.update")}}" method="post">
          <input type="hidden" name="idperusahaan" value="{{$data->id}}">
          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama ID</b></label>
                <input type="text" name="nama" value="{{$data->nama}}" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama JP</b></label>
                <input type="text" name="namajp" value="{{$data->namajp}}" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Lembaga Pengawas</b></label>
                <select name="idlembaga" id="idlembaga" class="form-control select2" data-placeholder="Pilih" required>

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
  var table = $('#tabelsiswa').DataTable({
    autoWidth: false,
    "drawCallback": function( settings ) {
      feather.replace();
    },
    dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbarstatus">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
    order: [[ 4, "desc" ]],

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

  $("#idlembaga").append($("<option selected='selected'></option>").val('{{$data->idlembaga == null ? "" : $data->idlembaga}}').text('{{$data->idlembaga == null ? "" : $data->lembaga->nama}}')).trigger('change');
});
</script>
@stop
