@extends('layouts.home')
@section('title', 'Giới thiệu')
@section('content')
<div class="">
    <div class="page-header page-header-big text-center" style="background-image: url('{{ asset('images/gallery/aboutus1.jpg') }}')">
        <h1 class="page-title text-white">Về chúng tôi<span class="text-white">iSky</span></h1>
    </div><!-- End .page-header -->
</div>

<div class="page-content pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <h2 class="title">Lịch sử và sứ mệnh</h2>
                <p>
                    <strong>Về giá cả:</strong> Các sản phẩm được bán với giá hợp lý và ưu đãi
                </p>
                <p>
                    <strong>Về thương hiệu:</strong> Hợp tác với các đối tác lớn trên toàn quốc và thế giới
                </p>
                <p>
                    <strong>Đối với khách hàng:</strong> iSky cam kết bán các sản phẩm uy tín và đạt chất lượng cao 
                </p>
                <p>
                    <strong>Kinh nghiệm:</strong> Với hơn 50 kinh nghiệm, iSky đồng hành cùng với khách hàng 24/24 
                </p>
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6">
                <h2 class="title">Phương châm hoạt động</h2>
                <p>
                    Đội ngũ hỗ trợ 24/24
                </p>
                <p>
                    Giá cả hợp lý và ưu đãi 
                </p>
                <p>
                    Sản phậm đạt chất lượng cao
               </p>
                <p>
                    Miễn phí giao hàng trong khu vực
                </p>
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <div class="mb-5"></div><!-- End .mb-4 -->
    </div><!-- End .container -->

    <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3 mb-lg-0">
                    <h2 class="title">Tại sao chọn iSky</h2><!-- End .title -->
                    <p class="lead text-primary mb-3">Với hơn 50 kinh nghiệm trong ngành thời trang, <br>iSky luôn cung cấp các sản phẩm đạt chất lượng cao</p><!-- End .lead text-primary -->
                    <p class="mb-2">Sản phẩm và giá cả tại iSky rất ưu đãi, luôn mang đến cho khách hàng những sản phẩm tốt nhất và ưu đãi nhất. </p>

                    <a href="{{URL::to('/')}}" class="btn btn-sm btn-minwidth btn-outline-primary-2">
                        <span>Mua ngay</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div><!-- End .col-lg-5 -->

                <div class="col-lg-6 offset-lg-1">
                    <div class="about-images">
                        <img src="{{ asset('images/gallery/img-1.jpg')}}" alt="" class="about-img-front">
                        <img src="{{ asset('images/gallery/img-2.jpg') }}" alt="" class="about-img-back">
                    </div><!-- End .about-images -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .bg-light-2 pt-6 pb-6 -->

    <div class="mb-2"></div><!-- End .mb-2 -->

    <div class="about-testimonials bg-light-2 pt-6 pb-6">
        <div class="container">
            <h2 class="title text-center mb-3">Khách hàng nói gì về chúng tôi</h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple owl-testimonials-photo" data-toggle="owl"
                data-owl-options='{
                    "nav": false,
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "1200": {
                            "nav": true
                        }
                    }
                }'>
                <blockquote class="testimonial text-center">
                    <img src="{{ asset('images/gallery/user-1.jpg') }}" alt="user">
                    <p>“ Sản phẩm đạt chất lượng tốt, giá cả hợp lý. ”</p>
                    <cite>
                        Nguyễn Văn A
                        <span>Khách hàng</span>
                    </cite>
                </blockquote><!-- End .testimonial -->

                <blockquote class="testimonial text-center">
                    <img src="{{ asset('images/gallery/user-2.jpg') }}" alt="user">
                    <p>“ Miễn phí giao hàng, hoạt động 24/24. ”</p>

                    <cite>
                        Nguyễn Văn B
                        <span>Khách hàng</span>
                    </cite>
                </blockquote><!-- End .testimonial -->
            </div><!-- End .testimonials-slider owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .bg-light-2 pt-5 pb-6 -->
</div>
@section('scripts')
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
    items:1,
    loop:true,
    autoplay:true,
    autoplayTimeout:2000,
    });
</script>
@stop
@endsection


