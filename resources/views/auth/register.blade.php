@extends('layouts.app')
@section('title', 'Đăng ký')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <style>
      #image {
        border: 1px solid #d5dae2;
        padding: 5px 5px;
        margin-bottom: 0px;
        min-height: 5px;
        font-size: 13px;
        line-height: 3;
        font-weight: normal;
        width: 100%
      }
      #aText {
        text-decoration: none;
      }
      .input-group-prepend {
        width: 7%;
      }
      .invalid-feedback {
        margin-top: -10px !important;
        margin-bottom: 15px !important;
      }
      .spanStyleCheck {
        color: #f00;
        margin-top: -10px; 
      }
    </style>
@endsection
@section('content')

<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
  <div class="container">
    <div class="card register-card">
      <div class="row no-gutters">
        <div class="col-md-5">
          <img src="{{ asset('https://images.unsplash.com/photo-1670520616517-f5901991e48c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80') }}" alt="login" class="register-card-img">
        </div>
        <div class="col-md-7">
          <div class="card-body">
            <p class="register-card-description">{{ __('Tạo tài khoản') }}</p>
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
              @csrf
                <div class="input-group"> 
                  <label for="name" class="sr-only">{{ __('Name') }}</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-bottom: 20px;" id="basic-addon1">
                      <i class="fas fa-user"></i>    
                  </span>
                  </div>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Tên">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-group"> 
                  <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-bottom: 20px;" id="basic-addon1">
                      <i class="fas fa-envelope"></i>    
                  </span>
                  </div>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>

                <div class="input-group password-group">
                  <label for="password" class="sr-only">{{ __('Password') }}</label>
                  <div class="input-group-prepend">
                    <span style="margin-bottom: 20px;" class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                  </div>
                  <input id="password" type="password" class="form-control password-box @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Mật khẩu">
                  <div class="input-group-append">
                    <span class="input-group-text password-visibility" style="margin-bottom: 20px;">
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

                <div class="input-group password-group">
                  <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>
                  <div class="input-group-prepend">
                    <span style="margin-bottom: 20px;" class="input-group-text" id="basic-addon1"><i class="fas fa-check-square"></i></span>
                  </div>
                  <input id="password-confirm" type="password" class="form-control password-box @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" placeholder="Nhập lại mật khẩu"  value="{{ old('password_confirmation') }}">
                  <div class="input-group-append">
                    <span class="input-group-text password-visibility" style="margin-bottom: 20px;">
                      <i class="fas fa-eye" id="show_eye"></i>
                      <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                    </span>
                  </div>
                  @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
               
                <div class="input-group"> 
                  <label for="phone" class="sr-only">{{ __('Phone') }}</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-bottom: 20px;" id="basic-addon1">
                      <i class="fas fa-phone-alt"></i>
                  </span>
                  </div>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Số điện thoại" value="{{ old('phone') }}">
                  @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="input-group"> 
                  <label for="gender" class="sr-only">{{ __('Gender') }}</label>
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="margin-bottom: 20px;" id="basic-addon1">
                      <i class="fas fa-venus-mars"></i>
                  </span>
                  </div>
                  <select class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}">
                    <option value="" selected disabled>Chọn giới tính</option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                  </select>
                  @error('gender')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group mb-4">
                  <label for="image" class="sr-only">{{ __('Hình ảnh') }}</label>
                  <input id="image" type="file" name="image" placeholder="Hình ảnh" class=" @error('image') is-invalid @enderror" value="{{ old('image') }}">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" role="button" value=" {{ __('Đăng ký') }}">
                <p class="text-center">Hoặc</p>
                <a href="{{ route('facebook.redirect') }}"  style="background-color: #3b5998" class="btn btn-primary btn-block mb-3 text-center"><i class="fab fa-facebook"></i><span class="ml-2">Đăng nhập với Facebook</span></a>
                <a href="{{ route('google.redirect') }}" class="btn btn-danger btn-block mb-3 text-center"><i class="fab fa-google"></i><span class="ml-2">Đăng nhập với Google</span></a>
              </form>
              <p class="register-card-footer-text">Đã có tài khoản? <a href="{{ route('login') }}" class="text-reset btn btn-warning" id="aText">Đăng nhập ngay!</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection

@section('scripts')
  <script>
    $(function() {
    $('.password-group').find('.password-box').each(function(index, input) {
        var $input = $(input);
        $input.parent().find('.password-visibility').click(function() {
            var change = "";
            if ($(this).find('i').hasClass('fa-eye')) {
                $(this).find('i').removeClass('fa-eye')
                $(this).find('i').addClass('fa-eye-slash')
                change = "text";
            } else {
                $(this).find('i').removeClass('fa-eye-slash')
                $(this).find('i').addClass('fa-eye')
                change = "password";
            }
            var rep = $("<input type='" + change + "' />")
                .attr('id', $input.attr('id'))
                .attr('name', $input.attr('name'))
                .attr('class', $input.attr('class'))
                .val($input.val())
                .insertBefore($input);
            $input.remove();
            $input = rep;
        }).insertAfter($input);
    });
});
  </script>
@endsection
