@extends('layouts.menu')

@section('title-head', 'Dashboard')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Dashboard Mahasiswa</h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Simulasi UP</a></li>
              <li class="breadcrumb-item active">Dahboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="content-body">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <p>Halo <b>{{$mhs->panggilan}}</b> <i data-feather="heart" style="margin-top: -2px"></i> Selamat Datang di <b>Sistem Simulasi Uji Pengetahuan</b> Universitas Mahasaraswati Denpasar.</p>
            <p class="mb-0">Sistem ini digunakan untuk mempersiapkan Anda menghadapi Uji Pengetahuan (UP), yaitu uji tulis yang berbasis komputer berkaitan dengan penguasaan pengetahuan untuk memenuhi capaian pembelajaran program PPG. Anda dapat mengikuti simulasi beberapa kali sesuai dengan <i>timeline</i> yang telah ditentukan oleh Prodi. Fitur yang dapat Anda akses pada sistem ini diantaranya:</p>
            <ol>
              <li>Mengikuti simulasi serentak</li>
              <li>Mengikuti simulasi mandiri</li>
              <li>Menampilkan riwayat hasil simulasi</li>
            </ol>
            <p class="mb-0">
              Selamat Mencoba
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body row mx-0 align-items-start">
            <div class="avatar bg-light-success p-50 mr-1">
              <div class="avatar-content">
                <i data-feather="user" class="font-medium-5"></i>
              </div>
            </div>
            <div>
              <p class="card-text mb-0">Angkatan</p>
              <h5 class="font-weight-bolder mb-0 text-success">
                {{$mhs->daftarppg->angkatan}}
                <small class="text-muted"><i data-feather="chevrons-right"></i> {{$mhs->daftarppg->idjenis == 1 ? 'Prajabatan' : 'Dalam Jabatan'}}</small>
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body row mx-0 align-items-start">
            <div class="avatar bg-light-danger p-50 mr-1">
              <div class="avatar-content">
                <i data-feather="user-check" class="font-medium-5"></i>
              </div>
            </div>
            <div>
              <p class="card-text mb-0">Bidang</p>
              <h5 class="font-weight-bolder mb-0 text-danger">{{$mhs->daftarppg->prodi->nama}}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body row mx-0 align-items-start">
            <div class="avatar bg-light-primary p-50 mr-1">
              <div class="avatar-content">
                <i data-feather="edit" class="font-medium-5"></i>
              </div>
            </div>
            <div>
              <p class="card-text mb-0">Jumlah Simulasi</p>
              <h5 class="font-weight-bolder mb-0 text-primary">{{count($mhs->simulasi)}}</h5>
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

@section('jspage')
<script>
$(document).ready(function() {
 
});
</script>
@stop
