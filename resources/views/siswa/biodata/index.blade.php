@extends('layouts.menu')

@section('title-head', 'Biodata')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Biodata</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">ASKA Bali</a></li>
              <li class="breadcrumb-item active">Biodata</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
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
                      <th>{{$data->detil->idstatuskawin == null ? '' : $data->statuskawin->nama}}</th>
                    </tr>
                    <tr>
                      <td>Jumlah Anak</td>
                      <th>{{$data->detil->jmlanak}}</th>
                    </tr>
                    <tr>
                      <td>Hobi</td>
                      <th>{{$data->detil->idhobi == null ? '' : $data->hobi->nama}}</th>
                    </tr>
                    <tr>
                      <td>SIM</td>
                      <th></th>
                    </tr>
                    <tr>
                      <td>Keunggulan Diri</td>
                      <th>{{$data->detil->idkeunggulan == null ? '' : $data->keunggulan->nama}}</th>
                    </tr>
                    <tr>
                      <td>Kekurangan Diri</td>
                      <th>{{$data->detil->idkekurangan == null ? '' : $data->kekurangan->nama}}</th>
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

@endsection

@section('page-js')
<script>
$(document).ready(function() {

});
</script>
@stop
