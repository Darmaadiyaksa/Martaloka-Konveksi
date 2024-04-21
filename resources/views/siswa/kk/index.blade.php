@extends('layouts.menu')

@section('title-head', 'Kartu Keluarga')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Kartu Keluarga</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">ASKA Bali</a></li>
              <li class="breadcrumb-item active">Kartu Keluarga</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-12">
        @if ($data == null)
          <div class="card">
            <div class="card-body">
              <div class="row align-items-center text-center text-lg-left">
                <div class="col-sm-1 px-1 text-center">
                  <div class="avatar bg-light-danger p-50 p-lg-1 m-25">
                    <div class="avatar-content">
                      <i data-feather="info" class="font-medium-5"></i>
                    </div>
                  </div>
                </div>
                <div class="col-sm-8">
                  <h4 class="font-weight-bolder mb-0">PERHATIAN</h4>
                  <p class="card-text">
                    Anda belum melengkapi isian data <b>Kartu Keluarga</b>.<br>
                    Silakan tekan tombol <b>Lengkapi Data KK</b> untuk memulai.
                  </p>
                </div>
                <div class="col-sm-3 text-center text-lg-right">
                  <button class="btn btn-outline-danger" type="button"  data-toggle="modal" data-target="#modal-kk" data-backdrop="static" data-keyboard="false"><i data-feather="edit" class="font-medium-3 mb-50"></i><br>Lengkapi Data KK</button>
                </div>
              </div>
            </div>
          </div> 
        @else
          <form class="d-inline" action="{{route('siswa.kk.cetak')}}" method="post" target="_blank">
            <button type="submit" class="btn btn-danger mb-1" name="id" value="{{$data->id}}"><i data-feather="printer"></i> Cetak Kartu Keluarga</button>
            {{ csrf_field() }}
          </form>
          <div class="card">
            <div class="card-header">
              <h4>Isian Kartu Keluarga</h4>
              <button class="btn btn-sm btn-warning" type="button"  data-toggle="modal" data-target="#modal-kk" data-backdrop="static" data-keyboard="false"><i data-feather="edit"></i> Ubah Data KK</button>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <tr>
                        <td>Nomor KK</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->nomor}}</th>
                      </tr>
                      <tr>
                        <td>Alamat Keluarga</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->alamat}}</th>
                      </tr>
                      <tr>
                        <td>Provinsi</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->provinsi->nama}}</th>
                      </tr>
                      <tr>
                        <td>Kabupaten / Kota</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->kabupaten->nama}}</th>
                      </tr>
                      <tr>
                        <td>Kecamatan</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->kecamatan->nama}}</th>
                      </tr>
                      <tr>
                        <td>Desa / Kelurahan</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->desa->nama}}</th>
                      </tr>
                    </table>
                    <hr class="m-0">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <tr>
                        <td>RT / RW</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->rtrw}}</th>
                      </tr>
                      <tr>
                        <td>Kode POS</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->desa->kodepos}}</th>
                      </tr>
                      <tr>
                        <td>Tanggal Dikeluarkan</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{date('d-m-Y',strtotime($data->tglterbit))}}</th>
                      </tr>
                      <tr>
                        <td>Nama Kepala Dinas</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->namakadis}}</th>
                      </tr>
                      <tr>
                        <td>NIP Kepala Dinas</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>{{$data->nipkadis}}</th>
                      </tr>
                      <tr>
                        <td>Dokumen KK</td>
                        <td class="px-0" style="width: 1px">:</td>
                        <th>
                          @if ($data->dokkk == null)
                              <div class="badge badge-light-danger">Belum Diunggah</div>
                          @else
                              <a href="{{asset($data->dokkk)}}" class="badge badge-light-info" target="_blank"><i data-feather="file-text"></i> Tampilkan</a>
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
        @endif
      </div>

      @if ($data != null)
        @if (count($data->anggota) == 0)
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center text-center text-lg-left">
                  <div class="col-sm-1 px-1 text-center">
                    <div class="avatar bg-light-danger p-50 p-lg-1 m-25">
                      <div class="avatar-content">
                        <i data-feather="info" class="font-medium-5"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <h4 class="font-weight-bolder mb-0">PERHATIAN</h4>
                    <p class="card-text">
                      Anda belum melengkapi anggota di <b>Kartu Keluarga</b>.<br>
                      Silakan tekan tombol <b>Tambah Anggota Keluarga</b> untuk mulai menambahkan.
                    </p>
                  </div>
                  <div class="col-sm-3 text-center text-lg-right">
                    <button class="btn btn-outline-danger btnaddanggota" type="button" data-toggle="modal" data-target="#modal-anggota" data-backdrop="static" data-keyboard="false"><i data-feather="user-plus" class="font-medium-3 mb-50"></i><br>Tambah Anggota Keluarga</button>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        @else
          <div class="col-12">
            <div class="text-center text-lg-left">
              <button class="btn btn-danger btnaddanggota mb-1" type="button" data-toggle="modal" data-target="#modal-anggota" data-backdrop="static" data-keyboard="false"><i data-feather="user-plus"></i> Tambah Anggota Keluarga</button>
            </div>
          </div>

          <?php $i = 1; ?>
          @foreach ($data->anggota as $a)
            <div class="col-12">
              <div class="card {{count($data->anggota) - $i > 0 ? 'mb-75' : ''}}">
                <div class="card-header">
                  <h5><button type="button" class="btn btn-icon btn-icon rounded-circle btn-outline-info waves-effect" disabled=""><i data-feather="user"></i></button> #{{$a->nourut}} {{$a->hubungan->nama}}</h5>
                  <div>
                    <button class="btn btn-sm btn-outline-info btneditanggota" type="button" value="{{$a->id}}" data-toggle="modal" data-target="#modal-anggota" data-backdrop="static" data-keyboard="false"><i data-feather="edit"></i> Ubah</button>
                    <form class="d-inline" action="{{route('siswa.kk.deleteanggota')}}" method="post" onsubmit="return confirm('Lanjutkan proses hapus {{$a->nama}} dari anggota keluarga?')">
                      <button type="submit" class="btn btn-sm btn-outline-danger" name="id" value="{{$a->id}}"><i data-feather="trash-2"></i> Hapus</button>
                      @csrf
                    </form>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <table class="table table-striped">
                        <tr>
                          <td style="width: 35%">Nama Lengkap</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->nama}}</th>
                        </tr>
                        <tr>
                          <td>NIK</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->nik}}</th>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->jk->nama}}</th>
                        </tr>
                        <tr>
                          <td>Tempat Lahir</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->tplahir}}</th>
                        </tr>
                        <tr>
                          <td>Tanggal Lahir</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{date('d-m-Y',strtotime($a->tglahir))}}</th>
                        </tr>
                        <tr>
                          <td>Agama</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->agama->nama}}</th>
                        </tr>
                        <tr>
                          <td>Pendidikan</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->pendidikan->nama}}</th>
                        </tr>
                        <tr>
                          <td>Jenis Pekerjaan</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->pekerjaan->nama}}</th>
                        </tr>
                      </table>
                      <hr class="m-0">
                    </div>
                    <div class="col-lg-6">
                      <table class="table table-striped">
                        @if ($data->goldarah != 2)
                          <tr>
                            <td style="width: 35%">Golongan Darah</td>
                            <td class="px-0" style="width: 1px">:</td>
                            <th>{{$a->goldarah->nama}}</th>
                          </tr>
                        @endif
                        <tr>
                          <td style="width: 35%">Status Perkawinan</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->statuskawin->nama}}</th>
                        </tr>
                        <tr>
                          <td>Tanggal Perkawinan</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->tglkawin == null ? '' : date('d-m-Y',strtotime($a->tglkawin))}}</th>
                        </tr>
                        <tr>
                          <td>Kewarganegaran</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->wn->nama}}</th>
                        </tr>
                        <tr>
                          <td>Nomor Paspor</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->nopaspor}}</th>
                        </tr>
                        <tr>
                          <td>Nomor KITAS/KITP</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->nokitas}}</th>
                        </tr>
                        <tr>
                          <td>Nama Ayah</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->namaayah}}</th>
                        </tr>
                        <tr>
                          <td>Nama Ibu</td>
                          <td class="px-0" style="width: 1px">:</td>
                          <th>{{$a->namaibu}}</th>
                        </tr>
                      </table>
                      <hr class="m-0">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $i ++; ?>
          @endforeach
        @endif        
      @endif
    </div>
  </div>
