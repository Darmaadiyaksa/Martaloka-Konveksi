@extends('layouts.menu')

@section('title-head', 'Dashboard')

@section('content')
<div class="content-wrapper">
  <div class="content-body">
    <div id="user-profile">
      <div class="row">
        <div class="col-12">
          <div class="card profile-header mb-2 pb-xl-3 pb-0">
            <div id="carousel-pause" class="carousel slide carousel-fade" data-ride="carousel" data-pause="hover" data-interval="4000">
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="card-img-top" src="{{asset('assets/images/timeline-1.jpg')}}" alt="">
                </div>
                <div class="carousel-item">
                  <img class="card-img-top" src="{{asset('assets/images/timeline-2.jpg')}}" alt="">
                </div>
                <div class="carousel-item">
                  <img class="card-img-top" src="{{asset('assets/images/timeline-3.jpg')}}" alt="">
                </div>
              </div>
            </div>
            <div class="position-relative py-xl-0 py-1">
              <div class="profile-img-container d-flex align-items-center">
                <div class="profile-img d-none d-xl-block">
                  <img src="{{asset('assets/images/avatar-s-2.jpg')}}" class="rounded img-fluid" alt="" />
                </div>
                <div class="profile-title ml-2">
                  <h2 class="text-white">Selamat Datang</h2>
                  <p class="text-white">LPK ASKA BALI</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row match-height">
      <div class="col-lg-3">
        <div class="card">
          <div class="card-body text-center">
            <div class="avatar bg-danger p-50 mb-1">
              <div class="avatar-content">
                <i data-feather="pocket" class="font-medium-5"></i>
              </div>
            </div>
            <p class="card-text mb-50">Tanggal Pendaftaran</p>
            <h2 class="font-weight-bolder text-danger mt-25">{{(new \App\Helper)->tanggal($data->tgllahir)}}</h2>
          </div>
        </div>
      </div>

      <div class="col-lg-9">
        <div class="card">
          <div class="card-body p-1">
            <div class="alert alert-secondary mb-0" role="alert">
              <h4 class="alert-heading"><i data-feather="info"></i> INFORMASI</h4>
              <div class="alert-body">
                <ul class="pl-1 mb-0">
                  <li>Lengkapi <a href="{{route('biodata')}}">Biodata</a> Anda dan pastikan semua isian telah terisi dengan data yang benar dan valid.</li>
                  <li>Buka menu <a href="#">Pendaftaran</a>.</li>
                  <li>Lakukan <a href="#">pembayaran</a> sesuai dengan tagihan yang tertera.</li>
                  <li>Ikutilah semua proses sesuai dengan jadwal yang ditentukan.</li>
                </ul>
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

@section('jspage')
<script>
$(document).ready(function() {

});
</script>
@stop
