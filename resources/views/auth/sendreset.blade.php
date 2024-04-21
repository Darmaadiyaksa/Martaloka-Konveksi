@extends('layouts.masterlogin')

@section('title-head', 'Reset Password')

@section('content')
<div class="content-body">
  <div class="auth-wrapper auth-v1 px-1">
    <div class="auth-inner py-2">
      <div class="card bg-dark mb-0">
        <div class="card-body">
          <a href="javascript:void(0);" class="brand-logo mb-25">
            <img src="{{asset('assets/images/logo.png')}}" height="90" alt="">
          </a>
          <h4 class="card-title font-weight-bold text-center text-white mt-1 mb-50">LPK ASKA BALI</h4>
          <p class="card-text text-center text-white mb-1">Silakan mengisi alamat email yang sudah terdaftar untuk mendapatkan tautan Reset Password</p>
          <form class="auth-login-form mt-2" action="{{ route('ResetPassword') }}" method="POST">
            <div class="form-group">
              <label for="login-email" class="form-label text-white">Username / Email</label>
              <input type="text" class="form-control" id="login-email" name="username" placeholder="Username / Email" aria-describedby="login-email" value="{{ old('email') }}" tabindex="1" autofocus required/>
            </div>
            <button type="submit" class="btn btn-danger btn-block" tabindex="4">Reset Password</button>
            @csrf
          </form>
          <p class="text-center mt-2">
            Sudah Ingat Password?<br>
            <a href="{{route('login')}}"> <i data-feather="chevrons-left"></i> Kembali ke Login </a>
          </p>
          <div class="divider mt-2">
            <div class="divider-text">Sistem Informasi Aademik</div>
          </div>

          <p class="text-center mt-2">
            <span style="color: #fff">&copy; 2024 | <a href="http://patrasdev.co.id">Patras Dev</a></span>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
