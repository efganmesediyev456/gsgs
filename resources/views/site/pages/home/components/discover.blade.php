@if($discover)
<section class="banner-2 section-padding pb-0">
    <div class="container">
        <div class="banner-img banner-big wow fadeIn animated f-none banner-printer">
            <img src="{{ get_image($discover->image) }}" alt="{{ $discover->title }}">
            <div class="banner-text d-md-block d-none">
                <h4 class="mb-15 mt-40 text-brand">     {{ $discover->title }}</h4>
                <h1 class="fw-600 mb-20">     {{ $discover->title2 }} <br>     {{ $discover->title3 }}</h1>
                <a href="{{ $discover->url }}" class="btn">@lang('frontend.learn_more') <i class="fi-rs-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
@endif
