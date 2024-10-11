@if($products->count())

    <div class="title-link-wrapper appear-animate mt-10 mb-4">
    <h2 class="title title-link pt-1">@lang('frontend.more_views_products_list')</h2>
    <a href="/{{app()->getLocale()}}/products" class="ls-normal">@lang('frontend.more_products')<i class="w-icon-long-arrow-right"></i></a>
</div>
<div class="swiper-container swiper-theme appear-animate consumer mb-9" data-swiper-options="{
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
    <div class="swiper-wrapper row cols-lg-5 cols-md-4 carousel_wrapper cols-sm-3 cols-2">

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
                            <h4 class="product-name"><a href="{{ product_slug($pro->slug) }}">
                                    {{ $pro->title }}</a></h4>

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
