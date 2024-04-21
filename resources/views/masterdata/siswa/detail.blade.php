@extends('layouts.menu')

@section('title-head', 'Detail Siswa')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Detail Siswa
          </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('md.siswa')}}">Master Data Siswa</a></li>
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
        <div class="row match-height">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body text-center">
                <img src="{{$data->photo == null ? asset('assets/images/user-default.png') : asset($data->photo)}}" class="rounded" width="100%" alt="Foto Siswa">                
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped mb-0">
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
                      <th>{{$data->idjk == null ? '' : $data->jk->nama}}</th>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <th>{{$data->idagama == null ? '' : $data->agama->nama}}</th>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <th>{{$data->alamat}}</th>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <th>{{$data->nohp}}</th>
                    </tr> 
                  </table>
                  <hr class="m-0">
                </div>
              </div>
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
            <a class="nav-link {{Session::get('tabactive') == 'keluarga' ? 'active' : ''}}" id="keluarga-tab" data-toggle="pill" href="#keluarga" aria-expanded="true">Keluarga</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Session::get('tabactive') == 'pendidikan' ? 'active' : ''}}" id="riwayatak-tab" data-toggle="pill" href="#riwayatak" aria-expanded="true">Riwayat Pendidikan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Session::get('tabactive') == 'pekerjaan' ? 'active' : ''}}" id="riwayatkerja-tab" data-toggle="pill" href="#riwayatkerja" aria-expanded="true">Riwayat Pekerjaan</a>
          </li>
          <li class="col-lg col-sm-12 px-0 text-lg-right text-center">
            <form class="d-inline" action="{{route('md.siswa.cetakcv')}}" method="post" target="_blank">
              <button type="submit" class="btn btn-danger mt-25 mb-0" name="id" value="{{$data->id}}"><i data-feather="printer"></i> Cetak CV</button>
              {{ csrf_field() }}
            </form>
            @if(empty($data->user))
              <button class="btn btn-primary mt-25" type="button" data-toggle="modal" data-target="#modal-user" data-backdrop="static" data-keyboard="false"><i data-feather="user-plus"></i> Buat User</button>
            @else
              <form class="d-inline" action="{{route('md.user.delete')}}" method="post" onsubmit="return confirm('Lanjutkan proses hapus user {{$data->nama}}?')">
                <input type="hidden" name="id" value="{{$data->user->id}}">
                <button type="submit" class="btn btn-warning mt-25 mb-0" name="button"><i data-feather="user-minus"></i> Hapus User</button>
                {{ csrf_field() }}
              </form>
            @endif
          </li>
        </ul>
        <div class="card">
          <div class="card-body">
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane {{Session::get('tabactive') == 'biodata' ? 'active' : ''}} {{Session::get('tabactive') == null ? 'active' : ''}}" id="dd" aria-labelledby="dd-tab" aria-expanded="true">
                <button type="button" class="btn btn-sm btn-outline-danger mb-1" name="button"  data-toggle="modal" data-target="#modal-biodata" data-backdrop="static" data-keyboard="false"><i data-feather="edit"></i> Ubah Biodata</button>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                      <td style="width:30%">Email</td>
                      <th>{{$data->email}}</th>
                    </tr>
                    <tr>
                      <td>NIK</td>
                      <th>{{$data->nik}}</th>
                    </tr>
                    <tr>
                      <td>Nomor Paspor</td>
                      <th>{{$data->detil->paspor}}</th>
                    </tr>
                    <tr>
                      <td>Wilayah Alamat</td>
                      <th>{{$data->idkab == null ? '' : $data->kabupaten->nama.','}} {{$data->idprov == null ? '' : 'Provinsi '.$data->provinsi->nama}}</th>
                    </tr>
                    <tr>
                      <td>Tinggi Badan</td>
                      <th>{{$data->detil->tinggi == null ? '' : $data->detil->tinggi.' Cm'}}</th>
                    </tr>
                    <tr>
                      <td>Berat Badan</td>
                      <th>{{$data->detil->berat == null ? '' : $data->detil->berat.' Kg'}}</th>
                    </tr>
                    <tr>
                      <td>Tangan Dominan</td>
                      <th>{{$data->detil->idtangan == null ? '' : $data->detil->tangan->nama}}</th>
                    </tr>
                    <tr>
                      <td>Golongan Darah</td>
                      <th>{{$data->detil->idgoldarah == null ? '' : $data->detil->goldarah->nama}}</th>
                    </tr>
                    <tr>
                      <td>Alergi</td>
                      <th>
                        @if ($data->detil->alergi == 0)
                          Tidak Ada
                        @elseif ($data->detil->alergi == 1)
                          Ada
                        @endif
                      </th>
                    </tr>
                    <tr>
                      <td>Merokok</td>
                      <th>
                        @if ($data->detil->merokok == 0)
                          Tidak
                        @elseif ($data->detil->merokok == 1)
                          Ya
                        @endif
                      </th>
                    </tr>
                    <tr>
                      <td>Peminum Alkohol</td>
                      <th>
                        @if ($data->detil->alkohol == 0)
                          Tidak
                        @elseif ($data->detil->alkohol == 1)
                          Ya
                        @endif
                      </th>
                    </tr>
                    <tr>
                      <td>Tatto</td>
                      <th>
                        @if ($data->detil->tatto == 0)
                          Tidak Ada
                        @elseif ($data->detil->tatto == 1)
                          Ada
                        @endif
                      </th>
                    </tr>
                    <tr>
                      <td>Status Perkawinan</td>
                      <th>{{$data->detil->idstatuskawin == null ? '' : $data->detil->statuskawin->nama}}</th>
                    </tr>
                    <tr>
                      <td>Jumlah Anak</td>
                      <th>{{$data->detil->jmlanak}}</th>
                    </tr>
                    <tr>
                      <td>Hobi</td>
                      <th>{{$data->detil->idhobi == null ? '' : $data->detil->hobi->nama}}</th>
                    </tr>
                    <tr>
                      <td>SIM</td>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Keunggulan Diri</td>
                      <th>{{$data->detil->idkeunggulan == null ? '' : $data->detil->keunggulan->nama}}</th>
                    </tr>
                    <tr>
                      <td>Kekurangan Diri</td>
                      <th>{{$data->detil->idkekurangan == null ? '' : $data->detil->kekurangan->nama}}</th>
                    </tr>
                  </table>
                  <hr class="m-0">
                </div>
              </div>
              <div role="tabpanel" class="tab-pane {{Session::get('tabactive') == 'keluarga' ? 'active' : ''}}" id="keluarga" aria-labelledby="keluarga-tab" aria-expanded="true">
                <button type="button" id="btnaddkeluarga" class="btn btn-sm btn-outline-danger mb-1" name="button"  data-toggle="modal" data-target="#modal-keluarga" data-backdrop="static" data-keyboard="false"><i data-feather="plus"></i> Tambah Data Keluarga</button>
                @if ($data->keluargajepang == null)
                  <button type="button" id="btnaddkeluargajepang" class="btn btn-sm btn-outline-danger mb-1" name="button"  data-toggle="modal" data-target="#modal-keluargajepang" data-backdrop="static" data-keyboard="false"><i data-feather="plus"></i> Tambah Keluarga di Jepang</button>
                @endif
                <div class="table-responsive">
                  @if (count($data->keluarga) == 0)
                    <div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading"><i data-feather="alert-circle" style="margin-top: -2px"></i> PERHATIAN</h4>
                      <div class="alert-body">
                        Data keluarga tidak ditemukan. Silakan tekan tombol <b>Tambah Data Keluarga</b> untuk mulai menambahkan.
                      </div>
                    </div>
                  @endif
                  @if ($data->keluargajepang == null)
                    <div class="alert alert-danger" role="alert">
                      <h4 class="alert-heading"><i data-feather="alert-circle" style="margin-top: -2px"></i> PERHATIAN</h4>
                      <div class="alert-body">
                        Data keluarga di Jepang tidak ditemukan. Silakan tekan tombol <b>Tambah Keluarga di Jepang</b> untuk mulai menambahkan.
                      </div>
                    </div>
                  @endif
                  @for ($i = 1; $i < 9; $i++)
                    <?php
                      $k = $data->keluarga->where('idhubungan',$i)->first();
                    ?>
                    @if ($k != null)
                      <table class="table table-striped mb-0">
                        <tr>
                          <td style="width: 30%">Nama {{$k->hubungan->nama}}</td>
                          <th>{{$k->nama}}</th>
                        </tr>
                        <tr>
                          <td>Alamat {{$k->hubungan->nama}}</td>
                          <th>{{$k->alamat}}</th>
                        </tr>
                        <tr>
                          <td>Pekerjaan {{$k->hubungan->nama}}</td>
                          <th>{{$k->pekerjaan->nama}}</th>
                        </tr>
                        <tr>
                          <td>Telepon {{$k->hubungan->nama}}</td>
                          <th>{{$k->nohp}}</th>
                        </tr>
                        <tr>
                          <td></td>
                          <td>
                            <button type="button" class="btn btn-sm btn-outline-warning btneditkeluarga" name="button" value="{{$k->id}}" data-toggle="modal" data-target="#modal-keluarga" data-backdrop="static" data-keyboard="false" title="Ubah Data {{$k->hubungan->nama}}"><i data-feather="edit"></i> Ubah</button>
                            <form class="d-inline" action="{{route('md.siswa.deletekeluarga')}}" method="post" onsubmit="return confirm('Lanjutkan proses hapus data {{$k->hubungan->nama}} dari {{$data->nama}}?')">
                              <button type="submit" class="btn btn-sm btn-outline-danger" name="id" value="{{$k->id}}" title="Hapus Data {{$k->hubungan->nama}}"><i data-feather="trash-2"></i> Hapus</button>
                              @csrf
                            </form>
                          </td>
                        </tr>
                      </table>
                      <hr class="mt-0 mb-2">
                    @endif
                  @endfor
                  @if ($data->keluargajepang != null)
                    <table class="table table-striped mb-0">
                      <tr>
                        <td style="width: 30%">Nama Keluarga di Jepang</td>
                        <th>{{$data->keluargajepang->nama}}</th>
                      </tr>
                      <tr>
                        <td>Hubungan</td>
                        <th>{{$data->keluargajepang->hubungan->nama}}</th>
                      </tr>
                      <tr>
                        <td>Alamat Tinggal</td>
                        <th>{{$data->keluargajepang->perfektur->nama}}</th>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <button type="button" class="btn btn-sm btn-outline-warning btneditkeluargajepang" name="button" value="{{$data->keluargajepang->id}}" data-toggle="modal" data-target="#modal-keluargajepang" data-backdrop="static" data-keyboard="false" title="Ubah Data"><i data-feather="edit"></i> Ubah</button>
                          <form class="d-inline" action="{{route('md.siswa.deletekeluargajepang')}}" method="post" onsubmit="return confirm('Lanjutkan proses hapus data keluarga di Jepang?')">
                            <button type="submit" class="btn btn-sm btn-outline-danger" name="id" value="{{$data->keluargajepang->id}}" title="Hapus Data"><i data-feather="trash-2"></i> Hapus</button>
                            @csrf
                          </form>
                        </td>
                      </tr>
                    </table>
                    <hr class="mt-0 mb-2">
                  @endif
                </div>
              </div>
              <div role="tabpanel" class="tab-pane {{Session::get('tabactive') == 'pendidikan' ? 'active' : ''}}" id="riwayatak" aria-labelledby="riwayatak-tab" aria-expanded="true">
                <button type="button" id="btnaddpendidikan" class="btn btn-sm btn-outline-danger mb-1" name="button" data-toggle="modal" data-target="#modal-pendidikan" data-backdrop="static" data-keyboard="false"><i data-feather="plus"></i> Tambah Data Pendidikan</button>
                @if (count($data->pendidikan) == 0)
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
                                <p class="mb-25">{{$rp->namasekolah}}</p>
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
                              <form class="d-inline" action="{{route('md.siswa.deletependidikan')}}" method="post" onsubmit="return confirm('Lanjutkan proses hapus data pendidikan {{$rp->jenjang->nama}} dari {{$data->nama}}?')">
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
              <div role="tabpanel" class="tab-pane {{Session::get('tabactive') == 'pekerjaan' ? 'active' : ''}}" id="riwayatkerja" aria-labelledby="riwayatkerja-tab" aria-expanded="true">
                <button type="button" id="btnaddpekerjaan" class="btn btn-sm btn-outline-danger mb-1" name="button" data-toggle="modal" data-target="#modal-pekerjaan" data-backdrop="static" data-keyboard="false"><i data-feather="plus"></i> Tambah Data Pekerjaan</button>
                @if (count($data->pekerjaan) == 0)
                  <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"><i data-feather="alert-circle" style="margin-top: -2px"></i> PERHATIAN</h4>
                    <div class="alert-body">
                      Data riwayat pekerjaan tidak ditemukan. Silakan tekan tombol <b>Tambah Data Pekerjaan</b> untuk mulai menambahkan.
                    </div>
                  </div>
                @else                      
                  <ul class="timeline mt-1">
                    <?php $no = 0; ?>
                    @foreach($riwayatpekerjaan as $rp)
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
                            <h5 class="mb-50">{{$rp->namaperusahaan}}</h5>
                            <span class="timeline-event-time">Terakhir Diubah {{ (new \App\Helper)->tanggal($rp->updated_at) }}</span>
                          </div>
                          <hr class="my-25">
                          <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                            <div class="media align-items-center">
                              <div class="media-body">
                                <p class="mb-25">{{$rp->bidang->nama}}</p>
                                <p class="text-muted mb-25">{{$rp->bulanmulai->nama}} {{$rp->thnmulai}} ~ {{$rp->bulanselesai->nama}} {{$rp->thnselesai}}</p>
                                <p class="text-muted mb-25">{{$rp->deskripsi}}</p>
                              </div>
                            </div>
                            <div class="mt-sm-0 mt-50">
                              <button class="btn btn-sm btn-outline-{{$back}} btneditpekerjaan" name="button" value="{{$rp->id}}" data-toggle="modal" data-target="#modal-pekerjaan" data-backdrop="static" data-keyboard="false"><i data-feather="edit" style="margin-top: -3px"></i> Ubah</button>
                              <form class="d-inline" action="{{route('md.siswa.deletepekerjaan')}}" method="post" onsubmit="return confirm('Lanjutkan proses hapus data pekerjaan di {{$rp->namaperusahaan}} milik {{$data->nama}}?')">
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
@endsection

