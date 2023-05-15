@extends('layouts.home')
@section('title', 'Chi tiết sản phẩm')
@section('css')
<style>
.rating {
    display: flex;
    margin-top: -10px;
    flex-direction: row-reverse;
    margin-left: -4px;
    float: left;
    margin-right: 10px; 
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 19px;
    font-size: 25px;
    color: #ff9529;
    cursor: pointer;
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}

#tArea {
    /* max-width: 100%; */
    width: 1080px;
}
#imgCommStyle {
    height: 50%;
    border-radius: 100%;
}

.card {
    border: 1px solid rgba(0,0,0,.125);
}

.card-header {
    border-bottom: 1px solid rgba(0,0,0,.125);
    padding: .55rem 3rem;
    text-transform: capitalize;
    background: rgb(230, 226, 226);
}

.prod-info-content {
    padding: 2.7rem 3rem;
}

.tb1 td {
    padding: 1rem 2rem;
}

.hide-th1 {
    display: none;
}

#iconStar, #sumStar1 {
    color: #ff9529;
}

.btn-success:hover {
    background-color: blue;
}

/* #buttonCmt:hover {
    background-color: red;
} */

</style>
@endsection
@section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('images/gallery/homebg2.jpg') }}')">
    <div class="container">
        <h1 class="page-title">Chi tiết sản phẩm</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->


    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                        <span>{{$prod_detail->prod_name}}</span>
                </li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="container">
                <div class="product-details-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-gallery product-gallery-vertical">
                                <div class="row">
                                    <figure class="product-main-image">
                                        <img id="product-zoom"
                                            src="{{ asset('uploads/prodImg/'.$prod_detail->prod_image) }}"
                                            data-zoom-image="{{ asset('uploads/prodImg/'.$prod_detail->prod_image) }}"
                                            alt="product image">

                                        <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                            <i class="icon-arrows"></i>
                                        </a>
                                    </figure><!-- End .product-main-image -->

                                    {{-- Load hình tại sản phẩm chi tiết --}}
                                    <div id="product-zoom-gallery" class="product-image-gallery">
                                        <a class="product-gallery-item active" href="#"
                                        data-image="{{ asset('uploads/prodImg/'.$prod_detail->prod_image) }}"
                                        data-zoom-image="{{ asset('uploads/prodImg/'.$prod_detail->prod_image) }}">
                                        <img src="{{ asset('uploads/prodImg/'.$prod_detail->prod_image) }}"
                                            alt="product side">
                                        </a>
                                        @foreach ($gallery as $album)
                                            <a class="product-gallery-item active" href="#"
                                            data-image="{{ asset('uploads/albumImg/'.$album->aImg) }}"
                                            data-zoom-image="{{ asset('uploads/albumImg/'.$album->aImg) }}">
                                            <img src="{{ asset('uploads/albumImg/'.$album->aImg) }}"
                                                alt="product side">
                                            </a>
                                        @endforeach
                                    </div><!-- End .product-image-gallery -->
                                </div><!-- End .row -->
                            </div><!-- End .product-gallery -->
                        </div><!-- End .col-md-6 -->
                        {{-- fghdfgfdgdf --}}
                        <div class="col-md-6">
                            <div class="product-details">
                                <h1 class="title"> {{ $prod_detail->prod_name }}</h1>
                                <div class="ratings-container">
                                    <?php for ($i=0; $i < $sumRatings; $i++) { 
                                        echo "<i class='fa fa-star' id='sumStar1'></i>";
                                    } ?>
                                    <a class="ratings-text" href="#product-review-link" id="review-link">( {{ $reviewCount }} đánh giá )</a>
                                </div><!-- End .rating-container -->

                                <form action="{{url('cart')}}" method="POST">
                                    {{ csrf_field() }}<!-- End .details-filter-row -->
                                    <div class="product-price">
                                        @if ($prod_detail->prod_selling_price>=1)
                                            <span class="new-price">
                                                {{ number_format($prod_selling_price = ($prod_detail->prod_original_price - ($prod_detail->prod_original_price * $prod_detail->prod_selling_price) / 100)).''.'' }}<sup>đ</sup>
                                            </span>
                                            <span class="old-price"><del>{{ number_format($prod_detail->prod_original_price).''.'' }}<sup>đ</sup></del></span>
                                        @else
                                            <span class="new-price">{{ number_format($prod_detail->prod_original_price).''.''}}<sup>đ</sup></span>
                                        @endif
                                     </div><!-- End .product-price -->

                                     <div class="product-content">
                                        <p>Số lượt xem: {{ $countViews->prod_views }}</p>
                                        <p>{{ $prod_detail->prod_small_description }}</p>
                                        @if ($prod_detail->prod_quantity > 0)
                                            Tình trạng: <p class="badge bg-success" style="color: #fff; font-size: 12px">Còn hàng</p>
                                        @else
                                            Tình trạng: <p class="badge bg-danger" style="color: #fff; font-size: 12px">Không còn hàng</p>
                                        @endif
                                     </div>

                                    <div class="product-content">
                                        <a href="{{url('/add-wishlist/'.$prod_detail->id)}}" title="Wishlist"><i class="icon-heart mr-2"></i>
                                        <span>Thêm vào sản phẩm yêu thích</span></a>
                                    </div><!-- End .product-content -->


                                    <div class="details-filter-row details-row-size mb-md-1">
                                        <label>Kích cỡ:</label>
                                        <div class="product-size">
                                            <select name="prod_sizes" id="" class="form-control">
                                                <option selected disabled value="">Chọn 1 kích cỡ</option>
                                                @foreach ($prodSize as $s)
                                                    <option value="{{ $s->size }}">{{ $s->size }}</option>
                                                @endforeach
                                            </select>     
                                        </div>
                                        <span class="text-danger ml-2">@error('prod_sizes'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="details-filter-row details-row-size mb-md-1">
                                        <label>Màu sắc:</label>
                                        <div class="product-size">
                                            <select name="prod_color" id="" class="form-control">
                                                <option selected disabled value="">Chọn 1 màu</option>
                                                @foreach ($prodColor as $color)
                                                    <option value="{{ $color->color }}">{{ $color->color }}</option>
                                                @endforeach
                                            </select>    
                                        </div>
                                        <span class="text-danger ml-4">@error('prod_color'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="details-filter-row details-row-size"> 
                                    </div><!-- End .details-filter-row --> 

                                        @if ($prod_detail->prod_quantity > 0)
                                            <div class="details-filter-row details-row-size">
                                                <label for="qty">Số lượng:</label>
                                                <div class="product-details-quantity">
                                                    <input type="number" id="qty" class="form-control" value="1"
                                                        min="1" max="{{ $prod_detail->prod_quantity }}" step="1" data-decimals="0" required name="prod_qty">
                                                </div><!-- End .product-details-quantity -->
                                            </div>
                                        @else
                                            <div class="details-filter-row details-row-size">
                                                <sapn>Số lượng: <p class="badge bg-danger" style="color: #fff; font-size: 12px">Hết hàng</p></sapn>
                                            </div>
                                        @endif
                                        <input type="hidden" value="{{ $prod_detail->prod_name }}" name="prod_name">
                                        <input type="hidden" value="{{ $prod_detail->prod_size }}" name="prod_size">
                                       
                                        @if ($prod_detail->prod_selling_price>=1)
                                            <input type="hidden" value="{{ $prod_selling_price = ($prod_detail->prod_original_price - ($prod_detail->prod_original_price * $prod_detail->prod_selling_price) / 100) }}" name="prod_price">
                                        @else
                                            <input type="hidden" value="{{ $prod_detail->prod_original_price }}" name="prod_price">
                                        @endif
                                        <input type="hidden" value="{{ $prod_detail->prod_image }}"  name="prod_image">
                                        <input type="hidden" name="prod_id_hidden" value="{{$prod_detail->id}}">
                                        <div class="product-details-action">
                                            @if ($prod_detail->prod_quantity > 0)
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="icon-shopping-cart mr-2" style="font-size: 20px"></i>
                                                    <span>Thêm vào giỏ hàng</span>
                                                </button>
                                            @else
                                                <span class="badge bg-danger" style="color: #fff; font-size: 15px">Sản phẩm hiện tại đã hết hàng, không thể mua</span>
                                            @endif
                                        </div>
                                    </form>
                                <!-- End .product-details-action -->

                            </div><!-- End .product-details -->

                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .product-details-top -->


                <div class="card">
                    <div class="card-header">Thông tin chi tiết</div>
                    <div class="card-body">
                        <div class="prod-info-content">

                            <table class="table table-bordered table-striped tb1">
                                <thead>
                                    <tr>
                                      <th class="col-md-6 hide-th1"></th>
                                      <th class="col-md-6 hide-th1"></th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prodInfo as $pInfo)
                                        <tr>
                                            <td class="col-md-6">Phong cách</td>
                                            <td class="col-md-6">{{ $pInfo->clo_style }}</td>
                                        </tr>
                                        <tr>
                                            <td>Chất liệu</td>
                                            <td>{{ $pInfo->clo_material }}</td>
                                        </tr>
                                        <tr>
                                            <td>Xuất xứ</td>
                                            <td>{{ $pInfo->clo_origin }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kiểu quần, áo</td>
                                            <td>{{ $pInfo->clo_type }}</td>
                                        </tr>
                                        <tr>
                                            <td>Loại quần, áo</td>
                                            <td>{{ $pInfo->clo_cate }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mẫu quần, áo</td>
                                            <td>{{ $pInfo->clo_model }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>


                <div class="card mt-5">
                    <div class="card-header">Mô tả chi tiết</div>
                    <div class="card-body">
                        <div class="prod-info-content">

                            <p>{!! $prod_detail->prod_detail_description !!}</p>
                       
                        </div>
                    </div>
                </div>



                <div class="card mt-5 mb-5">
                    <div class="card-header">Bình luận - đánh giá sao</div>
                    <div class="card-body">
                        <div class="prod-info-content">

                            <div class="review">
                                {{-- Danh sách bình luận --}}
                                    @foreach ($showCmt as $comm)
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                    <img id="imgCommStyle" class="media-object" src="{{ asset('uploads/userImg/'.$comm->userImg) }}" alt="userImg">
                                                <div class="ratings-container">
                                                    <div class="text-center">
                                                    {{-- rating stars --}}
                                                    <?php for ($i=0; $i < $comm->rating; $i++) { 
                                                        echo "<i class='fa fa-star' id='iconStar'></i>";
                                                        } ?>
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span class="review-date"></span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4>{{ $comm->userName }}</h4>

                                                <div class="review-content">
                                                    <p>{{$comm->content}}</p>
                                                </div><!-- End .review-content -->

                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    @endforeach
                                    {{ $showCmt->links() }}
                            </div><!-- End .review -->
                           
                             {{-- Thêm mới bình luận --}}
                            <div>
                                <form action="{{url('/add-ratings')}}" method="POST">
                                    @csrf
                                        <input type="hidden" name="prod_id" value="{{$prod_detail->id}}">
        
                                        <div class="cardComment">
                                            <div class="row">   
                                                <div class="col-10">
                                                    <div class="comment-box ml-2">
                                                        {{-- <h3>Nhập bình luận</h3> --}}
                                                        <h6>Thêm mới bình luận</h6>
                                                        <div class="rating"> 
                                                            <input type="radio" name="prod_rating" value="5" id="5"><label for="5">☆</label>
                                                            <input type="radio" name="prod_rating" value="4" id="4"><label for="4">☆</label> 
                                                            <input type="radio" name="prod_rating" value="3" id="3"><label for="3">☆</label>
                                                            <input type="radio" name="prod_rating" value="2" id="2"><label for="2">☆</label>
                                                            <input type="radio" name="prod_rating" value="1" id="1"><label for="1">☆</label>
                                                        </div>
                                                        <p class="text-danger">@error('prod_rating'){{ $message }}@enderror</p>
                                                        
                                                        <div class="comment-area">
                                                            <textarea id="tArea" class="form-control" placeholder="Nội dung *" rows="5" name="content"></textarea>
                                                            <span class="text-danger">@error('content'){{ $message }}@enderror</span>
                                                        </div>
                                                        
                                                        <div class="comment-btns mt-2">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="pull-left">
                                                                        <button type="submit" class="btn btn-success btn-sm" id="buttonCmt">Gửi</button>       
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-6">  
                                                                    <div class="pull-right">
                                                                        <button class="btn btn-success send btn-sm" hidden>Hủy <i class="fa fa-long-arrow-right ml-1"></i></button>         
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                       
                        </div>
                    </div>
                </div>

    
        {{-- Sản phẩm cùng loại --}}
        <section class="best-sellers mt-2">
            <div class="container">
                <div class="heading heading-center mb-2">
                    <h2 class="title">Sản phẩm cùng loại</h2>
                </div>
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow text-center" data-toggle="owl" 
                data-owl-options='{
                    "nav": true, 
                    "dots": false,
                    "margin": 30,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":3
                        },
                        "1200": {
                            "items":4
                        }
                    }
                }'>
                    @foreach ($prod_related as $spcungloai)
                        <div class="product product-10 text-center">
                            <form action="{{url('/add-to-cart')}}" method="POST">
                            @csrf
                            <figure class="product-media">
                                <a href="{{url('/product-detail', [$spcungloai->id])}}">
                                    <img src="{{ asset('uploads/prodImg/'.$spcungloai->prod_image) }}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="{{url('/add-wishlist/'.$spcungloai->id)}}" class="btn-product-icon btn-wishlist" title="Thêm vào yêu thích"><span>Thêm vào yêu thích</span></a>                           
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-action">
                                    <a href="{{ url('/product-detail/'.$spcungloai->id) }}" class="btn-cart" id="btnAdd">
                                        <span><i class="fas fa-info-circle mr-3"></i>Xem chi tiết</span>
                                    </a>
                                </div>
                                <div class="product-intro">
                                    <h3 class="product-title">
                                        <a href="">{{ $spcungloai->prod_name }}</a>
                                    </h3><!-- End .product-title -->
                                    <div class="product-price">
                                        @if ($spcungloai->prod_selling_price>='1')
                                            <span class="new-price">
                                                {{ number_format($prod_selling_price = ($spcungloai->prod_original_price - ($spcungloai->prod_original_price * $spcungloai->prod_selling_price) / 100)).''.'' }}<sup>đ</sup>
                                            </span>
                                            <span class="old-price"><del>{{ number_format($spcungloai->prod_original_price).''.'' }}<sup>đ</sup></del></span>
                                        @else
                                            <span class="new-price">{{number_format($spcungloai->prod_original_price).''.''}}<sup>đ</sup></span>
                                        @endif    
                                    </div><!-- End .product-price -->
                                </div>
                            </div><!-- End .product-body -->
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

                </div><!-- End .owl-carousel -->
            </div><!-- End .container -->
        </div><!-- End .page-content -->
@endsection