@extends('layouts.home')
@section('title', 'Chi tiết bài viết')
@section('css')
    <style>
        #blogImgDetail {
            width: 1170px;
            height: 500px;
        }

        .single-entry .entry-body {
            margin-bottom: -5rem;
        }
    </style>
@endsection
@section('content')
<div class="page-content">
    <div class="page-header text-center" style="background-image: url('{{ asset('images/gallery/homebg2.jpg') }}')">
        <div class="container">
            <h1 class="page-title">Chi tiết bài viết</h1>
        </div><!-- End .container -->
    </div><!-- End .entry-media -->
    <div class="container mt-5">
        <article class="entry single-entry entry-fullwidth">
            <div class="row">
                <div class="col-lg-11">
                    <div class="entry-body">
                            <div class="entry-meta">
                                <span class="entry-author">
                                    Tác giả <a href="#">{{ $blog->author }}</a>
                                </span>
                                {{-- <span class="meta-separator">|</span>
                                <a href="#">Nov 22, 2018</a> --}}
                                {{-- <span class="meta-separator">|</span>
                                <a href="#">2 Comments</a> --}}
                            </div><!-- End .entry-meta -->

                            <h2 class="entry-title entry-title-big">{{ $blog->title }}</h2>
                            <div class="entry-cats">
                                Ngày đăng <a href="#">{{ $blog->created_at ? date('d-m-Y', strtotime($blog->created_at)) : '-' }}</a>
                            </div>
                            <div class="entry-content editor-content">
                                <img id="blogImgDetail" src="{{ asset('uploads/blogImg/'.$blog->blog_image) }}" alt="blogImgDetail">
                                <p>{{ $blog->content }}</p>
                            </div><!-- End .entry-content -->

                            <div class="entry-footer row no-gutters">
                                <div class="col">
                                    <div class="entry-tags">
                                        <span>Hashtags:</span> <a href="#">{{ $blog->hashtag }}</a>
                                    </div><!-- End .entry-tags -->

                                    @if ($blog->link)
                                        <div class="entry-tags mt-2">
                                            <span>Nguồn bài viết:</span> <a href="{{ $blog->link }}">{{ $blog->link }}</a>
                                        </div>
                                    @endif
                                </div><!-- End .col -->
                            </div>   
                            <a id="aBlogDetail" class="btn btn-primary" href="{{ route('blogger.index') }}">Quay lại</a><!-- End .entry-footer row no-gutters -->
                    </div>
                </div>

                
                <div class="col-lg-1 order-lg-first mb-2 mb-lg-0">
                    <div class="sticky-content">
                        <div class="social-icons social-icons-colored social-icons-vertical">
                            <span class="social-label">Chia sẻ:</span>
                            <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .sticky-content -->
                </div><!-- End .col-lg-1 -->
            </div><!-- End .row -->
        </article><!-- End .entry -->

    </div><!-- End .container -->
</div><!-- End .page-content -->
@endsection