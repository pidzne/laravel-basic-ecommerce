@extends('layouts.home')
@section('title', 'Tất cả sản phẩm')
@section('css')
<style>
    #sortStyle {
        margin-left: 15px;
    }
    #brandStyle {
         margin-top: -20px
    }
</style>
@endsection
@section('content')
    <div class="page-header text-center" style="background-image: url('{{ asset('images/gallery/homebg2.jpg') }}')">
        <div class="container">
            <h1 class="page-title">Tất cả sản phẩm</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Shop</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">

                    {{-- Sắp xếp --}}
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-sort">
                                <label for="sortby">Sắp xếp theo:</label>
                                <div class="select-custom">
                                    <form action="{{ route('filter.view') }}" method="GET">
                                    @csrf
                                        <select name="viewSelected" id="sortby" class="form-control" onchange="this.form.submit()">
                                            <option value="" selected="selected">Độ quan tâm</option>
                                            {{-- <option value="0">Mặc định</option> --}}
                                            <option value="2">Thấp đến cao</option>
                                            <option value="1">Cao đến thấp</option>
                                        </select>
                                    </form>
                                </div>

                                <div class="toolbox-sort" id="sortStyle">
                                    <div class="select-custom">
                                        <form action="{{ route('filter.rating') }}" method="GET">
                                        @csrf
                                            <select name="ratingSelected" id="sortby" class="form-control" onchange="this.form.submit()">
                                                <option value="" selected="selected">Đánh giá sao</option>
                                                {{-- <option value="0">Mặc định</option> --}}
                                                <option value="1" >Giảm dần</option>
                                                <option value="2">Tăng dần</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>

                                <div class="toolbox-sort" id="sortStyle">
                                    <div class="select-custom">
                                        <form action="{{ route('filter.price') }}" method="GET">
                                        @csrf
                                            <select name="priceSelected" id="sortby" class="form-control" onchange="this.form.submit()">
                                                <option value="" selected="selected">Giá sản phẩm</option>
                                                {{-- <option value="0">Mặc định</option> --}}
                                                <option value="1">Cao đến thấp</option>
                                                <option value="2">Thấp đến cao</option>
                                            </select>
                                        </form>  
                                    </div>
                                </div>

                            </div><!-- End .toolbox-sort -->
                        </div>
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center">

                            @foreach ($allProducts as $prod)
                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                    <div class="product product-10 text-center">
                                        <form action="{{url('/add-to-cart')}}" method="POST">
                                        @csrf
                                        <figure class="product-media">
                                            <a href="{{url('/product-detail/'.$prod->id)}}">
                                                <img src="{{ asset('uploads/prodImg/'.$prod->prod_image) }}" alt="Product image" class="product-image">
                                            </a>
                                            <div class="product-action-vertical">
                                                 <a href="{{url('/add-wishlist/'.$prod->id)}}" class="btn-product-icon btn-wishlist" title="Thêm vào yêu thích"><span>Thêm vào yêu thích</span></a>                           
                                            </div>
                                        </figure>
                
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
                                </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                            @endforeach
                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- End .col-lg-9 -->


                 <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">

                        {{-- Lọc theo danh mục --}}
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true"
                                    aria-controls="widget-4">
                                    Danh mục
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <form method="GET" action="{{ url('/filter-prod-cate') }}">
                                        <div class="filter-items"></div>
                                            @foreach ($category as $cate)
                                                @php
                                                    $checked = [];
                                                    if (isset($_GET['filterCate'])) {
                                                        $checked = $_GET['filterCate'];
                                                    }
                                                @endphp
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="filterCate[]" value="{{ $cate->id }}"
                                                        @if (in_array($cate->id, $checked)) checked @endif
                                                        >   
                                                        {{ $cate->cate_name }}
                                                    </div><!-- End .custom-checkbox -->
                                                </div>
                                            @endforeach
                                            <button type="submit" class="btn btn-primary btn-round">Lọc</button>  
                                        </div>   
                                    </form>
                                </div>
                            </div>
                        </div>


                        {{-- Lọc theo thương hiệu --}}
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true"
                                    aria-controls="widget-3">
                                    Thương hiệu
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body" id="brandStyle">
                                    <form method="GET" action="{{ url('/filter-prod-brand') }}">
                                            @foreach ($brand as $br)
                                                @php
                                                    $checked = [];
                                                    if (isset($_GET['filterBrand'])) {
                                                        $checked = $_GET['filterBrand'];
                                                    }
                                                @endphp
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="filterBrand[]" value="{{ $br->id }}"
                                                        @if (in_array($br->id, $checked)) checked @endif
                                                        >   
                                                        {{ $br->brand_name }}
                                                    </div><!-- End .custom-checkbox -->
                                                </div>
                                            @endforeach
                                            <button type="submit" class="btn btn-primary btn-round">Lọc</button> 
                                        </div>   
                                    </form>
                                </div>
                            </div><!-- End .collapse -->
                        </div>
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection
