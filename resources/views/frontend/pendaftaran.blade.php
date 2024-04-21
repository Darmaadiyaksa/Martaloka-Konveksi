@extends('layouts.master')

@section('title-head', 'Pendaftaran')

@section('content')
  <section class="breadcrumb-area">
    <div class="breadcrumb-area-bg" style="background-image: url({{asset('web-assets/images/banner/banner-2.jpg')}});"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="inner-content">
            <div class="title" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
              <h2>Pendaftaran</h2>
            </div>
            <div class="breadcrumb-menu" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
              <ul>
                <li><a href="{{route('welcome')}}">Beranda</a></li>
                <li class="active">Pendaftaran</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="intro-style1-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sec-title">
            <h2>User Account</h2>
            <div class="sub-title">
              <p>Lengkapi isian pada form registrasi untuk mendapatkan User Account<br>Anda dapat melanjutkan ke proses pendaftaran setelah memiliki User Account</p>
            </div>
          </div>
        </div>
        <div class="add-comment-box mt-0">
          <form id="add-comment-form" method="post" action="{{route('pendaftaran.store')}}">
            <div class="row">
              <div class="col-xl-12">  
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-box">
                      <input type="text" id="name" name="nama" placeholder="Nama Lengkap" required="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box">
                      <input type="email" id="email" name="email" placeholder="Alamat E-Mail" required="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box">
                      <input type="number" id="nik" name="nik" placeholder="Nomor KTP / NIK" required="">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-box">
                      <input type="number" id="telpon" name="telpon" placeholder="Nomor Telepon" required="">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="captcha row align-items-center m-0">
                      <span class="imgCaptcha">{!! captcha_img()!!}</span>
                      <button type="button" class="btn btn-danger btnCaptcha ml-1">
                        <i class="fa fa-refresh"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="input-box">
                      <input type="text" class="{{ $errors->has('captcha') ? 'is-invalid' : '' }}" name="captcha" required placeholder="Isi Kode Captcha">
                    </div>
                    
                    @if ($errors->has('captcha'))
                      <span class="help-block">
                        <p class="text-danger"><b>{{ $errors->first('captcha') }}</b></p>
                      </span>
                    @endif
                  </div>
                  <div class="col-md-6">
                    <div class="button-box pt-0">
                      <button class="btn-one" type="submit"><span class="txt">Buat User</span>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="mt-20">
                  <small>Sudah memiliki User? Klik <a href="{{ route('login') }}" class="text-danger"><b>di sini</b></a> untuk Login</small>
                </div>
              </div>
            </div>
            @csrf
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('page-js')
<script>
  $('.btnCaptcha').click(function(){
    $.ajax({
      type:"get",
      url :"{{Route('refreshcaptcha')}}",
      beforeSend: function (xhr, setting) {
        $('.btnCaptcha>i').addClass('fa-spin');
      },
      success: function(data){
        $('.captcha span').html (data.captcha)
        $('.btnCaptcha>i').removeClass('fa-spin');
      }
    })
  })
</script>
@endsection
