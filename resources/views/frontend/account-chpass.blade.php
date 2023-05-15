@extends('layouts.home')
@section('title', 'Thay đổi mật khẩu')
@section('css')
    <style>
        #spanStyle {
            color: #f00;
            margin-top: -5px;
            margin-bottom: 5px;
        }
        .input-group-text {
            border: none;
        }
        #spanPassStyle {
            margin-bottom: 12px;
        }
    </style>
@endsection
@section('content')
<div class="page-header text-center" style="background-image:  url('{{ asset('images/gallery/homebg2.jpg') }}')">

    <div class="container">
        <h1 class="page-title">Thay đổi mật khẩu<span> {{Auth::user()->name}}</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="dashboard">
        <div class="container">
            <div class="row">
                <aside class="col-md-2 col-lg-2">
                    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                        <li class="nav-item">
                            <a href="{{url('/account-detail')}}" class="nav-link">Thông tin tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/my-orders')}}" class="nav-link">Đơn hàng của bạn</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/account-edit/'.Auth::user()->id)}}" class="nav-link">Cập nhật tài khoản</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" id="tab-address-link">Thay đổi mật khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('address.index') }}" class="nav-link" id="tab-address-link">Sổ địa chỉ</a>
                        </li>
                    </ul>
                </aside><!-- End .col-lg-3 -->

                <div class="col-md-10 col-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h2 class="checkout-title">Thông tin tài khoản</h2><!-- End .checkout-title -->
                                    <form action="{{ url('/account-chpass') }}" method="POST">
                                        @csrf

                                        <div class="input-group mt-2 password-group">
                                            <label for="oldpassword" class="sr-only">Mật khẩu hiện tại</label>
                                            <input type="password" name="oldpassword" class="form-control password-box" id="current_password" placeholder="Mật khẩu hiện tại">
                                            <div class="input-group-append">
                                              <span class="input-group-text password-visibility" id="spanPassStyle">
                                                <i class="fas fa-eye" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                              </span>
                                            </div>
                                        </div>
                                        <span class="text danger" id="spanStyle">
                                            @error('oldpassword'){{ $message }}@enderror
                                        </span>

                                        <div class="input-group mt-2 password-group">
                                            <label for="password" class="sr-only">Mật khẩu mới</label>
                                            <input id="password" name="password" type="password" class="form-control password-box" name="password" autocomplete="current-password" placeholder="Mật khẩu mới">
                                            <div class="input-group-append">
                                              <span class="input-group-text password-visibility" id="spanPassStyle">
                                                <i class="fas fa-eye" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                              </span>
                                            </div>
                                        </div>
                                        <span class="text danger" id="spanStyle">
                                            @error('password'){{ $message }}@enderror
                                        </span>


                                        <div class="input-group mt-2 password-group">
                                            <label for="password" class="sr-only">Nhập lại mật khẩu</label>
                                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control password-box" name="password" autocomplete="current-password" placeholder="Nhập lại mật khẩu">
                                            <div class="input-group-append">
                                              <span class="input-group-text password-visibility" id="spanPassStyle">
                                                <i class="fas fa-eye" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                              </span>
                                            </div>
                                        </div>
                                        <span class="text danger" id="spanStyle">
                                            @error('password_confirmation'){{ $message }}@enderror
                                        </span>
                                        <br />
                                        <button type="submit" class="btn btn-success">Thay đổi</button>
                                    </form>
                                </div>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</div>
@endsection

@section('scripts')
    <script>
        $(function() {
    $('.password-group').find('.password-box').each(function(index, input) {
        var $input = $(input);
        $input.parent().find('.password-visibility').click(function() {
            var change = "";
            if ($(this).find('i').hasClass('fa-eye')) {
                $(this).find('i').removeClass('fa-eye')
                $(this).find('i').addClass('fa-eye-slash')
                change = "text";
            } else {
                $(this).find('i').removeClass('fa-eye-slash')
                $(this).find('i').addClass('fa-eye')
                change = "password";
            }
            var rep = $("<input type='" + change + "' />")
                .attr('id', $input.attr('id'))
                .attr('name', $input.attr('name'))
                .attr('class', $input.attr('class'))
                .val($input.val())
                .insertBefore($input);
            $input.remove();
            $input = rep;
        }).insertAfter($input);
    });
});

    </script>
@endsection