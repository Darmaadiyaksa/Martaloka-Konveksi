@extends('layouts.masterlogin')

@section('title-head', 'Login')

@section('content')
<div class="content-body">
  <div class="auth-wrapper auth-v1 px-1">
    <div class="auth-inner py-2">
      <div class="card bg-dark mb-0">
        <div class="card-body">
          <a href="#" class="brand-logo mb-25">
            <img src="{{asset('assets/images/logo.png')}}" height="90" alt="">
          </a>
          <h4 class="card-title font-weight-bold text-center text-white mt-1 mb-50">LPK ASKA BALI</h4>
          <p class="card-text text-center text-white mb-1">Sistem Informasi Akademik</p>
          <div class="divider mt-2">
            <div class="divider-text text-white">Silakan Login</div>
          </div>
          <form class="auth-login-form mt-2" action="{{route('login')}}" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
              <label class="form-label text-white" for="username">Username</label>
              <input class="form-control mb-25" id="usernamel" type="text" name="username" aria-describedby="username" autofocus="" tabindex="1" required>
              @if ($errors->has('username'))
                <span class="text-danger my-50">
                  <center>{{ $errors->first('username') }}</center>
                </span>
              @endif
            </div>
            <div class="form-group">
              <div class="d-flex justify-content-between">
                <label class="text-white" for="password">Password</label>
                @if (Route::has('password.request'))
                <a href="{{route('reset')}}" class="text-info"><small>Lupa Password?</small></a>
                @endif
              </div>
              <div class="input-group input-group-merge form-password-toggle">
                <input class="form-control form-control-merge" id="password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="2" required>
                <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
              </div>
              @if ($errors->has('password'))
                <span class="text-danger my-50">
                  <center>{{ $errors->first('password') }}</center>
                </span>
              @endif
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                <label class="custom-control-label text-white" for="remember-me"> Ingat Saya</label>
              </div>
            </div>
            <button class="btn btn-danger btn-block" tabindex="4">Login</button>
          </form>

          <p class="text-center mt-2">
            <span style="color: #fff">&copy; 2024 | <a href="http://patrasdev.co.id">Patras Dev</a></span>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
