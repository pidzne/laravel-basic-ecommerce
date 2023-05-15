@extends('layouts.home')
@section('title', 'Giỏ hàng')
@section('css')
    <style>
        table.table-summary .summary-total td {
            color: #f00 !important;
        }
        .table .price-col {
            width: 120px !important;
        }
    </style>
@endsection
@section('content')
    <div class="page-header text-center" style="background-image: url('{{ asset('images/gallery/homebg2.jpg') }}')">
        
        <div class="container">
            <h1 class="page-title">Giỏ hàng
                <span>
                    @if (Auth::user())
                        <span>{{Auth::user()->name}}</span>
                    @endif
                </span>
            </h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Shop</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </div><!-- End .container -->
    </nav>
  

    <div class="container">
        <div class="cart-discount">
            <a href="{{url('/')}}" class="btn btn-dark btn-block mb-3"><span>TIẾP TỤC MUA SẢN PHẨM</span></a>
        </div>
    </div>

    @php
        $content = Cart::content()
    @endphp
    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        @if (count(Cart::content()))
                        <table class="table table-mobile text-center">
                            <thead>
                                <tr>
                                    <th class="col-3">Sản phẩm</th>
                                    <th class="col-2">Giá</th>
                                    <th class="col-1">Size</th>
                                    <th class="col-1">Màu</th>
                                    <th class="col-1">Số lượng</th>
                                    <th class="col-2">Tổng giá</th>
                                    <th class="col-1">Hành động</th>
                                    <th class="col-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $cart)
                                    <tr>
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="#">
                                                        <img src="{{ asset('uploads/prodImg/'.$cart->options->image) }}"
                                                            alt="Product image">
                                                    </a>
                                                </figure>

                                                <h3 class="product-title">
                                                    <a href="#">{{$cart->name}}</a>
                                                </h3><!-- End .product-title -->
                                            </div><!-- End .product -->
                                        </td>
                                        <td class="price-col">{{ number_format($cart->price).''.''}} <sup>đ</sup></td>
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

                                        <form action="{{url('/update-cart')}}" method="POST">
                                            {{ csrf_field() }}
                                        <td class="quantity-col"> 
                                                <div class="cart-product-quantity">
                                                    <input type="number" class="form-control" value="{{$cart->qty}}" min="1"
                                                        max="1000" step="1" data-decimals="0" required name="cartQty">
                                                    <input type="hidden" value="{{$cart->rowId}}" name="rowIdCart">
                                                   
                                                </div>
                                        
                                           <!-- End .cart-product-quantity -->
                                        </td>
                                        
                                        <td class="total-col">
                                            @php
                                                $subtotal = $cart->price * $cart->qty;
                                                echo number_format($subtotal).' '.'đ';
                                            @endphp 
                                        </td>
                                        <td>
                                            <button style="min-width: 100px" type="submit" class="btn btn-dark">Cập nhật</button>
                                        </td>
                                        </form>

                                        <td class="remove-col"><a href="{{url('/delete-cart/'.$cart->rowId)}}" type="button" class="btn-remove"><i class="icon-close"></i></a>
                                        </td>
                                    </tr>
                                @endforeach  
                            </tbody>
                        </table>
                        @else
                            <div class="alert alert-warning text-center m-0 mb-2" role="alert">
                                Không có sản phẩm nào trong giỏ hàng!, hãy mua một sản phẩm bất kỳ
                            </div>
                        @endif

                        <div class="cart-bottom">
                            <a href="{{url('/delete-all-cart')}}" class="btn btn-dark"><span>Xóa tất cả</span></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title text-center">Tổng giỏ hàng</h3><!-- End .summary-title -->
                            <table class="table table-summary">
                                <tbody>
                                    <tr class="summary-subtotal">
                                        <td>Tạm tính:</td>
                                        <td>{{Cart::subtotal(0,'.','.').''.'đ'}}</td>
                                    </tr><!-- End .summary-subtotal -->
                                    {{-- <tr class="summary-shipping">
                                        <td>Phí giao hàng:</td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr class="summary-shipping-row">
                                        <td>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping"
                                                    class="custom-control-input" checked>
                                                <label class="custom-control-label" for="free-shipping">Miễn phí</label>
                                            </div><!-- End .custom-control -->
                                        </td>
                                        <td></td>
                                    </tr> --}}
                                    
                                    <tr class="summary-total" id="totalStyle">
                                        <td>Tổng tiền:</td>
                                            <td>
                                                {{Cart::priceTotal(0,'.','.').''.'đ'}}
                                            </td>
                                    </tr>
                                  <!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->
                            @if (Auth::user())
                                <a href="{{url('/checkout')}}" class="btn btn-dark btn-order btn-block">THANH TOÁN NGAY</a>
                            @else
                                {{-- <a href="#" data-toggle="modal" data-target="#loginModal"  class="btn btn-outline-primary-2 btn-order btn-block">THANH TOÁN NGAY</a> --}}
                                <a href="{{url('/login')}}" class="btn btn-dark btn-order btn-block">THANH TOÁN NGAY</a>
                            @endif
                        </div><!-- End .summary -->
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
@endsection
