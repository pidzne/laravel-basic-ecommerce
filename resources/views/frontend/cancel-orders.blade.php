@extends('layouts.home')
@section('title', 'Hủy đơn hàng')
@section('css')
    <style>
        .table th.thColor {
            color: #ffffff;
        }
        .spanStyle {
            font-size: 12px;
        }
        .selectBtn {
            font-size: 20px;
        }
    </style>
@endsection
@section('content')
{{-- @include('layouts.include.home-navbar') --}}
<div class="page-header text-center" style="background-image:  url('{{ asset('images/gallery/homebg2.jpg') }}')">

    <div class="container">
        <h1 class="page-title">Hủy đơn hàng</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hủy đơn hàng</li>
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
                            <a href="#" class="nav-link">Hủy đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/account-edit/'.Auth::user()->id)}}"  class="nav-link">Cập nhật tài khoản</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" id="tab-address-link">Thay đổi mật khẩu</a>
                        </li> --}}
                    </ul>
                </aside>
                <div class="col-md-10 col-lg-10">
                    <div class="card">
                        <div class="card-body">
                          <h4 class="card-title mb-2">Lý do hủy đơn hàng</h4> 
                              <form action="{{url('/cancel-orders/'.$orders->id)}}" method="POST">
                                  {{ csrf_field() }}
                                  @method('PATCH')
                                  <div class="form-group">
                                  <select name="order_cancel" class="btn btn-primary" class="selectBtn">
                                        <option value="" selected disabled>Chọn 1</option>
                                        <option value="0">Mua nhầm</option>
                                        <option value="1">Không đủ tiền</option>
                                        <option value="2">Sản phẩm dở quá</option>
                                        <option value="3">Thích hủy thì hủy thôi!</option>
                                  </select>
                                  <span class="text-danger">@error('order_cancel'){{ $message }}@enderror</span>
                                  <input type="hidden" name="order_status" value="5">
                                  <button type="submit" class="btn btn-success">Hủy</button>
                                  </div>
                              </form>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
