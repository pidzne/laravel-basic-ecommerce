@extends('layouts.app')
@section('title', 'Lấy lại lại mật khẩu')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/reset-update.css') }}">
    <style>
        .invalid-feedback {
            margin-top: -10px !important;
            margin-bottom: 15px !important;
        }
    </style>
@endsection
@section('content')

<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card reset-update-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{ asset('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80') }}" alt="login" class="reset-update-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <p class="reset-update-card-description">{{ __('Nhập thông tin') }}</p>
                <form method="POST" action="{{ route('password.update') }}">
                @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="input-group"> 
                        <div class="input-group-prepend">
                        <span class="input-group-text" style="margin-bottom: 20px;" id="basic-addon1">
                            <i class="fas fa-envelope"></i>    
                        </span>
                        </div>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus placeholder="Email">  
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group"> 
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="margin-bottom: 20px;" id="basic-addon1">
                            <i class="fas fa-lock"></i>    
                        </span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Mật khẩu">                       
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="input-group"> 
                        <div class="input-group-prepend">
                          <span class="input-group-text" style="margin-bottom: 20px;" id="basic-addon1">
                            <i class="fas fa-check"></i>    
                        </span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Nhập lại mật khẩu">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Reset ngay') }}</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection
