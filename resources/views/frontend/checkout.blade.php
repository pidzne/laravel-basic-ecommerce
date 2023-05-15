@extends('layouts.home')
@section('title', 'Thanh toán')
@section('css')
<style>
    input#inputButton {
        appearance: none;
        border-radius: 50%;
        width: 16px;
        height: 16px;
        border: 2px solid #999;
        transition: 0.2s all linear;
        margin-right: 5px;
        position: relative;
        top: 4px;
    }

    input#inputButton:checked {
        border: 6px solid black;
    }

    .btn-dark {
        height: 45px;
        font-size: 16px;
    }
</style>
@endsection
@section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('images/gallery/homebg2.jpg') }}')">
    <div class="container">
        <h1 class="page-title">Thanh toán<span></span></h1>
    </div>
</div>
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="/">Giỏ hàng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
        </ol>
    </div>
</nav>

<div class="page-content">
    <div class="checkout">
        <div class="container">
            <form action="{{url('/place-order')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="checkout-title">Thông tin thanh toán</h2><!-- End .checkout-title -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Tên người nhận *</label>
                                @if ($address)
                                <select class="form-control name" id="exampleFormControlSelect1" name="order_name">
                                    <option selected disabled value="">Chọn tên người nhận</option>
                                    @foreach ($address as $value)
                                        <option value="{{$value->name}}" selected>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @else
                                    <input type="text" class="form-control name" name="order_name" value="{{Auth::user()->name}}" readonly>
                                @endif
                               
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <label>Số điện thoại *</label>
                                @if ($address)
                                <select class="form-control phone" id="exampleFormControlSelect1" name="order_phone">
                                    <option selected disabled value="">Chọn số điện thoại</option>
                                    @foreach ($address as $value)
                                        <option value="{{$value->phone}}" selected>{{ $value->phone }}</option>
                                    @endforeach
                                </select>
                                @else
                                    <input type="text" class="form-control phone" name="order_phone" value="{{Auth::user()->phone}}" readonly>
                                @endif
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->

                        <label>Email liên hệ *</label>
                        <input type="text" class="form-control email email123" name="order_email" value="{{Auth::user()->email}}" readonly>


                        <label>Địa chỉ</label>
                        <select class="form-control address" id="exampleFormControlSelect1" name="order_address">
                            <option selected disabled value="">Chọn 1 địa chỉ</option>
                          @foreach($address as $value)
                              <option value="{{$value->street. ', ' .$value->ward. ', ' .$value->district. ', ' .$value->city}}" selected>{{$value->street. ', ' .$value->ward. ', ' .$value->district. ', ' .$value->city}}</option>
                          @endforeach
                        </select>

                        <label>Phương thức vận chuyển</label>
                        <select class="form-control delivery" id="exampleFormControlSelect1" name="order_delivery">
                            <option selected disabled value="">Chọn 1</option>
                            <option value="0">Giao nhanh - 24h</option>
                            <option value="1">Giao chậm - 7 ngày</option>
                            <option value="2" selected>Giao tiêu chuẩn - 2 ngày</option>
                        </select>

                        {{-- <label>Địa chỉ</label>
                        <input type="text" class="form-control address" name="order_address" placeholder="Số nhà, ngõ, tên đường">
                        <span class="text-danger">@error('order_address'){{ $message }}@enderror</span>

                        <label>Tỉnh / Thành phố *</label>
                        <select class="form-control city" name="order_city" id="city">
                            <option value="" selected>Chọn Tỉnh / Thành phố</option>     
                        </select>
                        <span class="text-danger">@error('order_city'){{ $message }}@enderror</span>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>Quận / Huyện *</label>
                                <select class="form-control district" name="order_district" id="district">
                                    <option value="" selected>Chọn Quận / Huyện</option>     
                                </select>
                                <span class="text-danger">@error('order_district'){{ $message }}@enderror</span>
                            </div>

                            <div class="col-sm-6">
                                <label>Phường / Xã *</label>
                                <select class="form-control ward" name="order_ward" id="ward">
                                    <option value="" selected>Chọn Phường / Xã</option> 
                                </select>
                                <span class="text-danger">@error('order_ward'){{ $message }}@enderror</span>    
                            </div>
                        </div><!-- End .row --> --}}

                        <label>Ghi chú</label>
                        <textarea class="form-control message message123" cols="30" rows="4" placeholder="" name="order_message"></textarea>

                        <a href="{{ route('address.create') }}" class="btn btn-primary">Thêm địa chỉ</a>
                    </div>
            
                    <aside class="col-lg-4">
                        <div class="summary">
                            <h3 class="summary-title">Đơn hàng của bạn</h3><!-- End .summary-title -->
                            @php
                            $content = Cart::content()
                            @endphp
                            <table class="table table-reponsive">
                                <thead class="text-center">
                                    <tr>
                                        <th class="col-4">Sản phẩm</th>
                                        <th class="col-1"></th>
                                        <th class="col-1">SL</th>
                                        <th class="col-1">Size</th>
                                        <th class="col-2">Màu</th>
                                        <th class="col-3">Giá tiền</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($content as $cart)
                                    <tr class="text-center">
                                        <td>{{$cart->name}}</td>
                                        <td><img src="{{ url('uploads/prodImg/'.$cart->options->image) }}" alt=""></td>
                                        <td>{{$cart->qty}}</td>
                                        <td>
                                            @if ($cart->options->size)
                                               <span>{{ $cart->options->size }}</span>
                                            @else
                                                <span></span> 
                                            @endif
                                        </td>
                                        <td>
                                            @if ($cart->options->color)
                                               <span>{{ $cart->options->color }}</span>
                                            @else
                                                <span></span> 
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                            $subtotal = $cart->price * $cart->qty;
                                            echo number_format($subtotal).' '.' đ';
                                            @endphp
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="summary-subtotal">
                                        <td class="text-left">Tạm tính:</td>
                                        <td colspan="5" class="text-right">{{Cart::priceTotal(0,'.','.').''.' đ'}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    {{-- <tr>
                                        <td class="text-left">Phí giao hàng</td>
                                        <td colspan="5" class="text-right">
                                            <span>Miễn phí</span>
                                            <input type="hidden" name="shipping_cost" value="0" class="shipcost" />
                                        </td>
                                    </tr> --}}
                                    <tr class="summary-total">
                                        <td class="text-left">Tổng tiền:</td>
                                        <td colspan="5" class="text-right">{{Cart::total(0,'.','.').''.' đ'}}</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->
                            <div class="accordion-summary" id="accordion-payment">
                                <div class="card">
                                    <div class="card-header" id="heading-3">
                                        <h3 class="summary-title mt-2">Chọn hình thức thanh toán</h3>
                                        <h2 class="card-title">
                                            <input id="inputButton" type="radio" class="collapsed" role="button" data-toggle="collapse" href="#collapse-3"
                                                aria-expanded="false" aria-controls="collapse-3" name="payment_method" value="0">
                                                Thanh toán trực tiếp
                                            </input>   
                                        </h2> 
                                    </div><!-- End .card-header -->
                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                        data-parent="#accordion-payment">
                                        <div class="card-body">
                                            Nhận hàng rồi mới thanh toán tiền mặt
                                        </div><!-- End .card-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .card -->
                            </div><!-- End .accordion -->
                            <button type="submit" class="btn btn-dark btn-order btn-block mb-2">
                                <span class="btn-text">Mua ngay</span>
                                <span class="btn-hover-text">Mua ngay</span>
                            </button>
                            <div id="paypal-button-container"></div>
                        </div><!-- End .summary -->
                    </aside>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="{{ asset('customs/js/checkout.js') }}"></script>

<script src="https://www.paypal.com/sdk/js?client-id=ARjx8s8Z5MJi7fYWHCTES5L-AFERBhjHtvNBm1FJ_b2-D6GEnbKnG2NKP9Mz3vWT9WmDeaIOLPlrg26E"></script>
<script>
    // doanFPL@1
paypal
.Buttons({
    // Sets up the transaction when a payment button is clicked
    createOrder: (data, actions) => {
        return actions.order.create({
            purchase_units: [
                {
                    amount: {
                        value: "{{Cart::totalFloat()}}", // Can also reference a variable or function
                    },
                },
            ],
        });
    },
    // Finalize the transaction after payer approval
    onApprove: (data, actions) => {
        return actions.order.capture().then(function (orderData) {
            // Successful capture! For dev/demo purposes:
            console.log(
                "Capture result",
                orderData,
                JSON.stringify(orderData, null, 2)
            );
            const transaction =
                orderData.purchase_units[0].payments.captures[0];
            //   alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);

            var order_name = $(".name").val();
            var order_phone = $(".phone").val();
            var order_email = $(".email123").val();
            var order_address = $(".address").val();
            var order_message = $(".message123").val();
            var order_delivery = $(".delivery").val();

            $.ajax({
                method: "POST",
                url: "{{ url('/place-order') }}",
                data: {
                    order_name: order_name,
                    order_phone: order_phone,
                    order_email: order_email,
                    order_address: order_address,
                    order_message: order_message,
                    order_delivery: order_delivery,
                    payment_method: 1,
                    order_id: orderData.id,
                    _token: "{!! csrf_token() !!}",
                },
                success: function (response) {
                    window.location.href = "{{ url('/success-order') }}";
                },
                error: function (data) {
                    alert("Có lỗi xảy ra, vui lòng thử lại sau!");
                },
            });

            // Or go to another URL:  actions.redirect('thank_you.html');
        });
    },
})
.render("#paypal-button-container");

</script>


@endsection