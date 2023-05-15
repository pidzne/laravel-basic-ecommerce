<div class="intro-slider-container">
    <div class="intro-slider owl-carousel dynamicCarousel1 owl-theme owl-nav-inside owl-light mb-0" data-toggle="owl" data-owl-options='{
            "dots": true,
            "nav": false, 
            "responsive": {
                "1200": {
                    "nav": true,
                    "dots": false
                }
            }
        }'>

        @foreach ($slider as $items)
            <div class="intro-slide" style="background-image: url('{{ asset('uploads/sliderImg/'.$items->slider_image) }}');">
                <div class="container intro-content text-left">
                    <h3 class="intro-subtitle">{{ $items->slider_title }}</h3>
                    <h1 class="intro-title">{{ $items->slider_subtitle1 }}<br><strong>{{ $items->slider_subtitle2 }}</strong></h1>
                    <h3 class="intro-subtitle">{{ $items->slider_subtitle3 }}</h3><!-- End .h3 intro-subtitle -->
                    <a href="{{ url('/products') }}" class="btn btn-round">
                        <span>{{ $items->slider_subtitle4 }}</span>
                    </a>
                </div><!-- End .intro-content -->
                {{-- <img class="position-right" src="assets/images/demos/demo-8/slider/img-1.png"> --}}
            </div>
        @endforeach
        
    </div><!-- End .intro-slider owl-carousel owl-simple -->

    <span class="slider-loader"></span><!-- End .slider-loader -->
</div><!-- End .intro-slider-container -->

@section('scripts')
<script>
    var owl = $('.dynamicCarousel1');
    owl.owlCarousel({
    items:1,
    loop:true,
    autoplay:true,
    autoplayTimeout:2000,
    });
</script>
@endsection