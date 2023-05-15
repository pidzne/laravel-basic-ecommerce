@extends('layouts.home')
@section('title', 'Hỏi đáp')
@section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('images/gallery/homebg2.jpg') }}')">
    <div class="container">
        <h1 class="page-title">Câu hỏi thường gặp về iSky</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Hỏi đáp</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <h2 class="title text-center mb-3">Về iSky</h2><!-- End .title -->
        <div class="accordion accordion-rounded" id="accordion-1">
            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading-1">
                    <h2 class="card-title">
                        <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                            iSky là gì?
                        </a>
                    </h2>
                </div><!-- End .card-header -->
                <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-1">
                    <div class="card-body">
                        iSky là trang web bán hàng gồm có 2 thành phần chính. Thành phần thứ nhất là trang người dùng. Thành phần thứ hai là trang quản trị, chỉ quản trị viên mới có thể truy cập.
                    </div><!-- End .card-body -->
                </div><!-- End .collapse -->
            </div><!-- End .card -->

            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading-2">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                            Tại sao khách hàng lại sử dụng iSky?
                        </a>
                    </h2>
                </div><!-- End .card-header -->
                <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-1">
                    <div class="card-body">
                        <ul>
                            <li>Khám phá trang web và sản phẩm mới </li>
                            <li>Mua hàng trên web nhanh chóng và tiện lợi</li>
                            <li>Xem đơn hàng</li>
                            <li>Nhận đề xuất mua sắm dựa vào nhu cầu mua sắm và sản phẩm yêu thích</li>
                            <li>Nhận ưu đãi cực hot và giảm giá tùy chỉnh</li>
                        </ul>
                    </div><!-- End .card-body -->
                </div><!-- End .collapse -->
            </div><!-- End .card -->

            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading-3">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                            Các sản phẩm trên iSky có chất lượng như thế nào?
                        </a>
                    </h2>
                </div><!-- End .card-header -->
                <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-1">
                    <div class="card-body">
                        Với hơn 50 kinh nghiệm trong lĩnh vực kinh doanh, iSky luôn đem đến cho khách hàng những sản phẩm đạt chất lượng quốc tế
                    </div><!-- End .card-body -->
                </div><!-- End .collapse -->
            </div><!-- End .card -->
        </div><!-- End .accordion -->

        <h2 class="title text-center mb-3">Đơn hàng</h2><!-- End .title -->
        <div class="accordion accordion-rounded" id="accordion-2">
            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading2-1">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-1" aria-expanded="false" aria-controls="collapse2-1">
                            Sử dụng trang thanh toán
                        </a>
                    </h2>
                </div><!-- End .card-header -->
                <div id="collapse2-1" class="collapse" aria-labelledby="heading2-1" data-parent="#accordion-2">
                    <div class="card-body">
                        Từ thanh menu điều hướng, khách hàng chỉ cần truy cập trang thanh toán là có thể tới trang thanh toán
                    </div><!-- End .card-body -->
                </div><!-- End .collapse -->
            </div><!-- End .card -->

            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading2-2">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-2" aria-expanded="false" aria-controls="collapse2-2">
                            Khách hàng vẫn chưa nhận được hàng
                        </a>
                    </h2>
                </div><!-- End .card-header -->
                <div id="collapse2-2" class="collapse" aria-labelledby="heading2-2" data-parent="#accordion-2">
                    <div class="card-body">
                        Liên hệ ngay với iSky theo số điện thoại 0123456789 để được hỗ trợ
                    </div><!-- End .card-body -->
                </div><!-- End .collapse -->
            </div><!-- End .card -->

            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading2-3">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse2-3" aria-expanded="false" aria-controls="collapse2-3">
                            Làm thế nào để hủy đơn hàng
                        </a>
                    </h2>
                </div><!-- End .card-header -->
                <div id="collapse2-3" class="collapse" aria-labelledby="heading2-3" data-parent="#accordion-2">
                    <div class="card-body">
                        Click hủy đơn hàng trong trang đơn hàng
                    </div><!-- End .card-body -->
                </div><!-- End .collapse -->
            </div><!-- End .card -->
        </div><!-- End .accordion -->

        <h2 class="title text-center mb-3">Thanh toán</h2><!-- End .title -->
        <div class="accordion accordion-rounded" id="accordion-3">
            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading3-1">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-1" aria-expanded="false" aria-controls="collapse3-1">
                            Phương thức thanh toán nào được sử dụng tại iSky
                        </a>
                    </h2>
                </div><!-- End .card-header -->
                <div id="collapse3-1" class="collapse" aria-labelledby="heading3-1" data-parent="#accordion-3">
                    <div class="card-body">
                        Thanh toán trực tiếp
                    </div><!-- End .card-body -->
                </div><!-- End .collapse -->
            </div><!-- End .card -->

            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading3-2">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-2" aria-expanded="false" aria-controls="collapse3-2">
                            Không thể thanh toán?
                        </a>
                    </h2>
                </div><!-- End .card-header -->
                <div id="collapse3-2" class="collapse" aria-labelledby="heading3-2" data-parent="#accordion-3">
                    <div class="card-body">
                        Hãy load lại trang web nếu không thể thanh toán
                    </div><!-- End .card-body -->
                </div><!-- End .collapse -->
            </div><!-- End .card -->

            <div class="card card-box card-sm bg-light">
                <div class="card-header" id="heading3-3">
                    <h2 class="card-title">
                        <a class="collapsed" role="button" data-toggle="collapse" href="#collapse3-3" aria-expanded="false" aria-controls="collapse3-3">
                            Thanh toán có nhanh không?
                        </a>
                    </h2>
                </div><!-- End .card-header -->
                <div id="collapse3-3" class="collapse" aria-labelledby="heading3-3" data-parent="#accordion-3">
                    <div class="card-body">
                        Nhanh chóng và tiện lợi
                    </div><!-- End .card-body -->
                </div><!-- End .collapse -->
            </div><!-- End .card -->

        </div><!-- End .accordion -->
    </div><!-- End .container -->
</div><!-- End .page-content -->

<div class="cta cta-display bg-image pt-4 pb-4" style="background-image: url('{{ asset('images/gallery/bg-1.jpg') }}');">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-7">
                <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                    <div class="col">
                        <h3 class="cta-title text-white">Nếu có nhiều câu hỏi hơn</h3><!-- End .cta-title -->
                        <p class="cta-desc text-white">Liên hệ với iSky ngay</p><!-- End .cta-desc -->
                    </div><!-- End .col -->

                    <div class="col-auto">
                        <a href="{{ url('/contact') }}" class="btn btn-outline-white btn-round"><span>Liên hệ ngay</span></a>
                    </div><!-- End .col-auto -->
                </div><!-- End .row no-gutters -->
            </div><!-- End .col-md-10 col-lg-9 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .cta -->
@endsection