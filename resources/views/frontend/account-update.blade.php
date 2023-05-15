@extends('layouts.home')
@section('title', 'Cập nhật tài khoản')
@section('content')
{{-- @include('layouts.include.home-navbar') --}}
<div class="page-header text-center" style="background-image:  url('{{ asset('images/gallery/homebg2.jpg') }}')">

    <div class="container">
        <h1 class="page-title">Cập nhật thông tin người dùng <span> {{Auth::user()->name}}</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cập nhật tài khoản</li>
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
                            <a href="{{ route('address.index') }}" class="nav-link" id="tab-address-link">Sổ địa chỉ</a>
                        </li>
                    </ul>
                </aside><!-- End .col-lg-3 -->

               <div class="col-md-10 col-lg-10">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                        <form action="{{ url('/account-update/'.Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Cập nhật tài khoản</h2><!-- End .checkout-title -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Tên *</label>
                                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="name">
                                        </div><!-- End .col-sm-6 -->
        
                                        <div class="col-sm-6">
                                            <label>Giới tính *</label>
                                            <select class="form-control" name="gender">
                                                <option value="0" {{Auth::user()->gender == 0 ? 'selected' : ''}}>Nữ</option>
                                                <option value="1" {{Auth::user()->gender == 1 ? 'selected' : ''}}>Nam</option>
                                            </select>
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
        
                                    <label>Email *</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email">
        
                                    <label>Số điện thoại *</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone">

                                    <label>Hình mới *</label>
                                    <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-lg-3">
                                <h2 class="checkout-title">Hình cũ</h2><!-- End .checkout-title -->
                                <img src="{{asset('uploads/userImg/'.Auth::user()->image)}}" style="width: 100%; height: 65%" />
                            </div>
                            <button type="submit" class="btn btn-success ml-3">Cập nhật</button>
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
