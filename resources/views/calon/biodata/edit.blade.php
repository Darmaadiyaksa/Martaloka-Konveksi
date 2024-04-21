@extends('layouts.menu')

@section('title-head', 'Ubah Biodata')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Ubah Biodata
          </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('biodata')}}">Biodata</a></li>
              <li class="breadcrumb-item active">Ubah</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form id="jquery-val-form" class="forms-sample" action="{{route('biodata.update')}}" method="post" enctype="multipart/form-data" id="formdosen">
              <input type="hidden" class="form-control" name="id" value="{{$data->iddaftar}}">
              <div class="row">
                <div class="form-group col-md-12">
                  <div class="col-sm-12">
                    <h4 class="mb-2 text-lg-left text-center text-success"><b>Data Diri</b></h4>
                    <div class="dropdown-divider"></div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="col-sm-12">
                    <div class="alert alert-dark mb-2" role="alert">
                      <h4 class="alert-heading"><i data-feather="info" style="margin-top: -2px"></i> PENTING</h4>
                      <div class="alert-body">
                        <ul class="pl-1 mb-50">
                          <li>Penulisan Nama, Tempat Lahir dan Tanggal Lahir <b>WAJIB</b> mengikuti atau sesuai dengan Ijazah terakhir Anda (tanpa gelar akademik).</li>
                          <li>Gunakan format penulisan <b>Capitalize Each Word</b> atau huruf kapital di setiap awal kata. Misal penulisan nama Made Kevin (bukan MADE KEVIN atau made kevin)</li>
                          <li>Pada isian tempat lahir cukup diisi tempat lahir saja, tanpa tanggal lahir. Isian tanggal lahir sudah disediakan tersendiri.</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Nama Lengkap</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="nama" class="form-control" value="{{$data->daftar->nama}}" required>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Nama Panggilan </b><small class="text-muted">(maksimal 10 karakter)</small></label>
                  <div class="col-sm-12">
                    <input type="text" maxlength="10" name="panggilan" class="form-control" value="{{$data->panggilan}}" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Tempat Lahir</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="tempatlahir" class="form-control" value="{{$data->tempatlahir}}" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Tanggal Lahir</b></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control flatpickr-basic" name="tgllahir" placeholder="Pilih" value="{{$data->tgllahir}}" style="background-color: white" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Jenis Kelamin</b></label>
                  <div class="col-sm-12">
                    <div class="row mx-0">
                      <div class="custom-control custom-control-success custom-radio mr-2">
                        <input type="radio" id="jk" name="jk" value="1" class="custom-control-input" {{$data->jk == '1' ? 'checked':''}} required>
                        <label class="custom-control-label" for="jk">Laki-Laki</label>
                      </div>
                      <div class="custom-control custom-control-success custom-radio">
                        <input type="radio" id="jka" name="jk" value="2" class="custom-control-input" {{$data->jk == '2' ? 'checked':''}}>
                        <label class="custom-control-label" for="jka">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-4 col-form-label"><b>Agama</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" name="idagama" data-placeholder="Pilih" required>
                      <option value=""></option>
                      @foreach($agama as $a)
                        <option {{$a->id == $data->idagama ? 'selected':''}} value="{{$a->id}}">{{$a->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <label class="col-sm-12 col-form-label"><b>Tinggi Badan</b> <small class="text-muted">(dalam cm)</small></label>
                  <div class="col-sm-12">
                    <input type="number" name="tinggi" autocomplete="off"  class="form-control" value="{{$data->tinggi}}" required>
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <label class="col-sm-12 col-form-label"><b>Berat Badan</b> <small class="text-muted">(dalam kg)</small></label>
                  <div class="col-sm-12">
                    <input type="number" name="berat" autocomplete="off"  class="form-control" value="{{$data->berat}}" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Ukuran Pakaian</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" name="ukuranbaju" data-placeholder="Pilih" required>
                      <option value=""></option>
                      <option {{$data->ukuranbaju == 'S' ? 'selected':''}} value="S">S</option>
                      <option {{$data->ukuranbaju == 'M' ? 'selected':''}} value="M">M</option>
                      <option {{$data->ukuranbaju == 'L' ? 'selected':''}} value="L">L</option>
                      <option {{$data->ukuranbaju == 'XL' ? 'selected':''}} value="XL">XL</option>
                      <option {{$data->ukuranbaju == 'XXL' ? 'selected':''}} value="XXL">XXL</option>
                      <option {{$data->ukuranbaju == 'XXXL' ? 'selected':''}} value="XXXL">XXXL</option>
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Email</b></label>
                  <div class="col-sm-12">
                    <input type="email" name="email" autocomplete="off"  class="form-control" id="email" value="{{$data->daftar->email}}" readonly required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Nomor Telepon</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="telpon" autocomplete="off"  class="form-control" id="nohp" value="{{$data->daftar->telpon}}" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Alamat Tinggal</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="alamat" class="form-control" id="alamat" value="{{$data->alamat}}" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Kecamatan Tempat Tinggal</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" id="idkecamatan" name="idkecamatan" required>

                    </select>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Kode Pos</b></label>
                  <div class="col-sm-12">
                    <input type="number" name="kodepos" class="form-control" value="{{$data->kodepos}}">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Kewarganegaraan</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" name="idwn" data-placeholder="Pilih" required>
                      <option value=""></option>
                      @foreach($countries as $c)
                      <option {{$c->id == $data->idwn ? 'selected':''}} value="{{$c->id}}">{{$c->nama}} ({{$c->kode2}})</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-4 col-form-label"><b>NIK / Nomor Paspor</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="nik" autocomplete="off"  class="form-control" value="{{$data->daftar->nik}}" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Status Perkawinan</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" name="statuskawin" data-placeholder="Pilih" required>
                      <option selected value="{{$data->statuskawin}}">{{$data->statuskawin == '' ? 'Pilih':$data->statuskawin}}</option>
                      <option value="Belum Kawin">Belum Kawin</option>
                      <option value="Kawin">Kawin</option>
                      <option value="Cerai Hidup">Cerai Hidup</option>
                      <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-4 col-form-label"><b>Pas Foto</b></label>
                  <div class="col-sm-12">
                    <div class="body">
                      @if($data->photo == null)
                      <input type="file" class="dropify" name="photos" data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M" required>
                      @else
                      <input type="file" class="dropify" data-default-file="{{asset($data->photo)}}" name="photos" data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M">
                      @endif
                    </div>
                    <label class="col-form-label"><small>* format file <b>.jpg</b> atau <b>.jpeg</b>, rasio <b>3x4</b> ukuran maksimal 1MB</small></label>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Dokumen KTP / Paspor</b></label>
                  <div class="col-sm-12">
                    <div class="body">
                      <input type="file" class="dropify" @if($data->ktp != null) data-default-file="{{asset($data->ktp)}}" @endif name="ktps" data-allowed-file-extensions="jpg jpeg" data-max-file-size="1M">
                    </div>
                    <label class="col-form-label"><small>* format file <b>.jpg</b> atau <b>.jpeg</b>, ukuran maksimal 1MB</small></label>
                  </div>
                </div>

                @if($data->daftar->jalur->idjalur == 7)
                  <div class="form-group col-md-12">
                    <div class="col-sm-12">
                      <h4 class="mt-2 text-lg-left text-center text-success"><b>Data Asal Universitas</b></h4>
                      <label class="col-form-label pb-25"><small>Silakan lengkapi data asal Universitas dan Program Studi dimana Anda menempuh jenjang D4 / Sarjana</small></label>
                      <div class="dropdown-divider"></div>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Nama Universitas</b></label>
                    <div class="col-sm-12">
                      <select class="form-control show-tick ms select2" id="univasal">

                      </select>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Program Studi</b></label>
                    <div class="col-sm-12">
                      <select class="form-control show-tick ms select2" id="idasalprodi" name="idasalprodi" required>

                      </select>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Nomor Induk Mahasiswa</b></label>
                    <div class="col-sm-12">
                      <input type="text" name="nim" class="form-control" value="{{$data->nim}}" required>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Tanggal Lulus</b></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control flatpickr-basic" name="tgllulus" placeholder="Pilih" value="{{$data->tgllulus}}" style="background-color: white" required>
                    </div>
                  </div>
                @else
                  <div class="form-group col-md-12">
                    <div class="col-sm-12">
                      <h4 class="my-2 text-lg-left text-center text-success"><b>Data Asal Sekolah</b></h4>
                      <div class="dropdown-divider"></div>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Provinsi Asal Sekolah</b></label>
                    <div class="col-sm-12">
                      <select class="form-control show-tick ms select2" name="idprovsekolah" id="provsekolah">

                      </select>
                    </div>
                  </div>

                  <input type="hidden" name="sekolahbaru" value="" id="sekolahbaru">
                  <input type="hidden" name="alamatsekolahbaru" value="" id="alamatsekolah">
                  <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Nama Sekolah</b></label>
                    <div class="col-sm-12">
                      <select class="form-control show-tick ms select2" id="idasalsekolah" name="idasalsekolah" required>

                      </select>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>NISN</b></label>
                    <div class="col-sm-12">
                      <input type="text" name="nisn" class="form-control" value="{{$data->nisn}}" required>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="col-sm-12 col-form-label"><b>Jurusan</b></label>
                    <div class="col-sm-12">
                      {{-- @if($data->daftar->jalur != null && count($data->daftar->jalur->prodi) > 0)
                      <input type="text" class="form-control" value="{{$data->idjurusan == null ? '':$data->jurusan->nama}}" readonly>
                      <input type="hidden" name="idjurusan" class="form-control" value="{{$data->idjurusan}}">
                      @else --}}
                      <select class="form-control show-tick ms select2" id="idjurusan" name="idjurusan" required>

                      </select>
                      {{-- @endif --}}
                    </div>
                  </div>
                @endif

                <div class="form-group col-md-12">
                  <label class="col-sm-12 col-form-label"><b>Nomor Ijazah</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="noijazah" class="form-control" value="{{$data->noijazah}}" required>
                  </div>
                  <label class="col-sm-12 col-form-label pb-0"><small>* gunakan Nomor SKL jika Anda belum memeroleh Ijazah</small></label>
                  @if($data->daftar->jalur->idjalur != 7)
                  <label class="col-sm-12 col-form-label pb-25"><small>* jika Anda belum memeroleh Ijazah atau SKL silakan isi dengan karakter minus (-)</small></label>
                  @endif
                </div>

                <div class="form-group col-md-12">
                  <div class="col-sm-12">
                    <h4 class="my-2 text-lg-left text-center text-success"><b>Data Pekerjaan</b></h4>
                    <div class="dropdown-divider"></div>
                    <label class="form-label"><small>Lengkapi isian data pekerjaan jika Anda sudah bekerja, jika Anda belum / tidak bekerja silakan pilih <b>Belum / Tidak Bekerja</b> pada pilihan Pekerjaan</small></label>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Pekerjaan</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" name="idpekerjaan" data-placeholder="Pilih" required>
                      <option value=""></option>
                      @foreach($pekerjaan as $p)
                        <option  @if($kantor != null) {{$p->id == $kantor->idpekerjaan ? 'selected':''}} @endif value="{{$p->id}}">{{$p->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Nama Kantor</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="namakantor" class="form-control" value="{{$kantor == null ? '' : $kantor->namakantor}}">
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <label class="col-sm-6 col-form-label"><b>Alamat Kantor</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="alamatkantor" class="form-control" value="{{$kantor == null ? '' : $kantor->alamat}}">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Tanggal Mulai Bekerja</b></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control flatpickr-basic" name="awalbekerja" placeholder="Pilih" value="{{$kantor == null ? '' : $kantor->awalbekerja}}" style="background-color: white">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>NIP / Nomor Pegawai</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="nip" class="form-control" value="{{$kantor == null ? '' : $kantor->nip}}">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Jabatan</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="jabatan" class="form-control" value="{{$kantor == null ? '' : $kantor->jabatan}}">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Pangkat / Golongan</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" name="idpangkat" data-placeholder="Pilih">
                      <option value=""></option>
                      @foreach($pangkat as $p)
                        <option  @if($kantor != null) {{$p->id == $kantor->idpangkat ? 'selected':''}} @endif value="{{$p->id}}">{{$p->pangkat}} ({{$p->golongan}}/{{$p->ruang}})</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <div class="col-sm-12">
                    <h4 class="my-2 text-lg-left text-center text-success"><b>Data Keluarga</b></h4>
                    <div class="dropdown-divider"></div>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Nama Ayah</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="namaayah" class="form-control" value="{{$keluarga->namaayah}}">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Pekerjaan Ayah</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" id="idpekerjaanayah" name="idpekerjaanayah">

                    </select>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Nama Ibu Kandung</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="namaibu" class="form-control" value="{{$keluarga->namaibu}}" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Pekerjaan Ibu</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" id="idpekerjaanibu" name="idpekerjaanibu">

                    </select>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Alamat Orang Tua</b></label>
                  <div class="col-sm-12">
                    <input type="text" name="alamatortu" class="form-control" value="{{$keluarga->alamatortu}}" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-12 col-form-label"><b>Penghasilan Orang Tua</b></label>
                  <div class="col-sm-12">
                    <select class="form-control show-tick ms select2" name="penghasilan"  data-placeholder="Pilih">
                      <option></option>
                      <option @if($keluarga->penghasilan != null){{$keluarga->penghasilan == "< 5 Juta" ? 'selected':''}}@endif value="< 5 Juta">< 5 Juta</option>
                      <option @if($keluarga->penghasilan != null){{$keluarga->penghasilan == "5 Juta s/d 10 Juta" ? 'selected':''}}@endif value="5 Juta s/d 10 Juta">5 Juta s/d 10 Juta</option>
                      <option @if($keluarga->penghasilan != null){{$keluarga->penghasilan == "> 10 Juta" ? 'selected':''}}@endif value="> 10 Juta">> 10 Juta</option>
                    </select>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Email Orang Tua</b></label>
                  <div class="col-sm-12">
                    <input type="email" name="emailortu" class="form-control" value="{{$keluarga->emailortu}}">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Telepon Orang Tua</b></label>
                  <div class="col-sm-12">
                    <input type="number" name="telepon" class="form-control" value="{{$keluarga->telepon}}" required>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Anak Ke</b></label>
                  <div class="col-sm-12">
                    <input type="number" name="anakke" class="form-control" value="{{$keluarga->anakke}}">
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label class="col-sm-6 col-form-label"><b>Jumlah Saudara</b></label>
                  <div class="col-sm-12">
                    <input type="number" name="jmlsaudara" class="form-control"  value="{{$keluarga->jmlsaudara}}">
                  </div>
                </div>

                <div class="form-group col-md-12">
                  <div class="col-sm-12">
                    <div class="dropdown-divider my-2"></div>
                  </div>
                </div>
              </div>

              <div class="col-sm-12">
                <button type="submit" class="btn btn-icon btn-lg btn-block btn-success mb-2"><i data-feather="save"></i> Simpan</button>
              </div>

              {{ csrf_field() }}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('modal')
<div class="modal fade text-left" id="modal-sekolah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modaltitledokumen">Tambah Sekolah Luar Negeri</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12">
          <div class="form-group">
            <label>Nama Sekolah</label>
            <input type="text" class="form-control" id="namasekolahbaru"value="">
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group">
            <label>Alamat Sekolah</label>
            <input type="text" class="form-control" id="alamatsekolahbaru"value="">
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-primary" id="btnsimpansekolah" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-sm btn-outline-danger" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('jspage')
<script>
$(document).ready(function() {
  var idprovsekolah = '{{$data->idasalsekolah == null ? "" : $data->sekolah->idprov}}'
  var idasalsekolah = '{{$data->idasalsekolah}}'
  var idasalpt = '{{$data->idasalprodi == null ? "" : $data->prodiasal->idpt}}'
  var idasalprodi = '{{$data->idasalprodi}}'

  $("#idkecamatan").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.kecamatan")!!}',
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

  $("#idasalsekolah").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.sekolah")!!}',
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

  $('#idasalsekolah').on('change', function(){
    idasalsekolah = $(this).val()
    $('#idjurusan').val('');
    $("#idjurusan").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.jurusan")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idasalsekolah:idasalsekolah
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
    $("#idjurusan").val()
  })

  $("#idpekerjaanayah").select2({
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

  $("#idpekerjaanibu").select2({
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

  $('#btnsimpansekolah').on('click', function(){
    $("#idasalsekolah").append($("<option selected='selected'></option>").val('baru').text($('#namasekolahbaru').val())).trigger('change');
    $('#sekolahbaru').val($('#namasekolahbaru').val())
    $('#alamatsekolah').val($('#alamatsekolahbaru').val())
  })

  $("#provsekolah").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.sekolahprovinsi")!!}',
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

  $('#provsekolah').on('change', function(){
    idprovsekolah = $(this).val()
    idasalsekolah = ''
    $("#idasalsekolah").val('');
    $("#idjurusan").val('');
    $("#idasalsekolah").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.sekolah")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idprov:idprovsekolah
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

    $('#idasalsekolah').on('change', function(){
      idasalsekolah = $(this).val()
      if (idasalsekolah == 'baru') {
        $('#modal-sekolah').modal({backdrop: 'static', keyboard: false})  ;
      }
    });


    $("#idjurusan").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.jurusan")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idasalsekolah:idasalsekolah
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

  $("#univasal").select2({
    placeholder: "Pilih",
    ajax: {
        url: '{!!route("s2.universitas")!!}',
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

  $('#univasal').on('change', function(){
    idasalpt = $(this).val()
    $("#idasalprodi").val('');
    $("#idasalprodi").select2({
      placeholder: "Pilih",
      ajax: {
          url: '{!!route("s2.prodiasal")!!}',
          dataType: 'json',
          data: function (params) {
              return {
                  q: $.trim(params.term),
                  idpt:idasalpt
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

  $("#provsekolah").append($("<option selected='selected'></option>").val('{{$data->idasalsekolah == null ? "" : $data->sekolah->idprov}}').text('{{$data->idasalsekolah == null ? "" : $data->sekolah->provinsi->nama}}')).trigger('change');

  $("#univasal").append($("<option selected='selected'></option>").val('{{$data->idasalprodi == null ? "" : $data->prodiasal->idpt}}').text('{{$data->idasalprodi == null ? "" : $data->prodiasal->universitas->nama}}')).trigger('change');

  $("#idkecamatan").append($("<option selected='selected'></option>").val('{{$data->idkecamatan}}').text('{{$data->idkecamatan == null ? "" : $data->kecamatan->nama}}')).trigger('change');

  $("#idasalsekolah").append($("<option selected='selected'></option>").val('{{$data->idasalsekolah}}').text('{{$data->idasalsekolah == null ? "" : $data->sekolah->nama}}')).trigger('change');

  $("#idasalprodi").append($("<option selected='selected'></option>").val('{{$data->idasalprodi}}').text('{{$data->idasalprodi == null ? "" : $data->prodiasal->nama}}')).trigger('change');

  $("#idjurusan").append($("<option selected='selected'></option>").val('{{$data->idjurusan}}').text('{{$data->idjurusan == null ? "" : $data->jurusan->nama}}')).trigger('change');

  $("#idpekerjaanayah").append($("<option selected='selected'></option>").val('{{$keluarga->idpekerjaanayah}}').text('{{$keluarga->idpekerjaanayah == null ? "" : $keluarga->pekerjaanayah->nama}}')).trigger('change');

  $("#idpekerjaanibu").append($("<option selected='selected'></option>").val('{{$keluarga->idpekerjaanibu}}').text('{{$keluarga->idpekerjaanibu == null ? "" : $keluarga->pekerjaanibu->nama}}')).trigger('change');

});
</script>
@stop
