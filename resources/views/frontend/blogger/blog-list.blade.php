@extends('layouts.home')
@section('title', 'Danh sách bài viết')
@section('css')
    <style>
        #blogImg {
            width: 400px;
            height: 250px;
        }
        #blogImgRandom {
            width: 80px;
            height: 80px;
        }
    </style>
@endsection
@section('content')
<div class="page-header text-center" style="background-image: url('{{ asset('images/gallery/homebg2.jpg') }}')">
    <div class="container">
        <h1 class="page-title">Danh sách bài viết</h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="#">Bài viết</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                @foreach ($blog as $value)
                    <article class="entry entry-list">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <figure class="entry-media">
                                    <a href="{{ route('blogger.show', ['id'=>$value->id]) }}">
                                        <img src="{{ asset('uploads/blogImg/'.$value->blog_image) }}" alt="blogImg" id="blogImg">
                                    </a>
                                </figure><!-- End .entry-media -->
                            </div><!-- End .col-md-5 -->

                            <div class="col-md-7">
                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <p>{{ $value->created_at ? date('d-m-Y', strtotime($value->created_at)) : '-' }}</p>
                                    </div>

                                    <h2 class="entry-title">
                                        <a href="{{ route('blogger.show', ['id'=>$value->id]) }}">{{ $value->title }}</a>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        by <a href="#">{{ $value->author }}</a>
                                        {{-- <a href="#">, Shopping</a> --}}
                                    </div><!-- End .entry-cats -->

                                    <div class="entry-content">
                                        {{-- <p>{!! str_limit($value->content, 10)  !!}</p> --}}
                                        <p>{{  Str::limit($value->content, 156, '...') }}</p>
                                        <a href="{{ route('blogger.show', ['id'=>$value->id]) }}" class="read-more">Xem thêm</a>
                                    </div><!-- End .entry-content -->
                                </div><!-- End .entry-body -->
                            </div><!-- End .col-md-7 -->
                        </div><!-- End .row -->
                    </article>
                @endforeach
                {{-- <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                            </a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link page-link-next" href="#" aria-label="Next">
                                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </nav> --}}
            </div><!-- End .col-lg-9 -->

            <aside class="col-lg-3">
                <div class="sidebar">
                    <div class="widget widget-search">
                        <h3 class="widget-title">Tìm kiếm</h3><!-- End .widget-title -->

                        <form action="{{ route('blogger.search') }}" method="GET">
                            @csrf
                            <input type="search" class="form-control" name="searchByBlogName" placeholder="Bạn muốn tìm gì?">
                            <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Tìm kiếm</span></button>
                        </form>
                    </div>

                    <div class="widget widget-cats">
                        <h3 class="widget-title">Danh mục bài viết</h3>
                        <ul>
                            @foreach ($blogCate as $value)
                                <li><a href="{{ route('blogger.cate', ['id'=>$value->id]) }}">{{ $value->blog_cate_name }}<span></span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget">
                        <h3 class="widget-title">Các bài viết đề xuất</h3>

                        <ul class="posts-list">
                            @foreach ($blogRandom as $value)
                                <li>
                                    <figure>
                                        <a href="{{ route('blogger.show', ['id'=>$value->id]) }}">
                                            <img id="blogImgRandom" src="{{ asset('uploads/blogImg/'.$value->blog_image) }}" alt="blogImg">
                                        </a>
                                    </figure>

                                    <div>
                                        <span>{{ $value->created_at ? date('d-m-Y', strtotime($value->created_at)) : '-' }}</span>
                                        <h4><a href="{{ route('blogger.show', ['id'=>$value->id]) }}">{{ $value->title }}</a></h4>
                                    </div>
                                </li> 
                            @endforeach  
                        </ul>
                    </div>

                    {{-- <div class="widget widget-banner-sidebar">
                        <div class="banner-sidebar-title">ad box 280 x 280</div><!-- End .ad-title -->
                        
                        <div class="banner-sidebar banner-overlay">
                            <a href="#">
                                <img src="" alt="banner">
                            </a>
                        </div>
                    </div> --}}

                    <div class="widget">
                        <h3 class="widget-title">Hashtags</h3>
                        <div class="tagcloud">
                            @foreach ($blogHashtag as $value)
                                <a href="#">{{ $value->hashtag }}</a>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="widget widget-text">
                        <h3 class="widget-title">About Blog</h3>

                        <div class="widget-text-content">
                            <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, pulvinar nunc sapien ornare nisl.</p>
                        </div>
                    </div> --}}
                </div><!-- End .sidebar -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->
</div><!-- End .page-content -->
@endsection