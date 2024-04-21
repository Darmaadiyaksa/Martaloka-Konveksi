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
    <div class="row">
      <div class="col-12">
        <div class="row match-height">
          <div class="col-lg-3">
            <div class="card">
              <div class="card-body text-center row mx-0 align-items-start justify-content-center">
                <img src="{{$data->photo == null ? asset('images/user-default.jpg') : asset($data->photo)}}" class="rounded" width="100%" alt="Foto Siswa">
                @can('calon')
                  <a href="{{route('biodata.edit')}}" class="btn btn-sm btn-outline-danger mt-75"><i data-feather="edit"></i> Ubah Biodata</a>
                @endcan
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive-lg">
                  <table class="table table-striped">
                    <tr>
                      <td colspan="2"><h2 class="mb-0">{{$data->daftar->nama}}</h2></td>
                    </tr>
                    <tr>
                      <td style="width:30%">Panggilan</td>
                      <th>{{$data->panggilan == null ? '' : $data->panggilan}}</th>
                    </tr>
                    <tr>
                      <td>Jenis Kelamin</td>
                      <th>
                        @if($data->jk == null)
                        @elseif($data->jk == 1)
                          Laki-laki
                        @elseif($data->jk == 2)
                          Perempuan
                        @endif
                      </th>
                    </tr>
                    <tr>
                      <td>Tempat, Tanggal Lahir</td>
                      <th>{{$data->tempatlahir}}{{$data->tgllahir == null ? '' : ', '.(new \App\Helper)->tanggal($data->tgllahir)}}</th>
                    </tr>
                    <tr>
                      <td>Usia</td>
                      <th>{{$data->tgllahir == null ? '' : (new \App\Helper)->lamamengajar($data->tgllahir)}}</th>
                    </tr>
                    <tr>
                      <td>Agama</td>
                      <th>{{$data->idagama == null ? '' : $data->agama->nama}}</th>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <th>{{$data->daftar->email}}</th>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <th>{{$data->daftar->telpon}}</th>
                    </tr>
                    <tr>
                      <td>Tinggi, Berat Badan</td>
                      <th>
                        {{$data->tinggi == null ? '' : $data->tinggi.' cm'}}{{$data->berat == null ? '' : ', '.$data->berat.' kg'}}
                        @if($data->ukuranbaju == null)
                          <div class="badge badge-light-danger"><i data-feather="tag"></i> Pakaian Belum Dipilih</div>
                        @else
                          <div class="badge badge-light-info"><i data-feather="tag"></i> {{$data->ukuranbaju}}</div>
                        @endif
                      </th>
                    </tr>
                    <tr>
                      <td>Jenis Pendaftar</td>
                      <th>
                        {{$data->jeniscalon->nama}}
                        @can('adminbaksi')
                          <button type="button" class="btn btn-sm btn-outline-info btnedit" value="{{$data->daftar->id}}"  data-toggle="modal" data-target="#modal-edit" data-backdrop="static" data-keyboard="false" name="button" title="Klik untuk mengubah jenis pendaftar"><i data-feather="edit"></i> Ubah</button>
                        @endcan
                      </th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12">
        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" id="dd-tab" data-toggle="pill" href="#dd" aria-expanded="true">Data Diri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="keluarga-tab" data-toggle="pill" href="#keluarga" aria-expanded="true">Data Keluarga</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pekerjaan-tab" data-toggle="pill" href="#pekerjaan" aria-expanded="true">Data Pekerjaan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="daftar-tab" data-toggle="pill" href="#daftar" aria-expanded="true">Riwayat Pendaftaran</a>
          </li>
          @if(auth::user()->can('admin') == true)
          <li class="col-lg col-sm-12 px-0 text-lg-right text-left">
            <a class="btn btn-outline-danger my-25" href="{{route('admin.pendaftaran.detilprogram',$data->iddaftar)}}" title="Pilihan Program"><i data-feather="file-text"></i> Pilihan Program</a>
          </li>
          @endif
        </ul>
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="dd" aria-labelledby="dd-tab" aria-expanded="true">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive-lg">
                  <table class="table table-striped">
                    <tr>
                      <td style="width:30%">Kewarganegaraan</td>
                      <td><b>{{$data->idwn == null ? '' : $data->wn->nama.' ('.$data->wn->kode2.')'}}</b></td>
                    </tr>
                    <tr>
                      <td>
                        @if($data->idwn == null || $data->idwn == '360')
                          NIK
                        @else
                          Nomor Paspor
                        @endif
                      </td>
                      <td><b>{{$data->daftar->nik}}</b></td>
                    </tr>
                    <tr>
                      <td>Status Perkawinan</td>
                      <td><b>{{$data->statuskawin}}</b></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td><b>{{$data->alamat}}</b></td>
                    </tr>
                    <tr>
                      <td>Wilayah Alamat</td>
                      <td><b>{{$data->idkecamatan == null ? '' : $data->kecamatan->nama.', '.$data->kecamatan->kabupaten->nama.', '.$data->kecamatan->kabupaten->provinsi->nama}}</b></td>
                    </tr>
                    <tr>
                      <td>Kode Pos</td>
                      <td><b>{{$data->kodepos}}</b></td>
                    </tr>
                    @if($data->daftar->jalur->idjalur == 7)
                      <tr>
                        <td>Asal Universitas</td>
                        <td><b>{{$data->idasalprodi == null ? '' : $data->prodiasal->universitas->nama}}</b></td>
                      </tr>
                      <tr>
                        <td>Program Studi</td>
                        <td>
                          @if($data->idasalprodi != null)
                          <b>{{$data->prodiasal->jenjang}} {{$data->prodiasal->nama }}</b>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <td>NIM</td>
                        <td><b>{{$data->nim}}</b></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lulus</td>
                        <td><b>{{(new \App\Helper)->tanggal($data->tgllulus)}}</b></td>
                      </tr>
                    @else
                      <tr>
                        <td>Asal Sekolah</td>
                        <td><b>{{$data->idasalsekolah == null ? '' : $data->sekolah->nama}}</b></td>
                      </tr>
                      <tr>
                        <td>Jenis Sekolah</td>
                        <td>
                          <b>
                          @if($data->idasalsekolah != null)
                            {{$data->sekolah->bentuk}}
                            @if($data->sekolah->jenis == 'N')
                              Negeri
                            @elseif($data->sekolah->jenis == 'S')
                              Swasta
                            @endif
                          @endif
                          </b>
                        </td>
                      </tr>
                      <tr>
                        <td>Jurusan Sekolah</td>
                        <td><b>{{$data->idjurusan == null ? '' : $data->jurusan->nama}}</b></td>
                      </tr>
                      <tr>
                        <td>Alamat Sekolah</td>
                        <td><b>{{$data->idasalsekolah == null ? '' : $data->sekolah->alamat}}</b></td>
                      </tr>
                      <tr>
                        <td>NISN</td>
                        <td><b>{{$data->nisn}}</b></td>
                      </tr>
                    @endif
                    <tr>
                      <td>Nomor Ijazah</td>
                      <td><b>{{$data->noijazah}}</b></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div role="tabpanel" class="tab-pane" id="keluarga" aria-labelledby="keluarga-tab" aria-expanded="true">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive-lg">
                  <table class="table table-striped">
                    <tr>
                      <td style="width:30%">Nama Ayah</td>
                      <td><b>{{$keluarga->namaayah}}</b></td>
                    </tr>
                    <tr>
                      <td>Pekerjaan Ayah</td>
                      <td><b>{{$keluarga->idpekerjaanayah == null ? '' : $keluarga->pekerjaanayah->nama}}</b></td>
                    </tr>
                    <tr>
                      <td>Nama Ibu</td>
                      <td><b>{{$keluarga->namaibu}}</b></td>
                    </tr>
                    <tr>
                      <td>Pekerjaan Ibu</td>
                      <td><b>{{$keluarga->idpekerjaanibu == null ? '' : $keluarga->pekerjaanibu->nama}}</b></td>
                    </tr>
                    <tr>
                      <td>Penghasilan Orang Tua</td>
                      <td><b>{{$keluarga->penghasilan}}</b></td>
                    </tr>
                    <tr>
                      <td>Alamat Orang Tua</td>
                      <td><b>{{$keluarga->alamatortu}}</b></td>
                    </tr>
                    <tr>
                      <td>Email Orang Tua</td>
                      <td><b>{{$keluarga->emailortu}}</b></td>
                    </tr>
                    <tr>
                      <td>Telepon Orang Tua</td>
                      <td><b>{{$keluarga->telepon}}</b></td>
                    </tr>
                    <tr>
                      <td>Anak Ke</td>
                      <td><b>{{$keluarga->anakke}}</b></td>
                    </tr>
                    <tr>
                      <td>Jumlah Saudara</td>
                      <td><b>{{$keluarga->jmlsaudara}}</b></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div role="tabpanel" class="tab-pane" id="pekerjaan" aria-labelledby="pekerjaan-tab" aria-expanded="true">
            <div class="card">
              <div class="card-body">
                @if($pekerjaan == null)
                  <div class="alert alert-dark mb-0" role="alert">
                    <div class="alert-body">
                      @if(auth::user()->can('calon') == true)
                        Silakan melengkapi isian data pekerjaan pada halaman <a href="{{route('biodata.edit')}}">Ubah Biodata</a> jika Anda sudah bekerja.
                      @else
                        Data pekerjaan belum dilengkapi.
                      @endif
                    </div>
                  </div>
                @else
                  <div class="table-responsive-lg">
                    <table class="table table-striped">
                      <tr>
                        <td style="width:30%">Pekerjaan</td>
                        <td><b>{{$pekerjaan->pekerjaan->nama}}</b></td>
                      </tr>
                      <tr>
                        <td>Nama Kantor</td>
                        <td><b>{{$pekerjaan->namakantor}}</b></td>
                      </tr>
                      <tr>
                        <td>Alamat Kantor</td>
                        <td><b>{{$pekerjaan->alamat}}</b></td>
                      </tr>
                      <tr>
                        <td>Tanggal Mulai Bekerja</td>
                        <td><b>{{(new \App\Helper)->tanggal($pekerjaan->awalbekerja)}}</b></td>
                      </tr>
                      <tr>
                        <td>NIP / Nomor Pegawai</td>
                        <td><b>{{$pekerjaan->nip}}</b></td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td><b>{{$pekerjaan->jabatan}}</b></td>
                      </tr>
                      <tr>
                        <td>Pangkat / Golongan</td>
                        <td><b>{{$pekerjaan->idpangkat == null ? '' : $pekerjaan->pangkat->pangkat.' ('.$pekerjaan->pangkat->golongan.'/'.$pekerjaan->pangkat->ruang.')'}}</b></td>
                      </tr>
                    </table>
                  </div>
                @endif
              </div>
            </div>
          </div>

          <div role="tabpanel" class="tab-pane" id="daftar" aria-labelledby="daftar-tab" aria-expanded="true">
            @foreach($daftar as $d)
            <div class="card">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-lg-3">
                    <div class="text-center">
                      <div class="avatar bg-danger p-50 mb-1">
                        <div class="avatar-content">
                          <i data-feather="pocket" class="font-medium-5"></i>
                        </div>
                      </div>
                      <p class="card-text mb-50">Jalur Pendaftaran</p>
                      <h2 class="font-weight-bolder text-danger mt-25 mb-25">{{$d->jalur->nama}}</h2>
                      <small class="text-muted">{{(new \App\Helper)->tanggal($d->created_at)}}</small>
                    </div>
                  </div>
                  <?php
                    $jam2 = strtotime($d->jalur->tglhasil);
                    $jam1 = strtotime('now');
                  ?>
                  <div class="col-lg-9">
                    <div class="table-responsive-lg">
                      <table class="table">
                        <tr>
                          <td style="width:27%">
                            Pilihan 1
                          </td>
                          <td>
                            @if(count($d->prodi) > 0)
                              <div class="badge badge-light-primary">
                                {{$d->prodi[0]->prodi->jenjang}} {{$d->prodi[0]->idprodi == 37 ? 'P2WL' : $d->prodi[0]->prodi->nama}}
                              </div>
                              <div class="badge badge-light-dark">
                                {{$d->prodi[0]->program->nama}}
                              </div>
                              @if($jam1 >= $jam2)
                                @if($d->prodi[0]->idstatus == 1)
                                  <div class="badge badge-light-success mt-25">Lulus</div>
                                @elseif($d->prodi[0]->idstatus == 2)
                                  <div class="badge badge-light-success mt-25">Lulus Cadangan</div>
                                @elseif($d->prodi[0]->idstatus == 3)
                                  <div class="badge badge-light-danger mt-25">Tidak Lulus</div>
                                @endif
                              @endif
                            @else
                            <div class="badge badge-light-danger">Belum Dipilih</div>
                            @endif
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Pilihan 2
                          </td>
                          <td>
                            @if(count($d->prodi) > 0)
                              <div class="badge badge-light-primary">
                                {{$d->prodi[1]->prodi->jenjang}} {{$d->prodi[1]->idprodi == 37 ? 'P2WL' : $d->prodi[1]->prodi->nama}}
                              </div>
                              <div class="badge badge-light-dark">
                                {{$d->prodi[1]->program->nama}}
                              </div>
                              @if($jam1 >= $jam2)
                                @if($d->prodi[1]->idstatus == 1)
                                  <div class="badge badge-light-success mt-25">Lulus</div>
                                @elseif($d->prodi[1]->idstatus == 2)
                                  <div class="badge badge-light-success mt-25">Lulus Cadangan</div>
                                @elseif($d->prodi[1]->idstatus == 3)
                                  <div class="badge badge-light-danger mt-25">Tidak Lulus</div>
                                @endif
                              @endif
                            @else
                            <div class="badge badge-light-danger">Belum Dipilih</div>
                            @endif
                          </td>
                        </tr>
                        <tr>
                          <td>Biaya Pendaftaran</td>
                          <td>
                            @if($d->biaya == null)
                              -
                            @else
                              Rp. {{number_format($d->biaya->tagihan,0,'.','.')}}
                              @if($d->statusbayar == 0)
                                <div class="badge badge-light-danger">
                                  Belum Bayar
                                </div>
                              @else
                                <div class="badge badge-light-success">
                                  Lunas
                                </div>
                              @endif
                            @endif
                          </td>
                        </tr>
                        @if($d->tagihandu != null)
                          <tr>
                            <td>Biaya Daftar Ulang</td>
                            <td>
                              Rp. {{number_format($d->tagihandu->tagihan,0,'.','.')}}
                              @if($d->tagihandu->sisa == 0)
                                <div class="badge badge-light-success">Lunas</div>
                              @elseif($d->tagihandu->bayar + $d->tagihandu->potongan == 0)
                                <div class="badge badge-light-danger">Belum Bayar</div>
                              @else
                                <div class="badge badge-light-danger">Terbayar Rp. {{number_format($d->tagihandu->bayar + $d->tagihandu->potongan,0,'.','.')}}</div>
                              @endif
                            </td>
                          </tr>
                        @endif
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')
<div class="modal fade text-left" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modaltitledokumen">Ubah Jenis Pendaftar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <form class="forms-sample" action="{{route('admin.jeniscalon.update')}}" method="post" enctype="multipart/form-data" id="formdosen">
          <input type="hidden" class="form-control" name="id" value="{{$data->id}}">
          <div class="form-group col-md-12">
            <label class="col-sm-12 col-form-label"><b>Jenis Pendaftar</b></label>
            <div class="col-sm-12">
              <select class="form-control show-tick ms select2" name="idjenis" required style="width:100%" data-placeholder="Pilih">
                <option value=""></option>
                @foreach($jeniscalon as $j)
                  <option {{$j->id == $data->idjenis ? 'selected':''}} value="{{$j->id}}">{{$j->nama}}</option>
                @endforeach
              </select>
            </div>
          </div>
          {{ csrf_field() }}
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Kembali</button>
        </div>
        </form>
    </div>
  </div>
</div>
@endsection

@section('jspage')
<script>
$(document).ready(function() {

});
</script>
@stop
