@extends('layouts.home')
@section('title', 'Liên hệ')
@section('css')
@endsection
@section('content')
<div class="">
    <div class="page-header page-header-big text-center" style="background-image: url('{{ asset('images/gallery/contact1.jpg') }}')">
        <h1 class="page-title text-white">Liên hệ<span class="text-white">với chúng tôi ngay</span></h1>
    </div><!-- End .page-header -->
</div><!-- End .container -->

<div class="page-content pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-2 mb-lg-0">
                <h2 class="title mb-1">Thông tin liên hệ</h2><!-- End .title mb-2 -->
                <p class="mb-3">iSky có rất nhiều các cửa hàng nhỏ trên toàn quốc và thế giới, có thể liên hệ với chúng tôi qua 2 trụ sở chính ở phía dưới</p>
                <div class="row">
                    <div class="col-sm-7">
                        <div class="contact-info">
                            <h3>Trụ sở tại Việt Nam</h3>

                            <ul class="contact-list">
                                <li>
                                    <i class="icon-map-marker"></i>
                                    137 Nguyen Thi Thap, Da Nang 
                                </li>
                                <li>
                                    <i class="icon-phone"></i>
                                    <a href="tel:#">(024) 7300 1955</a>
                                </li>
                                <li>
                                    <i class="icon-envelope"></i>
                                    <a href="mailto:#">caodang@fpt.edu.vn</a>
                                </li>
                            </ul><!-- End .contact-list -->
                        </div><!-- End .contact-info -->
                    </div><!-- End .col-sm-7 -->

                    <div class="col-sm-5">
                        <div class="contact-info">
                            <h3>Trụ sở tại Hoa Kỳ</h3>

                            <ul class="contact-list">
                                <li>
                                    <i class="icon-map-marker"></i>
                                    Manhattan, New York, USA 
                                </li>
                                <li>
                                    <i class="icon-phone"></i>
                                    <a href="tel:#">+1 2345 6789</a>
                                </li>
                                <li>
                                    <i class="icon-envelope"></i>
                                    <a href="mailto:#">isky@iskyshop.info.com</a>
                                </li>
                            </ul><!-- End .contact-list -->
                        </div><!-- <!-- End .contact-info -->
                    </div><!-- End .col-sm-5 -->
                </div><!-- End .row -->
            </div><!-- End .col-lg-6 -->
            <div class="col-lg-6">
                <h2 class="title mb-1">Gửi thông tin liên hệ đến iSky?</h2><!-- End .title mb-2 -->
                <p class="mb-2">Điền thông tin vào form và nhấn gửi</p>

                <form action="{{url('/contact')}}" class="contact-form mb-3" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cname" class="sr-only">Tên</label>
                            <input type="text" class="form-control" id="cname" placeholder="Tên *" name="cname">
                            <span class="text-danger">@error('cname'){{ $message }}@enderror</span>
                        </div><!-- End .col-sm-6 -->

                        <div class="col-sm-6">
                            <label for="cemail" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="cemail" placeholder="Email *" name="cemail">
                            <span class="text-danger">@error('cemail'){{ $message }}@enderror</span>
                        </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cphone" class="sr-only">Số điện thoại</label>
                            <input type="tel" class="form-control" id="cphone" placeholder=" Số điện thoại" name="cphone">
                            <span class="text-danger">@error('cphone'){{ $message }}@enderror</span>
                        </div><!-- End .col-sm-6 -->

                        <div class="col-sm-6">
                            <label for="csubject" class="sr-only">Tiêu đề</label>
                            <input type="text" class="form-control" id="csubject" placeholder="Tiêu đề" name="ctitle">
                            <span class="text-danger">@error('ctitle'){{ $message }}@enderror</span>
                        </div><!-- End .col-sm-6 -->
                    </div><!-- End .row -->

                    <label for="cmessage" class="sr-only">Nội dung</label>
                    <textarea class="form-control" cols="30" rows="4" id="cmessage" placeholder="Nội dung *" name="cmessage"></textarea>
                    <span class="text-danger">@error('cmessage'){{ $message }}@enderror</span>

                    <br />
                    <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm btn-round">
                        <i class="fas fa-paper-plane"></i>
                        <span>Gửi</span>
                    </button>
                </form><!-- End .contact-form -->
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->
    </div>
</div>
@endsection
