@extends('layouts.home')
@section('title', 'Cửa hàng iSky')
@section('content')
@section('css')
<link rel="stylesheet" href="{{ asset('customs/css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/deal.css') }}">
@endsection
@include('layouts.include.home-slider')
    <div class="mb-2"></div><!-- End .mb-4 -->
    {{-- Danh mục sản phẩm --}}
    <div class="container">
        {{-- <h2 class="title text-center mb-4">Danh mục sản phẩm</h2><!-- End .title text-center --> --}}
        <div class="cat-blocks-container">
            <div class="row">
                @foreach ($category as $cate)
                    <div class="col-6 col-sm-4 col-lg-2">
                        <a href="{{url('/product-cate/'.$cate->id)}}" class="cat-block">
                            <figure>
                                <span>
                                    <img src="{{ asset('uploads/cateImg/'.$cate->cate_image) }}" alt="cateImg">
                                </span>
                            </figure>
                            <h3 class="cat-block-title text-center">{{$cate->cate_name}}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Deal giảm giá --}}
    <div class="deal bg-image pt-8 pb-8" style="background-image: url('{{ asset('images/gallery/prodsale1.jpg') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-8 col-lg-6">
                    <div class="deal-content text-center">
                        <h2>Giảm giá ưu đãi</h2>
                        <h4>Số lượng có hạn</h4>
                        <div class="deal-countdown" data-until="+15m"></div>
                    </div>

                    <div class="row deal-products">
                        @foreach ($prodByTopSell as $prod)
                            <div class="col-6 deal-product text-center">
                                <figure class="product-media">
                                    <span class="product-label label-sale font-weight-bold">SALE</span>
                                    <a href="{{ url('/product-detail/'.$prod->id) }}">
                                        <img src="{{ asset('uploads/prodImg/'.$prod->prod_image) }}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <h3 class="product-title"><a href="product.html">{{ $prod->prod_name }}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">
                                            {{ number_format($prod_selling_price = ($prod->prod_original_price - ($prod->prod_original_price * $prod->prod_selling_price) / 100)).''.'' }}<sup>đ</sup>
                                        </span>
                                        <span class="old-price"><del>{{ number_format($prod->prod_original_price).''.'' }}<sup>đ</sup></del></span>
                                    </div><!-- End .product-price -->
                                </div><!-- End .product-body -->
                                <a href="{{ url('/product-detail/'.$prod->id) }}" class="btn btn-danger btn-round" id="aBtn">Xem ngay</a>
                            </div>
                        @endforeach  
                    </div>
                </div><!-- End .col-lg-5 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div>

    <div class="mb-4"></div><!-- End .mb-4 -->

    {{-- Sản phẩm mới nhất --}}
    <div class="container new-arrivals">
        <div class="heading heading-center mb-2">
             <h2 class="title">Sản phẩm mới nhất</h2>
        </div>
 
        <div class="tab-content tab-content-carousel">
             <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
                 <div class="row">
                    @foreach ($product as $prod)
                        <div class="product product-10 text-center col-xl-5col col-lg-3 col-md-4 col-6">
                            <form action="{{url('/add-to-cart')}}" method="POST">
                            @csrf
                            <figure class="product-media">
                                <span class="product-label label-sale">New</span>
                                <a href="{{url('/product-detail/'.$prod->id)}}">
                                    <img src="{{ asset('uploads/prodImg/'.$prod->prod_image) }}" alt="Product image" class="product-image">
                                    {{-- <img src="assets/images/demos/demo-24/best-sellers/product-1-2.jpg" alt="Product image" class="product-image-hover"> --}}
                                </a>

                                <div class="product-action-vertical">
                                    <a href="{{url('/add-wishlist/'.$prod->id)}}" class="btn-product-icon btn-wishlist" title="Thêm vào yêu thích"><span>Thêm vào yêu thích</span></a>                           
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                {{-- <div class="product-action">
                                    <input type="hidden" value="1" name="prod_qty">
                                    <input type="hidden" value="{{ $prod->prod_name }}" name="prod_name">
                                    <input type="hidden" value="{{ $prod->prod_size }}" name="prod_size">
                                    <input type="hidden" value="{{ $prod->prod_original_price }}" name="prod_price">
                                    <input type="hidden" value="{{ $prod->prod_image }}"  name="prod_image">
                                    <input type="hidden" name="prod_id_hidden" value="{{$prod->id}}">
                                    <button type="submit" class="btn-cart" id="btnAdd">
                                        <span><i class="fas fa-shopping-bag mr-2"></i>Thêm vào giỏ</span>
                                    </button>
                                </div> --}}
                                <div class="product-action">
                                    <a href="{{ url('/product-detail/'.$prod->id) }}" class="btn-cart" id="btnAdd">
                                        <span><i class="fas fa-info-circle mr-3"></i>Xem chi tiết</span>
                                    </a>
                                </div>     
                                <div class="product-intro">
                                    <h3 class="product-title">
                                        <a href="">{{ $prod->prod_name }}</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if ($prod->prod_selling_price>='1')
                                            <span class="new-price">
                                                {{ number_format($prod_selling_price = ($prod->prod_original_price - ($prod->prod_original_price * $prod->prod_selling_price) / 100)).''.'' }}<sup>đ</sup>
                                            </span>
                                            <span class="old-price"><del>{{ number_format($prod->prod_original_price).''.'' }}<sup>đ</sup></del></span>
                                        @else
                                            <span class="new-price">{{number_format($prod->prod_original_price).''.''}}<sup>đ</sup></span>
                                        @endif
                                    </div><!-- End .product-price -->
                                </div>
                            </div><!-- End .product-body -->
                            </form>
                        </div>
                    @endforeach
                 </div>
             </div>
        </div>
    </div>

    {{-- Banner quảng cáo 1 --}}
    <div class="intro-section bg-lighter pt-3">
        <div class="container">
            <div class="banner-group">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="banner banner-big banner-overlay">
                            <a href="{{ url('/products') }}">
                                <img src="{{ asset('images/gallery/bnhome1.jpg') }}" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-bottom">
                                <h4 class="banner-subtitle text-white"><a href="#">Top trending</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title text-white"><a href="#">Các sản phẩm được mua <br>nhiều nhất tại iSky</a></h3><!-- End .banner-title -->
                                <a href="{{ url('/products') }}" class="btn btn-primary">Xem chi tiết</a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-lg-5 -->

                    <div class="col-lg-7">
                        <div class="banner banner-overlay">
                            <a href="{{ url('/products') }}">
                                <img src="{{ asset('images/gallery/bnhome2.jpg') }}" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-right">
                                <h4 class="banner-subtitle text-white"><a href="#">Sự kiện</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title text-white font-weight-bold"><a href="#">Tham gia sự kiện tại Sky <br>và nhận 50% Off</a></h3><!-- End .banner-title -->
                                <a href="{{ url('/products') }}" class="btn btn-primary" id="aBtn">Nhận ưu đãi</a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="banner banner-overlay">
                                    <a href="{{ url('/products') }}">
                                        <img src="{{ asset('images/gallery/bnhome3.jpg') }}" alt="Banner" style="height: 270px">
                                    </a>

                                    <div class="banner-content banner-content-top ">
                                        <h4 class="banner-subtitle text-white"><a href="#">Deal hot</a></h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title text-white font-weight-bold"><a href="#">Giảm giá <br>90%</a></h3><!-- End .banner-title -->
                                        {{-- <a href="#" class="btn btn-primary">Truy cập</a> --}}
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-sm-6 -->

                            <div class="col-sm-6">
                                <div class="banner banner-overlay">
                                    <a href="{{ url('/products') }}">
                                        <img src="{{ asset('images/gallery/bnhome4.jpg') }}" alt="Banner" style="height: 270px">
                                    </a>

                                    <div class="banner-content  banner-content-top banner-content-reverse">
                                        <h4 class="banner-subtitle text-dark"><a href="#">Các sản phẩm hot</a></h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title text-dark font-weight-bold"><a href="#">Lựa chọn<br>từ chuyên gia</a></h3><!-- End .banner-title -->
                                        <a href="{{ url('/products') }}" class="btn btn-primary" id="aBtn">Xem ngay</a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-sm-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .col-lg-7 -->
                </div><!-- End .row -->
            </div><!-- End .banner-group -->
        </div><!-- End .container -->
    </div><!-- End .bg-lighter -->

    {{-- Sản phẩm theo lượt xem --}}
    <div class="container new-arrivals mt-3">
        <div class="heading heading-center mb-2">
            <h2 class="title">Sản phẩm được quan tâm nhất</h2>
        </div>

        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
                <div class="row">
                    @foreach ($prodByViews as $prod)
                        <div class="product product-10 text-center col-xl-5col col-lg-3 col-md-4 col-6">
                            <form action="{{url('/add-to-cart')}}" method="POST">
                            @csrf
                            <figure class="product-media">
                                <span class="product-label label-sale"><i class="fas fa-eye mr-2"></i>{{ $prod->prod_views }}</span>
                                <a href="{{url('/product-detail/'.$prod->id)}}">
                                    <img src="{{ asset('uploads/prodImg/'.$prod->prod_image) }}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="{{url('/add-wishlist/'.$prod->id)}}" class="btn-product-icon btn-wishlist" title="Thêm vào yêu thích"><span>Thêm vào yêu thích</span></a>                           
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-action">
                                    <a href="{{ url('/product-detail/'.$prod->id) }}" class="btn-cart" id="btnAdd">
                                        <span><i class="fas fa-info-circle mr-3"></i>Xem chi tiết</span>
                                    </a>
                                </div>
                                <div class="product-intro">
                                    <h3 class="product-title">
                                        <a href="">{{ $prod->prod_name }}</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if ($prod->prod_selling_price>='1')
                                            <span class="new-price">
                                                {{ number_format($prod_selling_price = ($prod->prod_original_price - ($prod->prod_original_price * $prod->prod_selling_price) / 100)).''.'' }}<sup>đ</sup>
                                            </span>
                                            <span class="old-price"><del>{{ number_format($prod->prod_original_price).''.'' }}<sup>đ</sup></del></span>
                                        @else
                                            <span class="new-price">{{number_format($prod->prod_original_price).''.''}}<sup>đ</sup></span>
                                        @endif
                                    </div><!-- End .product-price -->
                                </div>
                            </div><!-- End .product-body -->
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Banner quảng cáo 2 --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner banner-overlay banner-overlay-light">
                    <a href="#">
                        <img src="{{ asset('images/gallery/bnhome5.jpg') }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle d-none d-sm-block"><a href="#">Ưu đãi mùa đông</a></h4>
                        <h3 class="banner-title"><a href="#">Giảm giá cực hot <br>Dành cho áo khoác <br><span class="text-primary font-weight-bold">80% off</span></a></h3>
                        <a href="#" class="btn btn-primary btn-round" id="aBtn">Xem chi tiết</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="banner banner-overlay">
                    <a href="#">
                        <img src="{{ asset('images/gallery/bnhome6.jpg') }}" alt="Banner">
                    </a>

                    <div class="banner-content">
                        <h4 class="banner-subtitle text-dark  d-none d-sm-block"><a href="#">Deal trong tuần</a></h4><!-- End .banner-subtitle -->
                        <h3 class="banner-title text-dark"><a href="#">Khuyến mãi <br>Khi mua áo tay dài <br><span class="text-primary font-weight-bold">90% off</span></a></h3><!-- End .banner-title -->
                        <a href="#" class="btn btn-primary btn-round" id="aBtn">Xem chi tiết</a>
                    </div><!-- End .banner-content -->
                </div><!-- End .banner -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div>

    {{-- Sản phẩm theo theo lượt sale --}}
    <div class="container new-arrivals mt-3">
        <div class="heading heading-center mb-2">
             <h2 class="title">Deal giảm giá - số lượng có hạn</h2>
        </div>
 
        <div class="tab-content tab-content-carousel">
             <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
                 <div class="row">
                    @foreach ($prodByPromo as $prod)
                        <div class="product product-10 text-center col-xl-5col col-lg-3 col-md-4 col-6">
                            <form action="{{url('/add-to-cart')}}" method="POST">
                            @csrf
                            <figure class="product-media">
                                <span class="product-label label-sale">{{ $prod->prod_selling_price }} %</span>
                                <a href="{{url('/product-detail/'.$prod->id)}}">
                                    <img src="{{ asset('uploads/prodImg/'.$prod->prod_image) }}" alt="Product image" class="product-image">
                                    {{-- <img src="assets/images/demos/demo-24/best-sellers/product-1-2.jpg" alt="Product image" class="product-image-hover"> --}}
                                </a>

                                <div class="product-action-vertical">
                                    <a href="{{url('/add-wishlist/'.$prod->id)}}" class="btn-product-icon btn-wishlist" title="Thêm vào yêu thích"><span>Thêm vào yêu thích</span></a>                           
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-action">
                                    <a href="{{ url('/product-detail/'.$prod->id) }}" class="btn-cart" id="btnAdd">
                                        <span><i class="fas fa-info-circle mr-3"></i>Xem chi tiết</span>
                                    </a>
                                </div>
                                <div class="product-intro">
                                    <h3 class="product-title">
                                        <a href="">{{ $prod->prod_name }}</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        <span class="new-price">
                                            {{ number_format($prod_selling_price = ($prod->prod_original_price - ($prod->prod_original_price * $prod->prod_selling_price) / 100)).''.'' }}<sup>đ</sup>
                                        </span>
                                        <span class="old-price"><del>{{ number_format($prod->prod_original_price).''.'' }}<sup>đ</sup></del></span>
                                    </div><!-- End .product-price -->
                                </div>
                            </div><!-- End .product-body -->
                            </form>
                        </div>
                    @endforeach
                 </div>
             </div>
        </div>
    </div>

    {{-- Features --}}
    <div class="container mb-2">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="fas fa-truck"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Miễn phí giao hàng</h3><!-- End .icon-box-title -->
                        <p>Trong khu vực nội thành</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="fas fa-thumbs-up"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Chất lượng sản phẩm</h3><!-- End .icon-box-title -->
                        <p>Đạt chuẩn quốc tế</p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->

            <div class="col-lg-4 col-sm-6">
                <div class="icon-box icon-box-card text-center">
                    <span class="icon-box-icon">
                        <i class="fas fa-headset"></i>
                    </span>
                    <div class="icon-box-content">
                        <h3 class="icon-box-title">Đội ngũ hỗ trợ</h3><!-- End .icon-box-title -->
                            <p>Hoạt động 24/7 </p>
                    </div><!-- End .icon-box-content -->
                </div><!-- End .icon-box -->
            </div><!-- End .col-lg-4 col-sm-6 -->
        </div><!-- End .row -->
    </div>
    @include('layouts.include.home-email')
    <!-- End .icon-boxes-container -->
@endsection