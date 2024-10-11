<div class="carausel-6-columns-cover position-relative" >
    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows">
    </div>
    <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
        @foreach($products as $pro)
        <div class="product-cart-wrap small hover-up">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href="{{ product_slug($pro->slug) }}">
                        <img class="default-img" src="{{ get_image($pro->image) }}" alt="">
                    </a>
                </div>
            </div>
            <div class="product-content-wrap">
                <h2><a href="{{ product_slug($pro->slug) }}"> {{ $pro->title }}</a></h2>
                @include('site.pages.inc.product_price', ['pro'=>$pro])
            </div>
        </div>
        @endforeach

    </div>
</div>
