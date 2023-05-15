@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')
<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Chi tiết đơn hàng</h4>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="col-md-6">Thông tin chi tiết</th>
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
                <td>Phường / Xã</td>
                <td>{{$orderDetails->order_ward}}</td>
              </tr>
              <tr>
                <td>Quận / Huyện</td>
                <td>{{$orderDetails->order_district}}</td>
              </tr>
              <tr>
                <td>Tỉnh / Thành phố</td>
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
                    <span>Thanh toán trực tiếp - Nhận hàng rồi mới thanh toán</span>
                  @else
                    <span>Thanh toán qua Paypal</span>
                  @endif
                </td>
              </tr>
              <tr>
                <td>Phương thức giao hàng</td>
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
                      <span">Đang chờ xử lý</span>
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
              <tr>
                @if ($orderDetails->order_cancel == '0')
                  <td>Lý do hủy đơn hàng</td>
                  <td><span>Mua nhầm</span></td>
                @elseif ($orderDetails->order_cancel == '1')
                  <td>Lý do hủy đơn hàng</td>
                  <td><span>Không đủ tiền</span></td>
                @elseif ($orderDetails->order_cancel == '2')
                  <td>Lý do hủy đơn hàng</td>
                  <td><span>Sản phẩm dở quá</span></td>
                @elseif ($orderDetails->order_cancel == '3')
                  <td>Lý do hủy đơn hàng</td>
                  <td><span>Thích hủy thì hủy thôi!</span></td>
                @else 
                  <span></span>
                @endif
              </tr>
            </tbody>
          </table>
        </div>
        <br />
        <div class="table-responsive">
          <table class="table text-center">
            <thead class="table-dark">
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
                  <td class="align-middle">{{$prod-> $index = $index + 1}}</td>
                  <td class="align-middle">
                    <img src="{{asset('uploads/prodImg/'.$prod->pImg)}}" alt="pImg">
                  </td>
                  <td class="align-middle">{{$prod->pName}}</td>
                  <td class="align-middle">
                    <span>{{ $prod->size }}</span>
                  </td>
                  <td class="align-middle">
                    <span>{{ $prod->color }}</span>
                  </td>
                  <td class="align-middle">{{$prod->quantity}}</td>
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
        {{-- <div class="">
          {{ $orderDetails->links() }}
        </div> --}}
      </div>
    </div>
  </div>

</div>
@endsection