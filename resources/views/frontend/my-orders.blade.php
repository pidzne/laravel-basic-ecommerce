@extends('layouts.home')
@section('title', 'Đơn hàng của bạn')
@section('css')
    <style>
        .table th.thColor {
            color: #ffffff;
        }
        .spanStyle {
            font-size: 14px;
        }
    </style>
@endsection
@section('content')
{{-- @include('layouts.include.home-navbar') --}}
<div class="page-header text-center" style="background-image:  url('{{ asset('images/gallery/homebg2.jpg') }}')">

    <div class="container">
        <h1 class="page-title">Đơn hàng của <span> {{Auth::user()->name}}</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Đơn hàng của bạn</li>
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
                            <a href="#" class="nav-link">Đơn hàng của bạn</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/account-edit/'.Auth::user()->id)}}"  class="nav-link">Cập nhật tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/account-chpass') }}" class="nav-link" id="tab-address-link">Thay đổi mật khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('address.index') }}" class="nav-link" id="tab-address-link">Sổ địa chỉ</a>
                        </li>
                    </ul>
                </aside>
                <div class="col-md-10 col-lg-10">
                    <table class="table text-center">
                        <thead class="table-dark">
                          <tr>
                            <th class="thColor">#</th>
                            <th class="thColor">Mã đặt hàng</th>
                            <th class="thColor">Tên người mua hàng</th>
                            <th class="thColor">Ngày mua hàng</th>
                            <th class="thColor">Trạng thái</th>
                            <th class="thColor">Hành động</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordersInfo as $index => $items)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $items->ordersNo }}</td>
                                    <td>{{ $items->userName }}</td>
                                    <td>{{ $items->ordersDate ? date('d-m-Y', strtotime($items->ordersDate)) : '-' }}</td>
                                    <td>
                                      @if ($items->oStatus=='0')
                                        <span class="badge badge-primary spanStyle">Đang chờ xử lý</span>
                                      @elseif ($items->oStatus=='1')
                                        <span class="badge badge-warning spanStyle">Đang lấy hàng</span>
                                      @elseif ($items->oStatus=='2')
                                        <span class="badge badge-info spanStyle">Đang giao hàng</span>
                                      @elseif ($items->oStatus=='3')
                                        <span class="badge badge-success spanStyle">Đã giao hàng</span>
                                      @elseif ($items->oStatus=='7')
                                        <span class="badge badge-dark spanStyle">Thanh toán online</span>
                                      @else
                                        <span class="badge badge-danger spanStyle">Đã hủy đơn</span>
                                      @endif
                                    </td>
                                    <td>
                                       @if ($items->oStatus=='3')
                                            <a href="{{url('/detail-orders/'.$items->id)}}" class="btn btn-warning" style="margin-right: 1px">Xem</a>
                                       @elseif ($items->oStatus=='5')
                                            <a href="{{url('/detail-orders/'.$items->id)}}" class="btn btn-warning" style="margin-right: 1px">Xem</a>
                                        @elseif ($items->oStatus=='7')
                                            <a href="{{url('/detail-orders/'.$items->id)}}" class="btn btn-warning" style="margin-right: 1px">Xem</a>
                                       @else
                                            <a href="{{url('/detail-orders/'.$items->id)}}" class="btn btn-warning" style="margin-right: 1px">Xem</a>
                                            <a href="{{url('/edit-orders/'.$items->id)}}" class="btn btn-danger" style="margin-right: 1px">Hủy</a>
                                       @endif
                                    </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div>
                        {{ $ordersInfo->links() }}
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
