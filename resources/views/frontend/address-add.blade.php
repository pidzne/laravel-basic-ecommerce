@extends('layouts.home')
@section('title', 'Thêm mới địa chỉ')
@section('css')
    <style>
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-primary {
            background-color: #0275d8;
            border-color: #0275d8;
        }

        /* .btn-secondary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
        } */
    </style>
@endsection
@section('content')
<div class="page-header text-center" style="background-image:  url('{{ asset('images/gallery/homebg2.jpg') }}')">
    <div class="container">
        <h1 class="page-title">Thêm mới địa chỉ<span> {{Auth::user()->name}}</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới địa chỉ</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="dashboard">
        <div class="container">
            <div class="row">
                <aside class="col-md-2 col-lg-2">
                    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                        <li class="nav-item">
                            <a href="{{url('/account-detail')}}" class="nav-link">Thông tin tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/my-orders')}}" class="nav-link">Đơn hàng của bạn</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Cập nhật tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/account-chpass') }}" class="nav-link" id="tab-address-link">Thay đổi mật khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="tab-address-link">Thêm mới địa chỉ</a>
                        </li>
                    </ul>
                </aside>

               <div class="col-md-10 col-lg-10">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                        <form action="{{ route('address.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="checkout-title">Thêm mới địa chỉ</h2>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Tên *</label>
                                            <input type="text" class="form-control" name="name" placeholder="Điền tên">
                                        </div>
        
                                        <div class="col-sm-6">
                                            <label>Số điện thoại *</label>
                                            <input type="text" class="form-control" name="phone" placeholder="Điền số điện thoại">
                                        </div>
                                    </div>
        
                                    <label>Số nhà, đường *</label>
                                    <input type="text" class="form-control" name="street" placeholder="Điền số nhà, đường">

                                    <label>Tỉnh / Thành phố *</label>
                                    <select name="city" id="city" class="form-control">
                                        <option value="" selected>Chọn Tỉnh / Thành phố</option>
                                    </select>
        
                                    <label>Quận / Huyện *</label>
                                    <select name="district" id="district" class="form-control">
                                        <option value="" selected>Chọn Quận / Huyện</option>
                                    </select>

                                    <label>Phường / Xã *</label>
                                    <select name="ward" id="ward" class="form-control">
                                        <option value="" selected>Chọn Phường / Xã</option>
                                    </select>
                            </div>
                            <button type="submit" class="btn btn-primary ml-3">Thêm mới</button>
                            <a href="{{ route('address.index') }}" class="btn btn-secondary ml-3">Quay lại</a>
                        </div><!-- .End .tab-pane -->
                    </form>
                    </div>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="{{ asset('customs/js/checkout.js') }}"></script>
@endsection