@section('modal')
<div class="modal fade" id="modal-biodata" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaltitle">Ubah Biodata Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="jquery-val-form" class="forms-sample" action="{{route('md.siswa.update')}}" method="post" enctype="multipart/form-data">
          <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
          <div class="row">
            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nama Lengkap</b></label>
                <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Nama Lengkap</b> <small>(Katakana)</small></label>
                <input type="text" class="form-control" name="namajp" value="{{$data->namajp}}">
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>NIS</b></label>
                <input type="text" class="form-control" name="nis" value="{{$data->nis}}" required>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Panggilan</b> <small>(maks. 12 Karakter)</small></label>
                <input type="text" class="form-control" name="panggilan" value="{{$data->panggilan}}" required>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Jenis Kelamin</b></label>
                <div class="row mx-0">
                  <div class="custom-control custom-control-danger custom-radio mr-2 mb-50">
                    <input type="radio" id="jk" name="idjk" value="1" class="custom-control-input" {{$data->idjk == 1 ? 'checked':''}} required>
                    <label class="custom-control-label" for="jk">Laki-Laki</label>
                  </div>
                  <div class="custom-control custom-control-danger custom-radio mb-50">
                    <input type="radio" id="jka" name="idjk" value="2" class="custom-control-input" {{$data->idjk == 2 ? 'checked':''}}>
                    <label class="custom-control-label" for="jka">Perempuan</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Tempat Lahir</b></label>
                <input type="text" class="form-control" name="tplahir" value="{{$data->tplahir}}" required>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Tanggal Lahir</b></label>
                <input type="text" name="tglahir" class="form-control flatpickr-basic"  placeholder="Pilih" value="{{$data->tglahir}}" style="background-color: white" required>
              </div>
            </div>
            
            <div class="col-xl-9 mb-1">
              <div class="form-group">
                <label><b>Alamat</b></label>
                <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}" required>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Provinsi Asal</b></label>
                <select class="form-control show-tick ms select2" name="idprov" id="idprov" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Kabupaten Asal</b></label>
                <select class="form-control show-tick ms select2" name="idkab" id="idkab" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>NIK</b></label>
                <input type="number" class="form-control" name="nik" value="{{$data->nik}}" required>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Telepon (HP)</b></label>
                <input type="number" class="form-control" name="nohp" value="{{$data->nohp}}" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Email</b></label>
                <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Nomor Paspor</b></label>
                <input type="text" class="form-control" name="paspor" value="{{$data->detil->paspor}}" required>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Agama</b></label>
                <select class="form-control show-tick ms select2" name="idagama" id="idagama" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Golongan Darah</b></label>
                <select class="form-control show-tick ms select2" name="idgoldarah" id="idgoldarah" data-placeholder="Pilih">

                </select>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Tangan Dominan</b></label>
                <select class="form-control show-tick ms select2" name="idtangan" id="idtangan" data-placeholder="Pilih">

                </select>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Berat Badan</b> <small>(dalam Kg)</small></label>
                <input type="number" class="form-control" name="berat" value="{{$data->detil->berat}}" required>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Tinggi Badan</b> <small>(dalam Cm)</small></label>
                <input type="number" class="form-control" name="tinggi" value="{{$data->detil->tinggi}}" required>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Status Perkawinan</b></label>
                <select class="form-control show-tick ms select2" name="idstatuskawin" id="idstatuskawin" data-placeholder="Pilih">

                </select>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Jumlah Anak</b></label>
                <input type="number" class="form-control" name="jmlanak" id="jmlanak" value="{{$data->detil->jmlanak}}">
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Merokok</b></label>
                <div class="row mx-0">
                  <div class="custom-control custom-control-danger custom-radio mr-2 mb-50">
                    <input type="radio" id="rokok" name="merokok" value="1" class="custom-control-input" {{$data->detil->merokok == 1 ? 'checked':''}} required>
                    <label class="custom-control-label" for="rokok">Ya</label>
                  </div>
                  <div class="custom-control custom-control-danger custom-radio mb-50">
                    <input type="radio" id="rokoka" name="merokok" value="0" class="custom-control-input" {{$data->detil->merokok == 0 ? 'checked':''}}>
                    <label class="custom-control-label" for="rokoka">Tidak</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Peminum Alkohol</b></label>
                <div class="row mx-0">
                  <div class="custom-control custom-control-danger custom-radio mr-2 mb-50">
                    <input type="radio" id="alkohol" name="alkohol" value="1" class="custom-control-input" {{$data->detil->alkohol == 1 ? 'checked':''}} required>
                    <label class="custom-control-label" for="alkohol">Ya</label>
                  </div>
                  <div class="custom-control custom-control-danger custom-radio mb-50">
                    <input type="radio" id="alkohola" name="alkohol" value="0" class="custom-control-input" {{$data->detil->alkohol == 0 ? 'checked':''}}>
                    <label class="custom-control-label" for="alkohola">Tidak</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Kekuatan Mata Kiri</b></label>
                <input type="number" class="form-control" name="matakiri" value="{{$data->detil->matakiri}}">
              </div>
            </div>

            <div class="col-xl-3 mb-1">
              <div class="form-group">
                <label><b>Kekuatan Mata Kanan</b></label>
                <input type="number" class="form-control" name="matakanan" value="{{$data->detil->matakanan}}">
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Hobi</b></label>
                <select class="form-control select2" name="idhobi" id="idhobi" data-placeholder="Pilih">

                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Keunggulan Diri</b></label>
                <select class="form-control select2" name="idkeunggulan" id="idkeunggulan" data-placeholder="Pilih">

                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Kekurangan Diri</b></label>
                <select class="form-control select2" name="idkekurangan" id="idkekurangan" data-placeholder="Pilih">
                  
                </select>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Pas Foto</b></label>
                <input type="file" class="dropify" @if($data->photo != null) data-default-file="{{asset($data->photo)}}" @endif name="photos" data-allowed-file-extensions="jpg jpeg png" data-max-file-size="1M">
                <label>* format file <b>.jpg</b> atau <b>.jpeg</b>, rasio <b>3x4</b> ukuran maksimal 1MB</label>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Dokumen KTP</b></label>
                <input type="file" class="dropify" @if($data->detil->dokktp != null) data-default-file="{{asset($data->detil->dokktp)}}" @endif name="ktps" data-allowed-file-extensions="jpg jpeg png" data-max-file-size="1M">
                <label>* format file <b>.jpg</b> atau <b>.jpeg</b>, ukuran maksimal 1MB</label>
              </div>
            </div>

            <div class="col-xl-4 mb-1">
              <div class="form-group">
                <label><b>Dokumen Kartu Keluarga</b></label>
                <input type="file" class="dropify" @if($data->detil->dokkk != null) data-default-file="{{asset($data->detil->dokkk)}}" @endif name="kks" data-allowed-file-extensions="jpg jpeg png" data-max-file-size="1M">
                <label>* format file <b>.jpg</b> atau <b>.jpeg</b>, ukuran maksimal 1MB</label>
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

