@if($partners->count())
    <h2 class="title text-left title-client  mb-5 appear-animate">@lang('frontend.customers')</h2>
    <div class="swiper-container swiper-theme  brands-wrapper br-sm mb-10 appear-animate"
         data-swiper-options="{
                    'autoplay': false,
                    'autoplayTimeout': 4000,
                    'loop': true,
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 6
                        },
                        '1200': {
                            'slidesPerView': 8
                        }
                    }
                }">
        <div class="swiper-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-sm-3 cols-2">
            @foreach($partners as $partner)
                <div class="swiper-slide">
                    <figure>
                        <img src="{{ get_image($partner->image) }}" alt="Brand" width="310"
                             height="180"/>
                    </figure>
                </div>
            @endforeach
        </div>
    </div>
@endif
<!-- End of Brands Wrapper -->
