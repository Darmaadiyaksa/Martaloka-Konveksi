@extends('layouts.menu')

@section('title-head', 'Detail Job Order')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Detail Job Order</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('req.joborder')}}">Job Order</a></li>
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
          <div class="card-body row m-0 align-items-center justify-content-center">
            <img src="{{$data->logo == null ? asset('assets/images/company-logo.png') : asset($data->logo)}}" class="rounded" width="80%" alt="Logo">
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
                  {{$data->perusahaan->nama}}
                  @if ($data->perusahaan->namajp != null)
                    <i class="text-muted" data-feather="chevrons-right"></i> {{$data->perusahaan->namajp}}
                  @endif
                </th>
              </tr>
              <tr>
                <td>Lembaga Pengawas</td>
                <td class="px-0" style="width: 1px">:</td>
                <th>
                  {{$data->perusahaan->lembaga->nama}}
                  @if ($data->perusahaan->lembaga->namajp != null)
                    <i class="text-muted" data-feather="chevrons-right"></i> {{$data->perusahaan->lembaga->namajp}}
                  @endif
                </th>
              </tr>
              <tr>
                <td>Jenis Pekerjaan</td>
                <td class="px-0" style="width: 1px">:</td>
                <th>{{$data->jenispekerjaan->nama}} <i class="text-muted" data-feather="chevrons-right"></i> {{$data->subpekerjaan->nama}}</th>
              </tr>
              <tr>
                <td>Interview</td>
                <td class="px-0" style="width: 1px">:</td>
                <th>
                  {{ (new \App\Helper)->tanggal($data->tglinterview) }}
                  <i data-feather="chevrons-right" class="text-muted"></i>
                  {{date('H:i',strtotime($data->waktu))}} WITA
                  <span class="text-muted mx-25">|</span>
                  {{date('H:i',strtotime($data->waktujp))}} JPN
                </th>
              </tr>
              <tr>
                <td>Kandidat</td>
                <td class="px-0" style="width: 1px">:</td>
                <th>{{$data->kandidat}} Orang</th>
              </tr>
              <tr>
                <td>Jumlah Siswa</td>
                <td class="px-0" style="width: 1px">:</td>
                <th>{{count($data->detil)}} Orang</th>
              </tr>
              <tr>
                <td></td>
                <td class="px-0" style="width: 1px"></td>
                <td>
                  <button class="btn btn-outline-warning btn-sm" type="button"  data-toggle="modal" data-target="#modal-job" data-backdrop="static" data-keyboard="false"><i data-feather="edit"></i> Ubah</button>
                  @if (count($data->detil) == 0)
                    <form class="d-inline" action="{{route('req.joborder.delete')}}" method="post" onsubmit="return confirm('Lanjutkan proses hapus data job order dari {{$data->perusahaan->nama}}?')">
                      <button type="submit" class="btn btn-sm btn-outline-danger" name="id" value="{{$data->id}}"><i data-feather="trash-2"></i> Hapus</button>
                      @csrf
                    </form>
                  @endif
                </td>
              </tr>
            </table>
            <hr class="m-0">
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="text-center text-lg-left">
          <button class="btn btn-danger mb-1" type="button"  data-toggle="modal" data-target="#modal-siswa" data-backdrop="static" data-keyboard="false"><i data-feather="plus"></i> Tambah Siswa</button>
          @if (count($data->detil) > 0)
            <form class="d-inline" action="{{route('req.joborder.cetakcvall')}}" method="post" target="_blank">
              <button type="submit" class="btn btn-info mb-1" name="idjob" value="{{$data->id}}"><i data-feather="printer"></i> Cetak Semua CV</button>
              {{ csrf_field() }}
            </form>
          @endif
        </div>
      </div>

      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-hover" id="tabelsiswa">
              <thead class="text-center">
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Usia</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                @foreach ($data->detil as $d)
                  <tr>
                    <td>{{$d->siswa->nama}}</td>
                    <td>{{$d->siswa->jk->nama}}</td>
                    <td class="text-center">{{ (new \App\Helper)->durasitahun($d->siswa->tglahir) }}</td>
                    <td class="text-center">
                      <form class="d-inline" action="{{route('req.joborder.cetakcv')}}" method="post" target="_blank">
                        <input type="hidden" name="idsiswa" value="{{$d->idsiswa}}">
                        <button type="submit" class="btn btn-sm btn-outline-info" name="idjob" value="{{$d->idjob}}"><i data-feather="printer"></i> Cetak CV</button>
                        {{ csrf_field() }}
                      </form>
                    </td>
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
<div class="modal fade text-left" id="modal-job" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-job">Ubah Job Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-job" action="{{route('req.joborder.update')}}" method="post">
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Perusahaan</b></label>
                <input class="form-control" value="{{$data->perusahaan->nama}}" readonly>
                  
                </input>
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
                <input type="text" name="tglinterview" id="tglinterview" value="{{$data->tglinterview}}" class="form-control flatpickr-basic"  placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            
            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Waktu Bali</b></label>
                <input type="text" name="waktu" id="waktu" value="{{date('H:i',strtotime($data->waktu))}}" class="form-control flatpickr-time text-left"  placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Waktu Jepang</b></label>
                <input type="text" name="waktujp" id="waktujp" value="{{date('H:i',strtotime($data->waktujp))}}" class="form-control flatpickr-time text-left"  placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Jumlah Kandidat</b></label>
                <input type="number" name="kandidat" id="kandidat" value="{{$data->kandidat}}" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Pelaksanaan</b></label>
                <div class="row mx-0 mt-50">
                  <div class="custom-control custom-control-danger custom-radio mr-2 mb-50">
                    <input type="radio" id="pl" name="pelaksanaan" value="1" {{$data->pelaksanaan == 1 ? 'checked' : ''}} class="custom-control-input" required>
                    <label class="custom-control-label" for="pl">Online</label>
                  </div>
                  <div class="custom-control custom-control-danger custom-radio mb-50">
                    <input type="radio" id="pla" name="pelaksanaan" value="2" {{$data->pelaksanaan == 2 ? 'checked' : ''}} class="custom-control-input">
                    <label class="custom-control-label" for="pla">Offline</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Deadline Dokumen</b></label>
                <input type="text" name="deadline" id="deadline" value="{{$data->deadline}}" class="form-control flatpickr-basic"  placeholder="Pilih" style="background-color: white" required>
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

