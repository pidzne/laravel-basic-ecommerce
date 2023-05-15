@extends('layouts.error')
@section('title', 'Trang báo lỗi - 404')
@section('content')
<div class="error-content text-center" style="background-image: url('{{ asset('images/gallery/error-bg.jpg') }}')">
    <div class="container">
        <h1 class="error-title">Lỗi 404</h1><!-- End .error-title -->
        <p>Không tìm thấy thông tin hoặc trang web mà bạn yêu cầu</p>
        <a href="javascript:history.back()" class="btn btn-outline-primary-2 btn-minwidth-lg">
            <span>Quay lại</span>
            <i class="icon-long-arrow-right"></i>
        </a>
    </div><!-- End .container -->
</div><!-- End .error-content text-center -->
@endsection