<section class="home-slider position-relative pt-25 pb-20"></section>
<div class="container">
    <div class="row d-flex justify-content-end gap-4 gap-xl-0 main_swiper">
        <div class="col-lg-8 col-xl-6 h-100">
            <div class="position-relative">
                <div class="hero-slider-1 style-3 dot-style-1 dot-style-1-position-1">
                    @foreach($sliders as $key =>$slide)

                        <div class="single-hero-slider single-animation-wrap home_swiper">
                            <div class="container">
                                <div class="slider-1-height-3 slider-animated-1">
                                    <div class="hero-slider-content-2">
                                        <h4 class="animated">{{$slide->title}}</h4>
                                        <h2 class="animated fw-900">{{$slide->title2}}</h2>
                                        <h1 class="animated fw-900 text-brand">{{$slide->title3}}</h1>
                                        <p class="animated">{{$slide->title4}}</p>
                                        <a class="animated btn btn-brush btn-brush-3" href="{{ $slide->url }}">
                                            {{ __('frontend.order_right_now') }}
                                        </a>
                                    </div>
                                    <div class="slider-img"><img src="{{get_image($slide->image1)}}" alt=""></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="slider-arrow hero-slider-1-arrow style-3"></div>
            </div>
        </div>

        <div class="col-xl-3 d-none d-xl-block home_swiper_end">
            @foreach($statics as $key => $static)
                @if($key == 0)
                    <div class="banner-img banner-1 wow fadeIn  animated home-3">
                        <img class="border-radius-10" src="{{ get_image($static->image1) }}" alt="">
                        <div class="banner-text">
                            <span>{{ $static->title }}</span>
                            <h4>{{ $static->title2 }} <br>{{ $static->title3 }}</h4>
                            <a href="{{$static->url}}">{{ __('frontend.order_now') }} <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                @endif
                @if($key == 1)
                    <div class="banner-img banner-2 wow fadeIn  animated mb-0">
                        <img class="border-radius-10" src="{{ get_image($static->image1) }}" alt="">
                        <div class="banner-text">
                            <span>{{ $static->title }}</span>
                            <h4>{{ $static->title2 }} <br>{{ $static->title3 }}</h4>
                            <a href="{{$static->url}}">{{ __('frontend.order_now') }} <i class="fi-rs-arrow-right"></i></a>
                        </div>
                    </div>
                @endif

            @endforeach

        </div>
    </div>
</div>
</section>
