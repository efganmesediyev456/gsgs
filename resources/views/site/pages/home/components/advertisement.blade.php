<section class="banners mb-15">
    <div class="container">
        <div class="row">
            @foreach($advertisements as $key=>$advertisement)
                @if($key == 0)
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{ get_image($advertisement->image) }}" alt="{{ $advertisement->title }}">
                            <div class="banner-text">
                                <span>{{ $advertisement->title }}</span>
                                <h4>{{ $advertisement->title2 }} <br>{{ $advertisement->title3 }}</h4>
                                <a href="{{ $advertisement->url }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
                @if($key == 1)
                    <div class="col-lg-4 col-md-6">
                        <div class="banner-img wow fadeIn animated">
                            <img src="{{ get_image($advertisement->image) }}" alt="{{ $advertisement->title }}">
                            <div class="banner-text">
                                <span>{{ $advertisement->title }}</span>
                                <h4>{{ $advertisement->title2 }} <br>{{ $advertisement->title3 }}</h4>
                                <a href="{{ $advertisement->url }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
                @if($key == 2)
                    <div class="col-lg-4 d-md-none d-lg-flex">
                        <div class="banner-img wow fadeIn animated  mb-sm-0">
                            <img src="{{ get_image($advertisement->image) }}" alt="">
                            <div class="banner-text">
                                <span>{{ $advertisement->title }}</span>
                                <h4>{{ $advertisement->title2 }} <br>{{ $advertisement->title3 }}</h4>
                                <a href="{{ $advertisement->url }}">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach

        </div>
    </div>
</section>
