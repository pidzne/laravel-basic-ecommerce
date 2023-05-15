@extends('layouts.home')
@section('title', 'Chi tiết đơn hàng')
@section('css')
<style>
    .imgStyle {
      width: 36px; 
      height: 36px; 
      border-radius: 100%; 
      display: revert; /* ruby-base-container */
    }
    #spanStyle {
      font-size: 14px;
    }
</style>    
@endsection
@section('content')
{{-- @include('layouts.include.home-navbar') --}}
<div class="page-header text-center" style="background-image:  url('{{ asset('images/gallery/homebg2.jpg') }}')">
    <div class="container">
        <h1 class="page-title">Chi tiết đơn hàng</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item">Đơn hàng của bạn</li>
            <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng</li>
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
                          <a href="#" id="tab-address-link" class="nav-link">Chi tiết đơn hàng</a>
                        </li>
                        <li class="nav-item">
                          <a href="{{url('/account-edit/'.Auth::user()->id)}}" id="tab-address-link" class="nav-link">Cập nhật tài khoản</a>
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
                    <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th class="col-md-6"><a href="{{ url('/my-orders') }}" class="btn btn-success">Quay lại</a></th>
                              <th class="col-md-6"></th> 
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>Mã đặt hàng</td>
                              <td>{{ $orderDetails->po_number }}</td>
                            </tr>
                            <tr>
                              <td>Tên người nhận hàng</td>
                              <td>{{$orderDetails->uName}}</td>
                            </tr>
                            <tr>
                              <td>Email</td>
                              <td>{{$orderDetails->uEmail}}</td>
                            </tr>
                            <tr>
                              <td>Số điện thoại</td>
                              <td>{{$orderDetails->uPhone}}</td>
                            </tr>
                            <tr>
                              <td>Ngày mua hàng</td>
                              <td> {{ $orderDetails->order_date ? date('d-m-Y', strtotime($orderDetails->order_date)) : '-' }}</td>           
                            </tr>
                            <tr>
                              <td>Địa chỉ giao hàng</td>
                              <td>{{$orderDetails->order_address}}</td>
                            </tr>
                            {{-- <tr>
                              <td>Phường</td>
                              <td>{{$orderDetails->order_ward}}</td>
                            </tr>
                            <tr>
                              <td>Quận</td>
                              <td>{{$orderDetails->order_district}}</td>
                            </tr>
                            <tr>
                              <td>Thành phố</td>
                              <td>{{$orderDetails->order_city}}</td>
                            </tr>
                            <tr>
                              <td>Phí giao hàng</td>
                              <td>
                                @if ($orderDetails->shipping_cost=='0')
                                  <span>Miễn phí</span>
                                @endif
                              </td>
                            </tr> --}}
                            <tr>
                              <td>Phương thức thanh toán</td>
                              <td>
                                @if ($orderDetails->payment_method=='0')
                                  <span>Nhận hàng rồi mới thanh toán</span>
                                @else
                                  <span>Thanh toán qua Paypal</span>
                                @endif
                              </td>
                            </tr>
                            <tr>
                              <td>Phương thức vận chuyển</td>
                              <td>
                                @if ($orderDetails->order_delivery=='0')
                                  <span>Giao nhanh - 24h</span>
                                @elseif ($orderDetails->order_delivery=='1')
                                  <span>Giao chậm - 7 ngày</span>
                                @elseif ($orderDetails->order_delivery=='2')
                                  <span>Giao tiêu chuẩn - 2 ngày</span>
                                @else
                                  <span></span>
                                @endif
                              </td>
                            </tr>
                            <tr>
                              <td>Trạng thái đơn hàng</td>
                              <td>
                                @if ($orderDetails->order_status == '0')
                                    <span>Đang chờ xử lý</span>
                                @elseif ($orderDetails->order_status == '1')
                                    <span>Đang lấy hàng</span>
                                @elseif ($orderDetails->order_status == '2')
                                    <span>Đang giao hàng</span>
                                @elseif ($orderDetails->order_status == '3')
                                    <span>Đã giao hàng</span>
                                @elseif ($orderDetails->order_status == '7')
                                    <span>Thanh toán online</span>
                                @else
                                    <span>Đã hủy đơn</span>
                                @endif
                            </td>
                            </tr>
                            {{-- <tr>
                              <td>Lý do hủy đơn hàng</td>
                              <td>
                                @if ($orderDetails->order_cancel == '0')
                                    <span>Mua nhầm</span>
                                @elseif ($orderDetails->order_cancel == '1')
                                    <span>Không đủ tiền</span>
                                @elseif ($orderDetails->order_cancel == '2')
                                    <span>Sản phẩm dở quá</span>
                                @elseif ($orderDetails->order_cancel == '3')
                                    <span>Thích hủy thì hủy thôi!</span>
                                @else 
                                    <span>Người dùng mua OK và không hủy đơn</span>
                                @endif
                              </td>
                            </tr> --}}
                          </tbody>
                        </table>
                      </div>
                      <br />
                      <div class="table-responsive">
                        <table class="table text-center">
                          <thead class="thead-dark">
                            <tr>
                              <th>#</th>
                              <th>Hình ảnh</th>
                              <th>Tên sản phẩm</th>
                              <th>Kích cỡ</th>
                              <th>Màu sắc</th>
                              <th>Số lượng mua</th>
                              <th>Giá gốc sản phẩm</th>
                              <th>Giá cần thanh toán</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($ordersProduct as $index => $prod)
                              <tr>
                                <td>{{$prod-> $index = $index + 1}}</td>
                                <td>
                                  <img class="imgStyle" src="{{asset('uploads/prodImg/'.$prod->pImg)}}" alt="pImg" />
                                </td>
                                <td>{{$prod->pName}}</td>
                                <td>{{ $prod->size }}</td>
                                <td>{{ $prod->color }}</td>
                                <td>{{$prod->quantity}}</td>
                                <td class="align-middle">
                                  @if ($prod->prod_selling_price>=1)
                                    {{ number_format($prod_selling_price = ($prod->prod_original_price - ($prod->prod_original_price * $prod->prod_selling_price) / 100)).''.'' }}<sup>đ</sup>
                                  @else
                                    {{ number_format($prod->prod_original_price).''.'' }}<sup>đ</sup>
                                  @endif
                                </td>
                                <td class="align-middle">{{number_format($prod->price).''.''}}<sup>đ</sup></td>
                              </tr>
                            @endforeach
                          </tbody>
                          <tfoot>
                            {{-- @foreach ($ordersPrice as $price) --}}
                              <tr>
                                <td colspan="7"></td>
                                <td>
                                  <span style="font-size: 16px; font-weight: bold;">Tổng tiền: {{number_format($ordersPrice).''.''}}<sup>đ</sup></span>
                                </td>
                              </tr>
                            {{-- @endforeach --}}
                          </tfoot>
                        </table>
                      </div>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .dashboard -->
</div>
</div><!-- End .page-content -->
@endsection