<div class="modal fade" id="modal-keluarga" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-keluarga"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample form-keluarga" action="{{route('md.siswa.storekeluarga')}}" method="post">
          <input type="hidden" name="idsiswa" value="{{$data->id}}">
          <input type="hidden" name="id" id="idkeluarga">

          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Hubungan Keluarga</b></label>
                <select class="form-control show-tick ms select2" name="idhubungan" id="idhubungan" data-placeholder="Pilih">

                </select>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama <span id="namahubungan"></span></b></label>
                <input type="text" class="form-control" name="nama" id="namakeluarga">
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Alamat Tinggal</b></label>
                <input type="text" class="form-control" name="alamat" id="alamatkeluarga">
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Pekerjaan</b></label>
                <select class="form-control select2" name="idpekerjaan" id="idpekerjaan" data-placeholder="Pilih">

                </select>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Telepon (HP)</b></label>
                <input type="text" class="form-control" name="nohp" id="nohpkeluarga">
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

<div class="modal fade" id="modal-keluargajepang" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-keluargajepang"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample form-keluargajepang" action="{{route('md.siswa.storekeluargajepang')}}" method="post">
          <input type="hidden" name="idsiswa" value="{{$data->id}}">
          <input type="hidden" name="id" id="idkeluargajepang">

          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama Keluarga</b></label>
                <input type="text" class="form-control" name="nama" id="namakeluargajp">
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Hubungan Keluarga</b></label>
                <select class="form-control show-tick ms select2" name="idhubungan" id="idhubunganjepang" data-placeholder="Pilih">

                </select>
              </div>
            </div>

            <div class="col-xl-12">
              <div class="form-group">
                <label><b>Alamat Tinggal di Jepang</b></label>
                <select class="form-control select2" name="idperfektur" id="idperfektur" data-placeholder="Pilih">

                </select>
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
          <input type="hidden" name="idsiswa" value="{{$data->id}}">
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
                <label><b>Nama Sekolah</b></label>
                <input type="text" class="form-control" name="namasekolah" id="namasekolah" required>
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

