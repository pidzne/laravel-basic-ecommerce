@extends('layouts.app')
@section('title', 'Đăng nhập')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        #aText {
            text-decoration: none;
            color: #000;
        }
        .invalid-feedback {
            margin-top: -10px !important;
            margin-bottom: 15px !important;
        }
    </style>
@endsection
@section('content')

<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{ asset('https://images.unsplash.com/photo-1658509756778-cf30246a13a9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80') }}" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <p class="login-card-description">{{ __('Kết nối với iSky') }}</p>
              <form action="{{ route('login') }}" method="POST">
                @csrf
                  <div class="input-group"> 
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="margin-bottom: 20px;" id="basic-addon1">
                        <i class="fas fa-envelope"></i>
                    </span>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror  
                </div>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span style="margin-bottom: 20px;" class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Mật khẩu">
                    <div class="input-group-append">
                      <span class="input-group-text" onclick="password_show_hide();" style="margin-bottom: 20px;">
                        <i class="fas fa-eye" id="show_eye"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                      </span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Ghi nhớ tài khoản') }}
                            </label>
                    </div>
                </div>
                  <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" role="button" value=" {{ __('Đăng nhập') }}">
                  <p class="text-center">Hoặc</p>
                  <a href="{{ route('facebook.redirect') }}"  style="background-color: #3b5998" class="btn btn-primary btn-block mb-3 text-center"><i class="fab fa-facebook"></i><span class="ml-2">Đăng nhập với Facebook</span></a>
                  <a href="{{ route('google.redirect') }}" class="btn btn-danger btn-block mb-3 text-center"><i class="fab fa-google"></i><span class="ml-2">Đăng nhập với Google</span></a>
                </form>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password-link">{{ __('Quên mật khẩu?') }}</a>
                @endif
                <p class="login-card-footer-text">Chưa có tài khoản? <a href="{{ route('register') }}" class="text-reset btn btn-warning" id="aText">Đăng ký tại đây!</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection

@section('scripts')
   <script>
    function password_show_hide() {
  var x = document.getElementById("password");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");
  if (x.type === "password") {
    x.type = "text";
    show_eye.style.display = "none";
    hide_eye.style.display = "block";
  } else {
    x.type = "password";
    show_eye.style.display = "block";
    hide_eye.style.display = "none";
  }
}
   </script>
@endsection