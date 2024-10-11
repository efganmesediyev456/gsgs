@if($products->count())
<div class="title-link-wrapper  appear-animate mb-4" style="margin-top: 50px;">
    <h2 class="title title-link pt-1">@lang('frontend.discounts_of_today')</h2>
    <!-- <div
        class="product-countdown-container font-size-sm text-white bg-secondary align-items-center mr-auto">
        <label>Offer Ends in: </label>
        <div class="product-countdown countdown-compact ml-1 font-weight-bold" data-until="+10d"
            data-relative="true" data-compact="true">10days,00:00:00</div>
    </div> -->
    <a href="/{{app()->getLocale()}}/products">@lang('frontend.more_products')<i class="w-icon-long-arrow-right"></i></a>
</div>
<div class="swiper-container swiper-theme appear-animate deals-of-day mb-6" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '1200': {
                            'slidesPerView': 5
                        }
                    }
                }">
    <div class="swiper-wrapper row cols-lg-5 cols-md-4 cols-sm-3 cols-2 carousel_wrapper">
        @if($products->count()>=10)
        @foreach($products->chunk(2) as $products_list)
        <div class="swiper-slide product-wrap">
            @foreach($products_list as $pro)
            <div class="product text-center">
                <figure class="product-media">
                    <a href="{{ product_slug($pro->slug) }}">
                        <!-- <img src="assets/images/demos/demo5/products/1-1-1.jpg" alt="Product" width="300" height="338"> -->
                        <!-- <img src="assets/images/demos/demo5/products/1-1-2.jpg" alt="Product" width="300" height="338"> -->
                        <img src="{{ get_image($pro->image) }}" alt="Product">
                    </a>
                    <!-- <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                            title="Add to cart"></a>
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                            title="Add to wishlist"></a>
                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                            title="Quickview"></a>
                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                            title="Add to Compare"></a>
                    </div> -->
                </figure>
                <div class="product-details">
                    <h4 class="product-name"><a href="{{ product_slug($pro->slug) }}">{{ $pro->title }}</a></h4>

                    @include('site.pages.inc.product_price', ['pro'=>$pro])


                </div>
            </div>
            @endforeach
        </div>
        @endforeach
        @else
        @foreach($products as $pro)
        <div class="swiper-slide product-wrap">
            <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ product_slug($pro->slug) }}">
                                    <!-- <img src="assets/images/demos/demo5/products/1-1-1.jpg" alt="Product" width="300" height="338"> -->
                                    <!-- <img src="assets/images/demos/demo5/products/1-1-2.jpg" alt="Product" width="300" height="338"> -->
                                    <img src="{{ get_image($pro->image) }}" alt="Product">
                                </a>
                                <!-- <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                        title="Add to cart"></a>
                                    <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"></a>
                                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quickview"></a>
                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"></a>
                                </div> -->
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="{{ product_slug($pro->slug) }}">{{ $pro->title }}</a></h4>

                                @include('site.pages.inc.product_price', ['pro'=>$pro])


                            </div>
                        </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="swiper-pagination"></div>
</div>
@endif
