@extends('layouts.menu')

@section('title-head', 'Detail Pegawai')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Detail Pegawai
          </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('md.pegawai')}}">Master Data Pegawai</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row">
      <div class="col-12">
        @if($data->finger == 0)
          {{-- <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading text-center text-lg-left"><i data-feather="alert-circle" ></i> PERHATIAN</h4>
            <div class="alert-body">
              <div class="row">
                <div class="col-lg-9">
                  {{$data->nama}} belum memiliki <b>Data Sidik Jari</b> sehingga tidak dapat melakukan pengisian presensi dengan mesin sidik jari. Silakan lengkapi data sidik jari dengan menekan tombol <b>Daftarkan Sidik Jari</b>.
                </div>
                <div class="col-lg-3 text-center text-lg-right">
                  <button type="button" class="btn btn-sm btn-warning mt-50" id="btnfinger" name="button"  data-toggle="modal" data-target="#modal-sidikjari" data-backdrop="static" data-keyboard="false"><img src="{{asset('assets/images/finger-plus-white.png')}}" height="14px" style="margin-top: -2px"> Daftarkan Sidik Jari</button>
                </div>
              </div>
            </div>
          </div> --}}
        @endif
        <div class="row match-height">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body text-center">
                <img src="{{$data->detil->photo == null ? asset('assets/images/user-default.png') : asset($data->detil->photo)}}" class="rounded" width="100%" alt="Foto Pegawai">                
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive-lg">
                  <table class="table table-striped">
                    <tr>
                      <td colspan="2"><h2 class="mb-0">{{$data->nama}}</h2></td>
                    </tr>
                    <tr>
                      <td style="width:30%">Panggilan</td>
                      <th>{{$data->panggilan}}</th>
                    </tr>
                    <tr>
                      <td>Tempat, Tanggal Lahir</td>
                      <th>{{$data->tplahir}}, {{ (new \App\Helper)->tanggal($data->tglahir) }}</th>
                    </tr>
                    <tr>
                      <td>Usia</td>
                      <th>{{ (new \App\Helper)->durasi($data->tglahir) }}</th>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <th>{{$data->jk->nama}}</th>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <th>{{$data->agama->nama}}</th>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <th>{{$data->nohp}}</th>
                    </tr>
                    <tr>
                      <td>Status Kerja
                      <th>
                        @if ($data->idstatus != null)
                          <div class="badge badge-light-{{$data->idstatus == 1 ? 'success' : 'primary'}}">{{$data->status->nama}}</div>
                        @else
                          <div class="badge badge-light-danger">Belum Ditentukan</div>
                        @endif
                      </th>
                    </tr>
                  </table>
                  <hr class="m-0">
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link {{Session::get('tabactive') == 'biodata' ? 'active' : ''}} {{Session::get('tabactive') == null ? 'active' : ''}}" id="dd-tab" data-toggle="pill" href="#dd" aria-expanded="true">Biodata</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{Session::get('tabactive') == 'kepeg' ? 'active' : ''}}" id="kepegawaian-tab" data-toggle="pill" href="#kepegawaian" aria-expanded="true">Data Kepegawaian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{Session::get('tabactive') == 'pendidikan' ? 'active' : ''}}" id="pendidikan-tab" data-toggle="pill" href="#pendidikan" aria-expanded="true">Riwayat Pendidikan</a>
              </li>
              <li class="col-lg col-sm-12 px-0 text-lg-right text-center">
                @if(empty($data->user))
                  <button class="btn btn-danger mt-25" type="button" data-toggle="modal" data-target="#modal-user" data-backdrop="static" data-keyboard="false"><i data-feather="user-plus"></i> Buat User</button>
                @else
                  <form class="" action="{{route('md.user.delete')}}" method="post" onsubmit="return confirm('Lanjutkan proses hapus user {{$data->nama}}?')">
                    <input type="hidden" name="id" value="{{$data->user->id}}">
                    <button type="submit" class="btn btn-warning mt-25" name="button"><i data-feather="user-minus"></i> Hapus User</button>
                    {{ csrf_field() }}
                  </form>
                @endif
              </li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane {{Session::get('tabactive') == 'biodata' ? 'active' : ''}} {{Session::get('tabactive') == null ? 'active' : ''}}" id="dd" aria-labelledby="dd-tab" aria-expanded="true">
                <div class="card">
                  <div class="card-body">
                    <a href="{{route('md.pegawai.edit',$data->id)}}" class="btn btn-sm btn-outline-danger mb-2"><i data-feather="edit"></i> Ubah Biodata</a>
                    <div class="table-responsive-lg">
                      <table class="table table-striped">
                        <tr>
                          <td style="width:30%">Alamat</td>
                          <td><b>{{$data->alamat}}</b></td>
                        </tr>
                        <tr>
                          <td>Wilayah Alamat</td>
                          <td><b>{{$data->idkec == null ? '' : 'Kecamatan '.$data->kecamatan->nama.', '.$data->kecamatan->kabupaten->nama.', '.$data->kecamatan->kabupaten->provinsi->nama}}</b></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><b>{{$data->email}}</b></td>
                        </tr>
                        <tr>
                          <td>NIK</td>
                          <td><b>{{$data->detil->nik}}</b></td>
                        </tr>
                        <tr>
                          <td>NPWP</td>
                          <td><b>{{$data->detil->npwp}}</b></td>
                        </tr>
                        <tr>
                          <td>Status Perkawinan</td>
                          <td><b>{{$data->detil->statuskawin->nama}}</b></td>
                        </tr>
                        @if($data->detil->dokktp != null || $data->detil->dokkkk != null || $data->detil->doknpwp != null)
                          <tr>
                            <td>Dokumen</td>
                            <td>
                              @if($data->detil->dokktp != null)
                                <a href="{{asset($data->detil->dokktp)}}" class="btn btn-sm btn-outline-primary" target="_blank"><i data-feather="file-text"></i> KTP</a>
                              @endif
                              @if($data->detil->dokkk != null)
                                <a href="{{asset($data->detil->dokkk)}}" class="btn btn-sm btn-outline-info" target="_blank"><i data-feather="file-text"></i> KK</a>
                              @endif
                              @if($data->detil->doknpwp != null)
                                <a href="{{asset($data->detil->doknpwp)}}" class="btn btn-sm btn-outline-warning" target="_blank"><i data-feather="file-text"></i> NPWP</a>
                              @endif
                            </td>
                          </tr>
                        @endif
                      </table>
                      <hr class="m-0">
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane {{Session::get('tabactive') == 'kepeg' ? 'active' : ''}}" id="kepegawaian" aria-labelledby="kepegawaian-tab" aria-expanded="true">
                <div class="card">
                  <div class="card-body">
                    <button type="button" class="btn btn-sm btn-outline-danger mb-2" name="button" data-toggle="modal" data-target="#modal-kepegawaian" data-backdrop="static" data-keyboard="false"><i data-feather="edit"></i> Ubah Data Kepegawaian</button>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td style="width:30%">Jenis Kepegawaian</td>
                          <th>{{$data->idjenis == null ? '' : $data->jenis->nama}}</th>
                        </tr>
                        <tr>
                          <td>Posisi / Jabatan</td>
                          <th>{{$data->idjabatan == null ? '' : $data->jabatan->nama}}</th>
                        </tr>
                        <tr>
                          <td>Nomor Induk Karyawan</td>
                          <th>{{$data->nip}}</th>
                        </tr>
                        <tr>
                          <td>Tanggal Mulai Bekerja</td>
                          <th>{{$data->detil->tmtpengangkatan == null ? '' : (new \App\Helper)->tanggal($data->detil->tmtpengangkatan)}}</th>
                        </tr>
                        <tr>
                          <td>Masa Kerja</td>
                          <th>{{$data->detil->tmtpengangkatan == null ? '' : (new \App\Helper)->durasi($data->detil->tmtpengangkatan)}}</th>
                        </tr>
                        <tr>
                          <td>Nomor SK Pengangkatan</td>
                          <th>{{$data->detil->skpengangkatan}}</th>
                        </tr>
                        <tr>
                          <td>Nomor BPJS Ketenagakerjaan</td>
                          <th>{{$data->detil->nobpjs}}</th>
                        </tr>
                        <tr>
                          <td>Nomor BPJS Kesehatan</td>
                          <th>{{$data->detil->nobpjskesehatan}}</th>
                        </tr>
                        <tr>
                          <td>Dokumen SK Pengangkatan</td>
                          <th>
                            @if($data->detil->doksk != null)
                              <a href="{{asset($data->detil->doksk)}}" class="btn btn-sm btn-outline-info" target="_blank"><i data-feather="file-text"></i> Tampilkan</a>
                            @else
                              <div class="badge badge-light-danger">Belum Diunggah</div>
                            @endif
                          </th>
                        </tr>
                      </table>
                      <hr class="m-0">
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane {{Session::get('tabactive') == 'pendidikan' ? 'active' : ''}}" id="pendidikan" aria-labelledby="pendidikan-tab" aria-expanded="true">
                <div class="card">
                  <div class="card-body">
                    <button type="button" id="btnaddpendidikan" class="btn btn-sm btn-outline-danger mb-1" name="button" data-toggle="modal" data-target="#modal-pendidikan" data-backdrop="static" data-keyboard="false"><i data-feather="plus"></i> Tambah Data Pendidikan</button>
                    @if (count($data->riwayatpendidikan) == 0)
                      <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"><i data-feather="alert-circle" style="margin-top: -2px"></i> PERHATIAN</h4>
                        <div class="alert-body">
                          Data riwayat pendidikan tidak ditemukan. Silakan tekan tombol <b>Tambah Data Pendidikan</b> untuk mulai menambahkan.
                        </div>
                      </div>
                    @else                      
                      <ul class="timeline mt-1">
                        <?php $no = 0; ?>
                        @foreach($riwayatpendidikan as $rp)
                          <?php
                            $back ='secondary';
                            $del = 'secondary';
                            if ($no == 0) {
                              $back = 'success';
                              $del = 'danger';
                            }
                            $no++;
                          ?>
                          <li class="timeline-item">
                            <span class="timeline-point timeline-point-{{$back}} timeline-point-indicator"></span>
                            <div class="timeline-event">
                              <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                <h5 class="mb-50">{{$rp->jenjang->nama}}</h5>
                                <span class="timeline-event-time">Terakhir Diubah {{ (new \App\Helper)->tanggal($rp->updated_at) }}</span>
                              </div>
                              <hr class="my-25">
                              <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <p class="mb-25">
                                      {{$rp->namasekolah}}
                                      @if ($rp->idjenjang > 5)
                                        <i data-feather="chevrons-right" class="text-muted"></i> {{$rp->prodi}}    
                                      @endif
                                    </p>
                                    <p class="text-muted mb-25">Tahun Masuk: {{$rp->thnmasuk}}</p>
                                    <p class="text-muted mb-25">Tanggal Lulus: {{ (new \App\Helper)->tanggal($rp->tgllulus) }}</p>
                                    @if($rp->dokijazah != null)
                                      <a href="{{asset($rp->dokijazah)}}" class="btn btn-sm btn-outline-primary"><i data-feather="file-text"></i> Dokumen Ijazah</a>
                                    @else
                                      <div class="badge badge-light-danger">Ijazah Belum Diunggah</div>
                                    @endif
                                  </div>
                                </div>
                                <div class="mt-sm-0 mt-50">
                                  <button class="btn btn-sm btn-outline-{{$back}} btneditpendidikan" name="button" value="{{$rp->id}}" data-toggle="modal" data-target="#modal-pendidikan" data-backdrop="static" data-keyboard="false"><i data-feather="edit" style="margin-top: -3px"></i> Ubah</button>
                                  <form class="d-inline" action="{{route('md.pegawai.deletependidikan')}}" method="post" onsubmit="return confirm('Lanjutkan proses hapus data pendidikan {{$rp->jenjang->nama}} dari {{$data->nama}}?')">
                                    <button type="submit" class="btn btn-sm btn-outline-{{$del}}" name="id" value="{{$rp->id}}"><i data-feather="trash-2"></i> Hapus</button>
                                    @csrf
                                  </form>
                                </div>
                              </div>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')
  <div class="modal fade" id="modal-kepegawaian" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaltitle">Ubah Data Kepegawaian | {{$data->nama}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="forms-sample" action="{{route('md.pegawai.updatekepegawaian')}}" method="post" enctype="multipart/form-data" id="jquery-val-form">
            <input type="hidden" name="idpegawai" value="{{$data->id}}">
            <div class="row">
              <div class="col-xl-6 mb-1">
                <div class="form-group">
                  <label><b>Jenis Kepegawaian</b></label>
                  <select class="form-control select2" name="idjenis" id="idjenis" data-placeholder="Pilih" required>
                    <option value="{{$data->idjenis}}" selected>{{$data->jenis->nama}}</option>
                  </select>
                </div>
              </div>

              <div class="col-xl-6 mb-1">
                <div class="form-group">
                  <label><b>Posisi / Jabatan</b></label>
                  <select class="form-control select2" name="idjabatan" id="idjabatan" data-placeholder="Pilih" required>
                    <option value="{{$data->idjabatan}}" selected>{{$data->idjabatan == null ? '' : $data->jabatan->nama}}</option>
                  </select>
                </div>
              </div>

              <div class="col-xl-6 mb-1">
                <div class="form-group">
                  <label><b>Nomor Induk Karyawan</b></label>
                  <input type="text" name="nip" id="nip" class="form-control" value="{{$data->nip}}">
                </div>
              </div>

              <div class="col-xl-6 mb-1">
                <div class="form-group">
                  <label><b>Status Kerja</b></label>
                  <select class="form-control select2" name="idstatus" id="idstatus" data-placeholder="Pilih" required>
                    <option value="{{$data->idstatus}}" selected>{{$data->idstatus == null ? '' : $data->status->nama}}</option>
                  </select>
                </div>
              </div>

              <div class="col-xl-6 mb-1">
                <div class="form-group">
                  <label><b>Nomor SK Pengangkatan</b></label>
                  <input type="text" name="skpengangkatan" id="skpengangkatan" class="form-control" value="{{$data->detil->skpengangkatan}}">
                </div>
              </div>

              <div class="col-xl-6 mb-1">
                <div class="form-group">
                  <label><b>Tanggal Mulai Bekerja</b></label>
                  <input type="text" name="tmtpengangkatan" class="form-control flatpickr-basic" value="{{$data->detil->tmtpengangkatan}}" autocomplete="off" placeholder="Pilih" style="background-color: white">
                </div>
              </div>

              <div class="col-xl-6 mb-1">
                <div class="form-group">
                  <label><b>Nomor BPJS Ketenagakerjaan</b></label>
                  <input type="text" name="nobpjs" id="nobpjs" class="form-control" value="{{$data->detil->nobpjs}}">
                </div>
              </div>

              <div class="col-xl-6 mb-1">
                <div class="form-group">
                  <label><b>Nomor BPJS Kesehatan</b></label>
                  <input type="text" name="nobpjskesehatan" id="nobpjskesehatan" class="form-control" value="{{$data->detil->nobpjskesehatan}}">
                </div>
              </div>

              <div class="col-xl-12 mb-1">
                <div class="form-group">
                  <label><b>Dokumen SK Pengangkatan</b></label>
                  <input type="file" class="dropify" name="sks" @if ($data->detil->doksk != null) data-default-file="{{asset($data->detil->doksk)}}"
                  @endif data-allowed-file-extensions="pdf" data-max-file-size="2M">
                  <label><small>*format file <b>.pdf</b>, ukuran maksimal 2MB</small></label>
                </div>
              </div>

            </div>

            {{ csrf_field() }}

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i data-feather="save"></i> Simpan</button>
          <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Batal</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-pendidikan" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title-pendidikan"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="forms-sample form-pendidikan" action="#" enctype="multipart/form-data" method="post">
            <input type="hidden" name="idpegawai" value="{{$data->id}}">
            <input type="hidden" name="id" id="idpendidikan">
  
            <div class="row">
              <div class="col-xl-12 mb-1">
                <div class="form-group">
                  <label><b>Jenjang Pendidikan</b></label>
                  <select class="form-control show-tick ms select2" name="idjenjang" id="idjenjang" data-placeholder="Pilih" required>
  
                  </select>
                </div>
              </div>
  
              <div class="col-xl-12 mb-1">
                <div class="form-group">
                  <label><b>Nama <span id="namajenjang">Sekolah</span></b></label>
                  <input type="text" class="form-control" name="namasekolah" id="namasekolah" required>
                </div>
              </div>
  
              <div class="col-xl-12 mb-1 prodi">
                <div class="form-group">
                  <label><b>Nama Program Studi</b></label>
                  <input type="text" class="form-control" name="prodi" id="prodi">
                </div>
              </div>
  
              <div class="col-xl-12 mb-1">
                <div class="form-group">
                  <label><b>Tahun Masuk</b></label>
                  <input type="number" class="form-control tahun" name="thnmasuk" id="thnmasuk" required>
                </div>
              </div>
  
              <div class="col-xl-12 mb-1">
                <div class="form-group">
                  <label><b>Tanggal Lulus</b></label>
                  <input type="text" name="tgllulus" id="tgllulus" class="form-control flatpickr-basic"  placeholder="Pilih" style="background-color: white" required>
                </div>
              </div>
  
              <div class="col-xl-12">
                <div class="form-group">
                  <label><b>Dokumen Ijazah</b></label>
                  <input type="file" class="dropify" name="ijazahs" data-allowed-file-extensions="jpg jpeg png pdf" data-max-file-size="1M">
                  <label>* format file <b>.jpg .jpeg</b> atau <b>.pdf</b>, ukuran maksimal 1MB</label>
                </div>
              </div>
            </div>
  
            {{ csrf_field() }}
  
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-success"><i data-feather="save"></i> Simpan</button>
          <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Batal</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-user" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modaltitle">Buat User | {{$data->nama}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="forms-sample" action="{{route('md.user.store')}}" method="post" enctype="multipart/form-data" id="formdosen">
          <div class="modal-body">
            @if($data->email == null || $data->email == '')
              <div class="alert alert-danger mb-0" role="alert">
                <div class="alert-body">
                  Tidak dapat menambahkan user baru untuk {{$data->nama}} karena <b>alamat email belum dilengkapi</b>. Silakan melengkapi alamat detail pada tab Biodata.
                </div>
              </div>
            @else
              <input type="hidden" name="link" value="{{$data->id}}">
              <input type="hidden" name="role" value="1">
              <div class="row">
                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>Username</b></label>
                    <input type="text" name="username" class="form-control" readonly value="{{$data->email}}">
                  </div>
                </div>
                <div class="col-xl-12 mb-1">
                  <div class="form-group">
                    <label><b>Password</b></label>
                    <input type="text" name="password" class="form-control" required>
                  </div>
                </div>
              </div>
            @endif
            {{ csrf_field() }}
          </div>
          <div class="modal-footer">
            @if($data->email != null)
              <button type="submit" class="btn btn-sm btn-success"><i data-feather="save"></i> Simpan</button>
            @endif
            <button class="btn btn-sm btn-outline-dark" data-dismiss="modal">Kembali</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('page-js')
<script>
$(document).ready(function() {
  $("#idjabatan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.jabatan")!!}',
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

  $("#idjenis").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.jenispegawai")!!}',
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

  $("#idstatus").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.statuskerja")!!}',
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

  $("#idjenjang").select2({
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

  $('#idjenjang').on('change', function(){
    if ($(this).val() > 5) {
      $('#namajenjang').text('Kampus')
      $('.prodi').show()
    }else {
      $('#namajenjang').text('Sekolah')
      $('.prodi').hide()
    }
  });

  $('#btnaddpendidikan').on('click', function(){
    $('#idpendidikan').val('')
    $('#modal-title-pendidikan').text('Tambah Data Pendidikan')
    $('.form-pendidikan').attr('action', '{{route("md.pegawai.storependidikan")}}');
    $('#namajenjang').text('Sekolah')
    $('#namasekolah').val('')
    $('#prodi').val('')
    $('#thnmasuk').val('')
    $('#tgllulus').val('')
    $("#idjenjang").val('').trigger('change');
  });

  $('.btneditpendidikan').on('click', function(){
    $('#idpendidikan').val($(this).val())
    $('#modal-title-pendidikan').text('Ubah Data Pendidikan')
    $('.form-pendidikan').attr('action', '{{route("md.pegawai.updatependidikan")}}');
    $.get('/masterdata/pegawai/getpendidikan/'+$(this).val(), function(data){
        if (data.jenjang > 5) {
          $('#namajenjang').text('Kampus')
          $('.prodi').show()
        }
        $('#namasekolah').val(data.namasekolah)
        $('#prodi').val(data.prodi)
        $('#thnmasuk').val(data.thnmasuk)
        $('#tgllulus').val(data.tgllulus)
        $("#idjenjang").append($("<option selected='selected'></option>").val(data.idjenjang).text(data.jenjang.nama)).trigger('change');
    })
  });

});
</script>
@stop