<div class="modal fade text-left" id="modal-siswa" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" action="{{route('req.joborder.storesiswa')}}" method="post">
          <input type="hidden" name="id" value="{{$data->id}}">
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead class="text-center">
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Pilih</th>
              </thead>
              <tbody>
                <?php $ii = 0; $no = 1 ?>
                @foreach ($siswa as $s)
                  <input type="hidden" name="siswa[]" value="{{$s->id}}">
                  <input type="hidden" name="siswa2[]" value="{{$ii}}">
                  <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$s->nama}}</td>
                    <td class="text-center">{{$s->idjk == null ? '' : $s->jk->nama}}</td>
                    <td style="width: 1px">
                      <div class="custom-control custom-control-danger custom-checkbox text-center ml-75">
                        <input id="a{{$ii}}" value="{{$ii}}" name="a{{$ii}}" class="custom-control-input" type="checkbox">
                        <label class="custom-control-label" for="a{{$ii}}"></label>
                      </div>
                    </td>
                  </tr>
                  <?php $ii++; $no++; ?>
                @endforeach
              </tbody>
            </table>
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

  $("#idjenispekerjaan").append($("<option selected='selected'></option>").val('{{$data->idjenispekerjaan == null ? "" : $data->idjenispekerjaan}}').text('{{$data->idjenispekerjaan == null ? "" : $data->jenispekerjaan->nama}}')).trigger('change');

  $("#idsubpekerjaan").append($("<option selected='selected'></option>").val('{{$data->idsubpekerjaan == null ? "" : $data->idsubpekerjaan}}').text('{{$data->idsubpekerjaan == null ? "" : $data->subpekerjaan->nama}}'));

  $("#idpic").append($("<option selected='selected'></option>").val('{{$data->idpic == null ? "" : $data->idpic}}').text('{{$data->idpic == null ? "" : $data->pic->nama}}'));
});
</script>
@stop
