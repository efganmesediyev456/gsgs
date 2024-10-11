<section class="section-padding pt-50">
    <div class="container">
        <h3 class="section-title mb-20 wow fadeIn animated"><span>@lang('frontend.brand_title1')</span> @lang('frontend.brand_title2')</h3>


        <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
            <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                @foreach($brends as $brend)
                <div class="brand-logo"><img class="img-grey-hover" src="{{ get_image($brend->image) }}" alt="{{$brend->title}}"></div>
                @endforeach
            </div>
        </div>

    </div>
</section>
