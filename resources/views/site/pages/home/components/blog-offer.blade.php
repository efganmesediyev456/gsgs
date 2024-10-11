<div class="row">
    @if($offers and is_array($offers) and array_key_exists($offers, 0))
        <div class="col-md-6">
            <div class="banner-img banner-1 wow fadeIn animated">
                <img src="assets/imgs/banner/banner-5.jpg" alt="">
                <div class="banner-text">
                    <span>{{$offers[0]->title}}</span>
                    <h4>{{$offers[0]->title2}} <br>{{$offers[0]->title3}}</h4>
                    <a href="{{ $offers[0]->url }}">@lang('frontend.blog_offer_shop_now') <i
                            class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        </div>
    @endif


    <div class="col-md-6">
        @if($offers and is_array($offers) and array_key_exists($offers, 1))
            <div class="banner-img mb-15 wow fadeIn animated">
                <img src="{{ get_image($offers[1]->image) }}" alt="">
                <div class="banner-text">
                    <span>{{$offers[1]->title}}</span>
                    <h4>{{$offers[1]->title2}} <br>{{$offers[1]->title3}}</h4>
                    <a href="{{ $offers[1]->url }}">@lang('frontend.blog_offer_shop_now') <i
                            class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        @endif
        @if($offers and is_array($offers) and array_key_exists($offers, 2))

            <div class="banner-img banner-2 wow fadeIn animated">
                <img src="{{ get_image($offers[2]->image) }}" alt="">
                <div class="banner-text">
                    <span>{{$offers[2]->title}}</span>
                    <h4>{{$offers[2]->title2}} <br>{{$offers[2]->title3}}</h4>
                    <a href="{{ $offers[2]->url }}">@lang('frontend.blog_offer_shop_now') <i
                            class="fi-rs-arrow-right"></i></a>
                </div>
            </div>
        @endif
    </div>
</div>
