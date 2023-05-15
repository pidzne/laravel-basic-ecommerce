<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container mobile-menu-light">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="#" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Tìm kiếm</label>
            <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                placeholder="Bạn muốn tìm gì" required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel"
                aria-labelledby="mobile-menu-link">
                <nav class="mobile-nav">
                    <ul class="mobile-menu">
                        <li class="active">
                            <a href="/">Trang chủ</a>
                        </li>
                        <li>
                            <a href="{{ url('/products') }}">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{ url('/about-us') }}" class="sf-with-ul">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}">Liên hệ</a>
                        </li>
                        <li>
                            <a href="{{ url('/faq') }}">FAQ</a>
                        </li>
                    </ul>
                </nav><!-- End .mobile-nav -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->