</div>
@endsection

@section('modal')
<div class="modal fade text-left" id="modal-kk" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-kk">Lengkapi Isian Kartu Keluarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample form-jenis" action="{{route('siswa.kk.store')}}" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nomor KK</b></label>
                <input type="number" name="nomor" id="nomor" class="form-control" value="{{$data == null ? '' : $data->nomor}}" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Alamat Keluarga</b></label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{$data == null ? '' : $data->alamat}}" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Provinsi</b></label>
                <select name="idprov" id="idprov" class="form-control select2" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Kabupaten/Kota</b></label>
                <select name="idkab" id="idkab" class="form-control select2" data-placeholder="Pilih Provinsi Terlebih Dulu" required>
                  
                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Kecamatan</b></label>
                <select name="idkec" id="idkec" class="form-control select2" data-placeholder="Pilih Kabupaten Terlebih Dulu" required>
                  
                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Desa / Kelurahan</b></label>
                <select name="iddesa" id="iddesa" class="form-control select2" data-placeholder="Pilih Kecamatan Terlebih Dulu">
                  
                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>RT/RW</b></label>
                <input type="number" name="rtrw" id="rtrw" class="form-control" value="{{$data == null ? '' : $data->rtrw}}">
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Tanggal Dikeluarkan KK</b></label>
                <input type="text" name="tglterbit" id="tglterbit" class="form-control flatpickr-basic" value="{{$data == null ? '' : $data->tglterbit}}" placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nama Kepala Dinas</b></label>
                <input type="text" name="namakadis" id="namakadis" class="form-control" value="{{$data == null ? '' : $data->namakadis}}" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>NIP Kepala Dinas</b></label>
                <input type="number" name="nipkadis" id="nipkadis" class="form-control" value="{{$data == null ? '' : $data->nipkadis}}" required>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Kartu Keluarga Anda berisi kolom Golongan Darah?</b></label>
                <div class="row mx-0 mt-50">
                  <div class="custom-control custom-control-danger custom-radio mr-2 mb-50">
                    <input type="radio" id="gd" name="goldarah" value="1" class="custom-control-input" @if($data != null) {{$data->goldarah == 1 ? 'checked' : ''}} @endif required>
                    <label class="custom-control-label" for="gd">Ya</label>
                  </div>
                  <div class="custom-control custom-control-danger custom-radio mb-50">
                    <input type="radio" id="gda" name="goldarah" value="2" class="custom-control-input" @if($data != null) {{$data->goldarah == 2 ? 'checked' : ''}} @endif>
                    <label class="custom-control-label" for="gda">Tidak</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-12">
              <div class="form-group">
                <label><b>Dokumen KK</b></label>
                <input type="file" class="dropify" name="kks" @if($data != null && $data->dokkk != null) data-default-file="{{asset($data->dokkk)}}" @endif data-allowed-file-extensions="pdf" data-max-file-size="1M">
                <label>* format file <b>.pdf</b>, ukuran maksimal 1MB</label>
              </div>
            </div>
 
          </div>
          @csrf
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i data-feather="save"></i> Simpan</button>
          <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade text-left" id="modal-anggota" tabindex="-1" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-anggota"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample form-anggota" action="#" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="idanggota">
          <div class="row">
            <div class="col-xl-2 mb-1">
              <div class="form-group">
                <label><b>Nomor Urut</b></label>
                <input type="text" name="nourut" id="nourut" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-10 mb-1">
              <div class="form-group">
                <label><b>Nama Lengkap</b></label>
                <input type="text" name="nama" id="nama" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>NIK</b></label>
                <input type="number" name="nik" id="nik" class="form-control" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Jenis Kelamin</b></label>
                <div class="row mx-0 mt-50">
                  <div class="custom-control custom-control-danger custom-radio mr-2 mb-50">
                    <input type="radio" id="jk" name="idjk" value="1" class="custom-control-input" required>
                    <label class="custom-control-label" for="jk">Laki-Laki</label>
                  </div>
                  <div class="custom-control custom-control-danger custom-radio mb-50">
                    <input type="radio" id="jka" name="idjk" value="2" class="custom-control-input">
                    <label class="custom-control-label" for="jka">Perempuan</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Tempat Lahir</b></label>
                <input type="text" class="form-control" name="tplahir" id="tplahir" required>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Tanggal Lahir</b></label>
                <input type="text" name="tglahir" id="tglahir" class="form-control flatpickr-basic" placeholder="Pilih" style="background-color: white" required>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Agama</b></label>
                <select class="form-control select2" name="idagama" id="idagama" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Pendidikan</b></label>
                <select class="form-control select2" name="idpendidikan" id="idpendidikan" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Jenis Pekerjaan</b></label>
                <select class="form-control select2" name="idpekerjaan" id="idpekerjaan" data-placeholder="Pilih">

                </select>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Golongan Darah</b></label>
                <select class="form-control select2" name="idgoldarah" id="idgoldarah" data-placeholder="Pilih" @if($data != null) {{$data->goldarah == 2 ? 'disabled' : ''}} @endif>

                </select>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Status Perkawinan</b></label>
                <select class="form-control select2" name="idstatuskawin" id="idstatuskawin" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-4 mb-1 kawin">
              <div class="form-group">
                <label><b>Tanggal Perkawinan</b></label>
                <input type="text" name="tglkawin" id="tglkawin" class="form-control flatpickr-basic" placeholder="Pilih" style="background-color: white">
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Status Hubungan Dalam Keluarga</b></label>
                <select class="form-control select2" name="idhubungan" id="idhubungan" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Kewarganegaraan</b></label>
                <select class="form-control select2" name="idwn" id="idwn" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Nomor Paspor</b></label>
                <input type="text" class="form-control" name="nopaspor" id="nopaspor">
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Nomor KITAS/KITP</b></label>
                <input type="text" class="form-control" name="nokitas" id="nokitas">
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nama Ayah</b></label>
                <input type="text" class="form-control" name="namaayah" id="namaayah" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nama Ibu</b></label>
                <input type="text" class="form-control" name="namaibu" id="namaibu" required>
              </div>
            </div>
 
          </div>
          @csrf
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i data-feather="save"></i> Simpan</button>
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
  $("#idprov").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.provinsi")!!}',
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

  $('#idprov').on('change', function(){
    idprovinsi = $(this).val()
    $("#idkab").append($("<option selected='selected'></option>").val('').text('')).trigger('change');
    $("#idkec").append($("<option selected='selected'></option>").val('').text('')).trigger('change');
    $("#iddesa").append($("<option selected='selected'></option>").val('').text('')).trigger('change');
    $("#idkab").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.kabupaten")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idprov:idprovinsi
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

  $('#idkab').on('change', function(){
    idkabupaten = $(this).val()
    $("#idkec").append($("<option selected='selected'></option>").val('').text('')).trigger('change');
    $("#iddesa").append($("<option selected='selected'></option>").val('').text('')).trigger('change');
    $("#idkec").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.kecamatan")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idkab:idkabupaten
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

  $('#idkec').on('change', function(){
    idkecamatan = $(this).val()
    $("#iddesa").append($("<option selected='selected'></option>").val('').text('')).trigger('change');
    $("#iddesa").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.desa")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idkec:idkecamatan
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

  $("#idagama").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.agama")!!}',
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

  $("#idpendidikan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.jenjangpendidikan")!!}',
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

  $("#idpekerjaan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.pekerjaan")!!}',
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

  $("#idgoldarah").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.goldarah")!!}',
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

  $("#idstatuskawin").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.statuskawin")!!}',
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

  $("#idhubungan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.hubungankk")!!}',
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

  $("#idwn").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.wn")!!}',
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

  $("#idprov").append($("<option selected='selected'></option>").val('{{$data == null ? "" : $data->idprov}}').text('{{$data == null ? "" : $data->provinsi->nama}}')).trigger('change');

  $("#idkab").append($("<option selected='selected'></option>").val('{{$data == null ? "" : $data->idkab}}').text('{{$data == null ? "" : $data->kabupaten->nama}}')).trigger('change');

  $("#idkec").append($("<option selected='selected'></option>").val('{{$data == null ? "" : $data->idkec}}').text('{{$data == null ? "" : $data->kecamatan->nama}}')).trigger('change');

  $("#iddesa").append($("<option selected='selected'></option>").val('{{$data == null ? "" : $data->iddesa}}').text('{{$data == null ? "" : $data->desa->nama}}')).trigger('change');

  $('.btnaddanggota').on('click', function(){
      $("#modal-title-anggota").text('Tambah Anggota Keluarga')
      $('.form-anggota').attr('action', "{{route('siswa.kk.storeanggota')}}")
      $('#idanggota').val('')
      $('#nourut').val('')
      $('#nama').val('')
      $('#nik').val('')
      $('#jk').prop('checked', false)
      $('#jka').prop('checked', false)
      $('#tplahir').val('')
      $('#tglahir').val('')
      $('#idagama').val('').trigger('change')
      $('#idpendidikan').val('').trigger('change')
      $('#idpekerjaan').val('').trigger('change')
      $('#idgoldarah').val('').trigger('change')
      $('#idstatuskawin').val('').trigger('change')
      $('#idhubungan').val('').trigger('change')
      $('#idwn').val('').trigger('change')
      $('#tglkawin').val('')
      $('#nopaspor').val('')
      $('#nokitas').val('')
      $('#namaayah').val('')
      $('#namaibu').val('')
  })

  $('.btneditanggota').on('click', function() {
      $('#modal-title-anggota').text('Ubah Anggota Keluarga')
      $('.form-anggota').attr('action', '{{route("siswa.kk.updateanggota")}}');
      var tr = $(this).closest('tr');
      $.get('/siswa/kartukeluarga/getanggota/'+$(this).val(), function(data){
          $('#idanggota').val(data.id)
          $('#nourut').val(data.nourut)
          $('#nama').val(data.nama)
          $('#nik').val(data.nik)
          if (data.idjk == 1) {
            $('#jk').prop('checked', true)
            $('#jka').prop('checked', false)
          }else {
            $('#jk').prop('checked', false)
            $('#jka').prop('checked', true)
          }
          $('#tplahir').val(data.tplahir)
          $('#tglahir').val(data.tglahir)
          $("#idagama").append($("<option selected='selected'></option>").val(data.idagama).text(data.agama.nama))
          $("#idpendidikan").append($("<option selected='selected'></option>").val(data.idpendidikan).text(data.pendidikan.nama))
          $('#idpekerjaan').append($("<option selected='selected'></option>").val(data.idpekerjaan).text(data.pekerjaan.nama))
          $('#idgoldarah').append($("<option selected='selected'></option>").val(data.idgoldarah).text(data.goldarah.nama))
          $('#idstatuskawin').append($("<option selected='selected'></option>").val(data.idstatuskawin).text(data.statuskawin.nama))
          $('#idhubungan').append($("<option selected='selected'></option>").val(data.idhubungan).text(data.hubungan.nama))
          $('#idwn').append($("<option selected='selected'></option>").val(data.idwn).text(data.wn.nama))
          $('#tglkawin').val(data.tglkawin)
          $('#nopaspor').val(data.nopaspor)
          $('#nokitas').val(data.nokitas)
          $('#namaayah').val(data.namaayah)
          $('#namaibu').val(data.namaibu)
      })
  });
});
</script>
@stop
