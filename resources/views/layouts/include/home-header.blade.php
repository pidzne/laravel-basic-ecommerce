<header class="header">
    <div class="header-bottom sticky-header" id="headerStyle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">iSky menu</span>
                    <i class="icon-bars"></i>
                </button>
                
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('images/gallery/logo_1.png') }}" alt="iSky Logo" width="82" height="20">
                </a>
            </div>

            <div class="header-center" id="menuCenterStyle">
                <nav class="main-nav">
                    <ul class="menu">
                        <li class="megamenu-container">
                            <a href="{{ url('/') }}">Trang chủ</a>
                        </li>

                        <li>
                            <a href="{{ url('/products') }}">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{ url('/about-us') }}">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}">Liên hệ</a>
                        </li>
                        <li>
                            <a href="{{ url('/faq') }}">Hỏi đáp</a>
                        </li>
                        <li>
                            <a href="{{ route('blogger.index') }}">Bài viết</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{url('/search')}}" method="GET">
                        @csrf
                        @method('POST')
                        <div class="header-search-wrapper">
                            <label for="search" class="sr-only">Tìm kiếm</label>
                            <input type="search" role="button" class="form-control" name="keywords" placeholder="Nhập..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <a href="{{ url('/wishlist') }}" class="wishlist-link">
                    <i class="icon-heart-o"></i>
                    @if ($wCount > 0)
                        <span class="wishlist-count">  
                            {{ $wCount }}
                        </span>
                    @else
                        <span></span>
                    @endif
                    
                </a>

                {{-- Tài khoản --}}
                <div class="dropdown cart-dropdown">
                    {{-- Kiểm tra người dùng đăng nhập --}}
                    @if (Auth::check())
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            {{-- <i class="icon-user"></i> --}}
                            <img style="width: 32px; height: 32px; border-radius: 100%; margin-right: 10px; display: initial;" src="{{ asset('uploads/userImg/'.Auth::user()->image) }}" alt="noImg" /> 
                            <span class="cart-txt">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                <div class="product">
                                    <div class="product-cart-details">
                                        {{-- <img style="width: 32px; height: 32px; border-radius: 100%; margin-right: 10px; display: initial;" src="{{asset('uploads/userImg/'.Auth::user()->image)}}" alt="userImg"/> 
                                        {{ Auth::user()->name }} <span class="caret"></span> --}}
                                        <span style="font-size: 15px; color: #000000">{{ Auth::user()->role=='1'?'Quản trị viên':'Khách hàng iSky' }}</span>
                                    </div><!-- End .product-cart-details -->     
                                </div><!-- End .product -->
                                <div>
                                    <ul>
                                        <li class="nav-item dropdown">             
                                            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                                                {{-- Nếu vai trò là quản trị viên thì hiển thị menu truy cập trang dashboard --}}
                                                @if (Auth::user()->role=='1')
                                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                                    <i class="fas fa-user-cog"></i>
                                                    <span style="font-size: 15px; color: #000000">Trang quản trị</span>
                                                </a>
                                               @endif
                    
                                                <a class="dropdown-item" href="{{ url('account-detail') }}">
                                                    <i class="fas fa-info-circle"></i>
                                                    <span style="font-size: 15px; color: #000000">Thông tin tài khoản</span>
                                                </a>
                    
                                                <a class="dropdown-item" href="{{ url('my-orders') }}">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    <span style="font-size: 15px; color: #000000">Đơn hàng của bạn</span>
                                                </a>

                                                <a class="dropdown-item" href="{{ route('address.index') }}">
                                                    <i class="fas fa-address-book"></i>
                                                    <span style="font-size: 15px; color: #000000">Sổ địa chỉ</span>
                                                </a>
                    
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="fas fa-sign-out-alt"></i>
                                                    <span style="font-size: 15px; color: #000000">{{ __('Đăng xuất') }}</span>
                                                </a>
                    
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            {{-- </div> --}}
                                        </li>
                                    </ul>
                                </div>      
                            </div><!-- End .cart-product -->
                        </div><!-- End .dropdown-menu -->
                    @else
                    {{-- Chưa đăng nhập --}}
                    <a href="{{ route('login') }}" class="dropdown-toggle" role="button" data-display="static" title="Tài khoản">
                        <i class="icon-user"></i>
                        {{-- <span class="cart-txt"></span> --}}
                    </a>
                    @endif
                    {{-- <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="product.html">NoName123456789</a>       
                                    </h4>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="assets/images/products/cart/product-1.jpg" alt="product">
                                    </a>
                                </figure>
                                
                            </div><!-- End .product -->
                            <div>
                                <ul>
                                    <li>a</li>
                                    <li>a</li>
                                    <li>a</li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/my-orders') }}">
                                            <i class="fas fa-shopping-cart"></i>
                                            <span style="font-size: 15px; color: #000000">Đơn hàng của bạn</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div><!-- End .cart-product -->
                    </div><!-- End .dropdown-menu --> --}}
                </div><!-- End .cart-dropdown -->
              
                {{-- Giỏ hàng --}}
                <div class="dropdown cart-dropdown">
                    {{-- Đếm số lượng nhỏ bên giỏ hàng --}}
                    @if (count(Cart::content()))
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count"><?=count(Cart::content())?></span>
                        <span class="cart-txt"></span>
                    </a>
                    @else
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                    </a>
                    @endif
                    {{-- Nội dung giỏ hàng --}}
                    @php
                        $content = Cart::content()
                    @endphp
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            <?php $total=0 ?>
                            @foreach ($content as $cart )
                            <?php $total+= $cart->price ?>
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="product.html">{{ $cart->name }}</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">{{$cart->qty}} X {{ $cart->price }}</span>
                                        = {{$cart->qty  * $cart->price }}
                                    </span>
                                </div><!-- End .product-cart-details -->

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="{{ asset('uploads/prodImg/'.$cart->options->image) }}" alt="product">
                                    </a>
                                </figure>
                                {{-- Xóa sản phẩm khỏi giỏ hàng --}}
                                {{-- <input type="hidden" value="{{$cart->rowId}}" name="rowIdCartIndex"> --}}
                                <a href="{{url('/delete-prod-cart/'.$cart->rowId)}}" class="btn-remove" title="Remove Product" type="button"><i class="icon-close"></i></a>
                            </div><!-- End .product -->
                            @endforeach     
                        </div><!-- End .cart-product -->

                        <div class="dropdown-cart-total">
                            <span>Tổng tiền</span>
                            <span class="cart-total-price">
                                @php
                                if(isset($cart)) {
                                    $total += $cart->price * $cart->qty;
                                    echo Cart::priceTotal(0,'.','.').''.'đ';
                                } else {
                                    echo '<span>0<sup>đ</sup></span>';
                                }
                                @endphp
                            </span>
                        </div><!-- End .dropdown-cart-total -->

                        <div class="dropdown-cart-action">
                            <a href="{{ url('/cart') }}" class="btn btn-primary">Xem hàng</a>
                            <a href="{{ url('/checkout') }}" class="btn btn-outline-primary-2"><span>Mua hàng</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .dropdown-cart-total -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->

















