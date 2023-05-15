@extends('layouts.home')
@section('title', 'Danh sách địa chỉ')
@section('css')
<style>
    .table th.thColor {
        color: #ffffff;
    }
    .spanStyle {
        font-size: 14px;
    }
    .btn-primary {
        background-color: #0275d8;
        border-color: #0275d8;
    }
</style>
@endsection
@section('content')
<div class="page-header text-center" style="background-image:  url('{{ asset('images/gallery/homebg2.jpg') }}')">
    <div class="container">
        <h1 class="page-title">Danh sách địa chỉ<span> {{Auth::user()->name}}</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sổ địa chỉ</li>
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
                            <a href="{{ url('/my-orders') }}" class="nav-link">Đơn hàng của bạn</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/account-edit/'.Auth::user()->id)}}"  class="nav-link">Cập nhật tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/account-chpass') }}" class="nav-link" id="tab-address-link">Thay đổi mật khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="tab-address-link">Sổ địa chỉ</a>
                        </li>
                    </ul>
                </aside>
                <div class="col-md-10 col-lg-10">
                    <a href="{{ route('address.create') }}" class="btn btn-success mb-2">Thêm</a>
                    <table class="table text-center">
                        <thead class="table-dark">
                          <tr>
                            <th class="thColor">ID</th>
                            <th class="thColor">Tên khách hàng</th>
                            <th class="thColor">Số điện thoại</th>
                            <th class="thColor">Số nhà, đường</th>
                            <th class="thColor">Phường / Xã</th>
                            <th class="thColor">Quận / Huyện</th>
                            <th class="thColor">Tỉnh / Thành phố</th>
                            <th class="thColor">Hành động</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($address as $index => $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>{{ $value->phone }}</td>
                                    <td>{{ $value->street }}</td>
                                    <td>{{ $value->ward }}</td>
                                    <td>{{ $value->district }}</td>
                                    <td>{{ $value->city }}</td>
                                    <td>
                                        <a href="{{ route('address.edit', ['id' => $value->id]) }}" class="btn btn-primary" style="margin-right: 1px">Sửa</a>
                                        <a href="{{ route('address.destroy', ['id' => $value->id]) }}" class="btn btn-danger" style="margin-right: 1px">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div>
                        {{ $address->links() }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection