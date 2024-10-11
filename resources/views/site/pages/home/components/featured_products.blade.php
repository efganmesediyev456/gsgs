@foreach($products as $pro)
    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
        <div class="product-cart-wrap mb-30">
            <div class="product-img-action-wrap">
                <div class="product-img product-img-zoom">
                    <a href="{{ product_slug($pro->slug) }}">
                        <img class="default-img" src="{{ get_image($pro->image) }}" alt="">
                    </a>
                </div>
            </div>
            <div class="product-content-wrap">
                <div class="product-category">
                    <a href="{{ product_slug($pro->slug) }}">   {{ $pro->title }}</a>
                </div>
                <h2><a href="{{ product_slug($pro->slug) }}">   {{ $pro->subtitle }}</a></h2>
                @include('site.pages.inc.product_price', ['pro'=>$pro])
            </div>
        </div>
    </div>
@endforeach

