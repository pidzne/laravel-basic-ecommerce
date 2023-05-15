<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('category.index') }}">
          <i class="mdi mdi-folder-outline menu-icon"></i>
          <span class="menu-title">Danh mục sản phẩm</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('brand.index')}}">
          <i class="mdi mdi-trophy-outline menu-icon"></i>
          <span class="menu-title">Thương hiệu</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('product.index')}}">
          <i class="mdi mdi-grid-large menu-icon menu-icon"></i>
          <span class="menu-title">Sản phẩm</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('user_admin.index')}}">
          <i class="mdi mdi-account-outline menu-icon"></i>
          <span class="menu-title">Tài khoản</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">
          <i class="mdi mdi-comment-text-outline menu-icon"></i>
          <span class="menu-title">Bình luận</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('order_admin.index')}}">
          <i class="mdi mdi-cart-outline menu-icon"></i>
          <span class="menu-title">Đơn hàng</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('contact.index')}}">
          <i class="mdi mdi-information-outline menu-icon"></i>
          <span class="menu-title">Liên hệ</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('slider.index')}}">
          <i class="mdi mdi-image-filter menu-icon"></i>
          <span class="menu-title">Slider</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('blog_cate.index')}}">
          <i class="mdi mdi-clipboard-outline menu-icon"></i>
          <span class="menu-title">Danh mục bài viết</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('blog.index')}}">
          <i class="mdi mdi-certificate menu-icon"></i>
          <span class="menu-title">Bài viết</span>
        </a>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('shipping_fee.index')}}">
          <i class="mdi mdi-cube-outline menu-icon"></i>
          <span class="menu-title">Phương thức vận chuyển</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('coupon.index')}}">
          <i class="mdi mdi-label-outline menu-icon"></i>
          <span class="menu-title">Mã giảm giá</span>
        </a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link" href="{{route('analytic.index')}}">
          <i class="mdi mdi-chart-line menu-icon"></i>
          <span class="menu-title">Thống kê</span>
        </a>
      </li>

    </ul>
  </nav>