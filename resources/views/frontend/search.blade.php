@extends('layouts.home')
@section('title', 'Tìm kiếm')
@section('content')
    <div class="page-header text-center" style="background-image: url('{{ asset('images/gallery/homebg2.jpg') }}')">
        <div class="container">
            <h1 class="page-title">Kết quả tìm kiếm</h1>
        </div><!-- End .container -->
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
            </ol>
        </div><!-- End .container -->
    </nav>
    <div class="container">
        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="arrivals-all-tab" role="tabpanel" aria-labelledby="arrivals-all-link">
                <div class="row">
                   @foreach ($searchProd as $prod)
                       <div class="product product-10 text-center col-xl-5col col-lg-3 col-md-4 col-6">
                           <form action="{{url('/add-to-cart')}}" method="POST">
                           @csrf
                           <figure class="product-media">
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
@endsection