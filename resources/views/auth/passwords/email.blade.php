@extends('layouts.app')
@section('title', 'Thay đổi mật khẩu')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
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
      <div class="card reset-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="{{ asset('https://images.unsplash.com/photo-1575908539614-ff89490f4a78?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1033&q=80') }}" alt="login" class="reset-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <p class="reset-card-description">{{ __('Nhập địa chỉ Email') }}</p>
                <form action="{{ route('password.email') }}" method="POST">
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
                <button type="submit" class="btn btn-primary">{{ __('Gửi link thay đổi mật khẩu') }}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</main>
@endsection
