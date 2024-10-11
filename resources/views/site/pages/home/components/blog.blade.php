<div class="swiper-container swiper-theme post-wrapper appear-animate blog_wrapper mb-3"
     data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 1,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '992': {
                            'slidesPerView': 4
                        }
                    }
                }">
    <div class="swiper-wrapper row cols-lg-4 cols-md-3 cols-sm-2 cols-1 carousel_wrapper">
        @foreach($blogs as $blog)
        <div class="swiper-slide post text-center overlay-zoom">
            <figure class="post-media br-sm">
                <a href="{{ url(app()->getLocale().'/blogs/'.$blog->slug) }}">
                    <!-- <img src="assets/images/demos/demo5/blogs/1.jpg" alt="Post" style="background-color: #828896;" /> -->
                    <img src="{{ get_image($blog->image) }}" alt="{{ $blog->title }}" />

                </a>
            </figure>
            <div class="post-details">
                <h4 class="post-title"><a href="{{ url(app()->getLocale().'/blogs/'.$blog->slug) }}">{{ $blog->title }}</a>
                </h4>
                <a href="{{ url(app()->getLocale().'/blogs/'.$blog->slug) }}" class="btn btn-link btn-dark btn-underline">@lang('frontend.read_more')<i
                        class="w-icon-long-arrow-right"></i></a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>