<div class="modal fade" id="modal-pekerjaan" tabindex="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title-pekerjaan"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample form-pekerjaan" action="#" method="post">
          <input type="hidden" name="idsiswa" value="{{$data->id}}">
          <input type="hidden" name="id" id="idpekerjaansiswa">

          <div class="row">
            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Nama Perusahaan</b></label>
                <input type="text" class="form-control" name="namaperusahaan" id="namaperusahaan" required>
              </div>
            </div>

            <div class="col-xl-12 mb-1">
              <div class="form-group">
                <label><b>Bidang Pekerjaan</b></label>
                <select class="form-control show-tick ms select2" name="idbidang" id="idbidang" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Tahun Mulai</b></label>
                <input type="number" class="form-control tahun" name="thnmulai" id="thnmulai" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Bulan Mulai</b></label>
                <select class="form-control show-tick ms select2" name="idbulanmulai" id="bulanmulai" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Tahun Selesai</b></label>
                <input type="number" class="form-control tahun" name="thnselesai" id="thnselesai" required>
              </div>
            </div>

            <div class="col-xl-6 mb-1">
              <div class="form-group">
                <label><b>Bulan Selesai</b></label>
                <select class="form-control show-tick ms select2" name="idbulanselesai" id="bulanselesai" data-placeholder="Pilih" required>

                </select>
              </div>
            </div>

            <div class="col-xl-12">
              <div class="form-group">
                <label><b>Deskripsi Pekerjaan</b></label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5"></textarea>
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
    $('#idkab').val('')
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

  $('#idstatuskawin').on('change', function(){
    if ($(this).val() == 1) {
      $('#jmlanak').prop('disabled', true)
    }else {
      $('#jmlanak').prop('disabled', false)
    }
  })

  $("#idtangan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.tangan")!!}',
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

  $("#idhobi").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.hobi")!!}',
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

  $("#idkeunggulan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.keunggulan")!!}',
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

  $("#idkekurangan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.kekurangan")!!}',
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
        url: '{!!route("s2.hubungan")!!}',
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

  $('#idhubungan').on('change', function(){
    $.get('/masterdata/siswa/gethubungan/'+$(this).val(), function(data){
        $('#namahubungan').text(data)
    })
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

  $("#idhubunganjepang").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.hubunganjepang")!!}',
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

  $("#idperfektur").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.perfektur")!!}',
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

  $("#idbidang").select2({
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

  $("#bulanmulai").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.bulan")!!}',
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

  $("#bulanselesai").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.bulan")!!}',
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

  $('#btnaddkeluarga').on('click', function(){
    $('#idkeluarga').val('')
    $('#modal-title-keluarga').text('Tambah Data Keluarga')
    $('.form-keluarga').attr('action', '{{route("md.siswa.storekeluarga")}}');
    $('#namakeluarga').val('')
    $('#alamatkeluarga').val('')
    $('#nohpkeluarga').val('')
    $("#idhubungan").val('').trigger('change');
    $("#idpekerjaan").val('').trigger('change');
  });

  $('.btneditkeluarga').on('click', function(){
    $('#idkeluarga').val($(this).val())
    $('#modal-title-keluarga').text('Ubah Data Keluarga')
    $('.form-keluarga').attr('action', '{{route("md.siswa.updatekeluarga")}}');
    $.get('/masterdata/siswa/getkeluarga/'+$(this).val(), function(data){
        $('#namakeluarga').val(data.nama)
        $('#alamatkeluarga').val(data.alamat)
        $('#nohpkeluarga').val(data.nohp)
        $("#idhubungan").append($("<option selected='selected'></option>").val(data.idhubungan).text(data.hubungan.nama+' '+data.hubungan.namajp)).trigger('change');
        $("#idpekerjaan").append($("<option selected='selected'></option>").val(data.idpekerjaan).text(data.pekerjaan.nama)).trigger('change');
    })
  });

  $('#btnaddkeluargajepang').on('click', function(){
    $('#idkeluargajepang').val('')
    $('#modal-title-keluargajepang').text('Tambah Keluarga di Jepang')
    $('.form-keluargajepang').attr('action', '{{route("md.siswa.storekeluargajepang")}}');
    $('#namakeluargajp').val('')
    $("#idhubunganjepang").val('').trigger('change');
    $("#idperfektur").val('').trigger('change');
  });

  $('.btneditkeluargajepang').on('click', function(){
    $('#idkeluargajepang').val($(this).val())
    $('#modal-title-keluargajepang').text('Ubah Keluarga di Jepang')
    $('.form-keluargajepang').attr('action', '{{route("md.siswa.updatekeluargajepang")}}');
    $.get('/masterdata/siswa/getkeluargajepang/'+$(this).val(), function(data){
        $('#namakeluargajp').val(data.nama)
        $("#idhubunganjepang").append($("<option selected='selected'></option>").val(data.idhubungan).text(data.hubungan.nama+' '+data.hubungan.namajp)).trigger('change');
        $("#idperfektur").append($("<option selected='selected'></option>").val(data.idperfektur).text(data.perfektur.nama)).trigger('change');
    })
  });

  $('#btnaddpendidikan').on('click', function(){
    $('#idpendidikan').val('')
    $('#modal-title-pendidikan').text('Tambah Data Pendidikan')
    $('.form-pendidikan').attr('action', '{{route("md.siswa.storependidikan")}}');
    $('#namasekolah').val('')
    $('#thnmasuk').val('')
    $('#tgllulus').val('')
    $("#idjenjang").val('').trigger('change');
  });

  $('.btneditpendidikan').on('click', function(){
    $('#idpendidikan').val($(this).val())
    $('#modal-title-pendidikan').text('Ubah Data Pendidikan')
    $('.form-pendidikan').attr('action', '{{route("md.siswa.updatependidikan")}}');
    $.get('/masterdata/siswa/getpendidikan/'+$(this).val(), function(data){
        $('#namasekolah').val(data.namasekolah)
        $('#thnmasuk').val(data.thnmasuk)
        $('#tgllulus').val(data.tgllulus)
        $("#idjenjang").append($("<option selected='selected'></option>").val(data.idjenjang).text(data.jenjang.nama)).trigger('change');
    })
  });

  $('#btnaddpekerjaan').on('click', function(){
    $('#idpekerjaansiswa').val('')
    $('#modal-title-pekerjaan').text('Tambah Data Pekerjaan')
    $('.form-pekerjaan').attr('action', '{{route("md.siswa.storepekerjaan")}}');
    $('#namaperusahaan').val('')
    $('#thnmulai').val('')
    $('#thnselesai').val('')
    $("#bulanmulai").val('').trigger('change');
    $("#bulanselesai").val('').trigger('change');
    $("#idbidang").val('').trigger('change');
    $('#deskripsi').val('')
  });

  $('.btneditpekerjaan').on('click', function(){
    $('#idpekerjaansiswa').val($(this).val())
    $('#modal-title-pekerjaan').text('Ubah Data Pekerjaan')
    $('.form-pekerjaan').attr('action', '{{route("md.siswa.updatepekerjaan")}}');
    $.get('/masterdata/siswa/getpekerjaan/'+$(this).val(), function(data){
        $('#namaperusahaan').val(data.namaperusahaan)
        $('#thnmulai').val(data.thnmulai)
        $('#thnselesai').val(data.thnselesai)
        $('#deskripsi').val(data.deskripsi)
        $("#idbidang").append($("<option selected='selected'></option>").val(data.idbidang).text(data.bidang.nama)).trigger('change');
        $("#bulanmulai").append($("<option selected='selected'></option>").val(data.idbulanmulai).text(data.bulanmulai.nama)).trigger('change');
        $("#bulanselesai").append($("<option selected='selected'></option>").val(data.idbulanselesai).text(data.bulanselesai.nama)).trigger('change');
    })
  });

  $("#idagama").append($("<option selected='selected'></option>").val('{{$data->idagama}}').text('{{$data->idagama == null ? "" : $data->agama->nama}}')).trigger('change');

  $("#idkab").append($("<option selected='selected'></option>").val('{{$data->idkab}}').text('{{$data->idkab == null ? "" : $data->kabupaten->nama}}')).trigger('change');

  $("#idprov").append($("<option selected='selected'></option>").val('{{$data->idprov}}').text('{{$data->idprov == null ? "" : $data->provinsi->nama}}'));

  $("#idagama").append($("<option selected='selected'></option>").val('{{$data->idagama}}').text('{{$data->idagama == null ? "" : $data->agama->nama}}')).trigger('change');

  $("#idgoldarah").append($("<option selected='selected'></option>").val('{{$data->detil->idgoldarah}}').text('{{$data->detil->idgoldarah == null ? "" : $data->detil->goldarah->namajp}}')).trigger('change');

  $("#idstatuskawin").append($("<option selected='selected'></option>").val('{{$data->detil->idstatuskawin}}').text('{{$data->detil->idstatuskawin == null ? "" : $data->detil->statuskawin->nama}}')).trigger('change');

  $("#idtangan").append($("<option selected='selected'></option>").val('{{$data->detil->idtangan}}').text('{{$data->detil->idtangan == null ? "" : $data->detil->tangan->nama}}')).trigger('change');

  $("#idhobi").append($("<option selected='selected'></option>").val('{{$data->detil->idhobi}}').text('{{$data->detil->idhobi == null ? "" : $data->detil->hobi->nama}}')).trigger('change');

  $("#idkeunggulan").append($("<option selected='selected'></option>").val('{{$data->detil->idkeunggulan}}').text('{{$data->detil->idkeunggulan == null ? "" : $data->detil->keunggulan->nama." ".$data->detil->keunggulan->namajp}}')).trigger('change');

  $("#idkekurangan").append($("<option selected='selected'></option>").val('{{$data->detil->idkekurangan}}').text('{{$data->detil->idkekurangan == null ? "" : $data->detil->kekurangan->nama." ".$data->detil->kekurangan->namajp}}')).trigger('change');

});
</script>
@stop
