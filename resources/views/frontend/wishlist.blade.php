@extends('layouts.home')
@section('title', 'Sản phẩm yêu thích')
@section('content')
{{-- @include('layouts.include.home-navbar') --}}
<div class="page-header text-center" style="background-image: url('{{ asset('images/gallery/homebg2.jpg') }}')">
    <div class="container">
        <h1 class="page-title">Sản phẩm yêu thích</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            {{-- <li class="breadcrumb-item"><a href="#">Shop</a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Sản phẩm yêu thích</li>
            {{-- <li>{{ Str::substr($checkWishlist, 7, -2)  }}</li>
            <li>{{ $idWishlist }}</li> --}}
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <table class="table table-wishlist table-mobile">
            <thead>
                <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-4">Tên sản phẩm</th>
                    <th class="col-md-2">Giá</th>
                    <th class="col-md-2">Trạng thái</th>
                    <th class="col-md-2">Hành động</th>
                    <th class="col-md-1"></th>
                </tr>
            </thead>

          @if ($wCount > 0)
            <tbody>
                @foreach ($show as $index => $prod)
                <form action="{{url('/add-to-cart')}}" method="POST">
                @csrf
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="product-col">
                            <div class="product">
                                <figure class="product-media">
                                    <a href="{{ url('/product-detail/'.$prod->product->id) }}">
                                        <img src="{{asset('uploads/prodImg/'.$prod->product->prod_image)  }}" alt="Product image">
                                    </a>
                                </figure>

                                <h3 class="product-title">
                                    <p>{{ $prod->product->prod_name }}</p>
                                </h3><!-- End .product-title -->
                            </div><!-- End .product -->
                        </td>
                        <td class="price-col">{{number_format($prod->product->prod_original_price).''.''}}<sup>đ</sup></td>
                        <td class="stock-col">
                            @if ($prod->product->prod_quantity > 0)
                                <span class="in-stock">Còn hàng</span>
                            @else
                                <span class="out-of-stock">Hết hàng</span>
                            @endif
                        </td>
                        <td class="action-col">
                            <a href="{{ url('/product-detail/'.$prod->id) }}" class="btn btn-primary" id="btnAdd">
                                <span><i class="fas fa-info-circle mr-3"></i>Xem chi tiết</span>
                            </a>
                        </td>
                        <td class="remove-col">
                            <a href="{{ url('delete-wishlist/'.$prod->id) }}" class="btn-remove"><i class="icon-close"></i></a>
                        </td>
                    </tr>
                </form>         
                @endforeach
            </tbody>
          @else
              <tbody>
                <tr>
                   <td colspan="5"> 
                        <div class="alert alert-warning text-center m-0 mb-2" role="alert">
                            Không có sản phẩm yêu thích nào trong danh sách!, hãy thêm một sản phẩm bất kỳ
                        </div>
                    </td>
                </tr>
              </tbody>
          @endif
        </table><!-- End .table table-wishlist -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
@endsection
