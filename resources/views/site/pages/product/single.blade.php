@extends('site.layouts.main')

@section('content')

    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/{{app()->getLocale()}}" rel="nofollow">{{ __('frontend.home_page') }}</a>
                    <span></span>
                    <a href="/{{app()->getLocale()}}/products" rel="nofollow">{{ __('frontend.products_page') }}</a>
                    <span></span> {{ $item->title }}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 justify-content-md-between">
                                <div class="col-md-5 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ get_image($item->image) }}" alt="product image">
                                            </figure>
                                            @foreach($item->media->where('status',1)->sortByDesc('id') as $media)
                                                <figure class="border-radius-10">
                                                    <img src="{{ get_image($media->file) }}" alt="product image">
                                                </figure>
                                            @endforeach

                                        </div>
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                            <div><img src="{{ get_image($item->image) }}" alt="product image"></div>
                                            @foreach($item->media->where('status',1)->sortByDesc('id') as $media)
                                                <div><img src="{{ get_image($media->file) }}" alt="product image"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Share this:</strong></li>
                                            <li class="social-facebook"><a href="#"><img
                                                        src="../assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                                            </li>
                                            <li class="social-twitter"><a href="#"><img
                                                        src="../assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                                            </li>
                                            <li class="social-instagram"><a href="#"><img
                                                        src="../assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                                            </li>
                                            <li class="social-linkedin"><a href="#"><img
                                                        src="../assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail">{{ $item->title }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> @lang('frontend.product_brand'): <a
                                                        href="javascript:void(0)">{{$item->brend->title}}</a></span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">

                                                <ins><span class="text-brand">
                                                        @if($item->price)
                                                            {{$item->price}} AZN
                                                        @endif
                                                    </span></ins>
                                                <ins>
                                                    @if($item->discount_price)
                                                        <span class="old-price font-md ml-15">
                                                        {{$item->discount_price}} AZN
                                                    </span>
                                                    @endif
                                                </ins>
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30 ">
                                            {!! $item->subtitle !!}
                                        </div>
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                            <div class="detail-qty border radius">
                                                <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                <span class="qty-val">1</span>
                                                <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                            </div>
                                            <div class="product-extra-link2">
                                                <button style="background-color: green!important; border:unset!important;"
                                                    data-message="{{ __('frontend.i_want_to_buy_this_product') . ' ' . $item->title . ' : ' . product_slug($item->slug) }}"
                                                    data-number="{{ $mainsetting->whatsapp }}" type="submit"
                                                    class="button button-add-to-cart btn-cart">

                                                    <svg  version="1.0" xmlns="http://www.w3.org/2000/svg"
                                                         width="24px" height="24px"
                                                         viewBox="0 0 720.000000 552.000000"
                                                         preserveAspectRatio="xMidYMid meet">

                                                        <g transform="translate(0.000000,552.000000) scale(0.100000,-0.100000)"
                                                           fill="white" stroke="none">
                                                            <path d="M3255 5385 c-119 -21 -188 -38 -330 -79 -60 -18 -133 -43 -160 -56
                                                                -11 -5 -47 -20 -80 -34 -94 -39 -261 -129 -359 -194 -372 -247 -671 -588 -855
                                                                -977 -77 -164 -102 -229 -156 -415 -161 -551 -90 -1221 184 -1744 29 -54 58
                                                                -108 66 -120 13 -19 3 -54 -105 -376 -66 -195 -154 -458 -196 -585 -42 -126
                                                                -84 -252 -95 -279 -28 -73 -27 -75 28 -60 27 7 89 26 138 42 50 16 171 55 270
                                                                87 99 31 225 72 280 90 55 18 161 51 235 75 74 24 181 58 237 76 56 19 109 34
                                                                118 34 9 0 46 -16 83 -36 37 -19 94 -47 127 -60 33 -14 69 -29 80 -34 100 -46
                                                                356 -114 555 -146 104 -17 495 -24 580 -11 19 3 69 11 110 17 136 20 355 76
                                                                470 120 30 12 73 28 94 36 50 18 289 139 324 163 15 10 54 36 87 57 84 53 277
                                                                209 355 285 264 260 488 612 597 939 118 355 156 691 118 1045 -31 287 -101
                                                                538 -227 805 -56 119 -202 354 -269 435 -124 147 -190 217 -301 317 -350 313
                                                                -763 509 -1243 588 -181 30 -578 27 -760 -5z m705 -390 c148 -26 282 -62 435
                                                                -119 22 -8 90 -39 152 -70 494 -248 861 -677 1031 -1206 102 -314 120 -687 50
                                                                -1025 -11 -55 -27 -115 -34 -134 -8 -18 -14 -40 -14 -48 0 -24 -91 -244 -139
                                                                -333 -70 -134 -174 -287 -255 -380 -57 -65 -191 -195 -246 -240 -30 -25 -61
                                                                -50 -68 -57 -60 -58 -360 -227 -472 -268 -162 -58 -272 -88 -450 -122 -134
                                                                -25 -466 -25 -600 0 -184 35 -292 64 -450 122 -56 21 -267 128 -315 160 -43
                                                                30 -52 30 -124 5 -31 -10 -157 -51 -281 -90 -124 -39 -250 -79 -280 -89 -113
                                                                -37 -132 -43 -135 -39 -2 2 27 96 66 208 38 113 88 261 110 330 23 69 48 144
                                                                56 167 l15 41 -48 74 c-64 97 -65 98 -119 208 -26 52 -52 104 -57 114 -24 45
                                                                -88 252 -112 356 -47 210 -59 480 -31 690 82 601 404 1111 920 1452 41 27 224
                                                                128 232 128 3 0 19 6 36 14 186 85 438 151 647 169 100 9 389 -2 480 -18z"/>
                                                                                                                            <path d="M2755 4157 c-82 -41 -199 -171 -246 -276 -82 -180 -83 -420 -3 -616
                                                                44 -108 106 -226 162 -308 17 -26 32 -50 32 -52 0 -5 94 -141 124 -180 186
                                                                -244 439 -493 621 -610 189 -122 577 -283 775 -321 116 -22 248 0 386 66 94
                                                                45 172 104 213 161 44 60 81 186 81 273 0 85 -1 86 -109 142 -40 22 -103 55
                                                                -140 75 -248 133 -305 159 -347 159 -37 0 -46 -5 -65 -32 -27 -38 -165 -195
                                                                -208 -237 -42 -41 -64 -45 -119 -25 -84 32 -289 146 -312 174 -3 4 -27 22 -55
                                                                40 -71 49 -252 232 -317 320 -80 110 -168 264 -168 295 0 19 23 52 83 118 130
                                                                145 158 208 122 276 -15 29 -20 45 -80 211 -18 52 -43 120 -55 150 -12 30 -25
                                                                66 -29 80 -5 14 -18 44 -29 67 -26 50 -51 60 -177 68 -82 5 -94 4 -140 -18z"/>
                                                        </g>
                                                    </svg>
                                                    @lang('frontend.order_with_whatsapp')

                                                </button>
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">@lang('frontend.product_sku'): <a href="#">{{$item->sku}}</a></li>
                                            <li class="mb-5">@lang('frontend.product_tags'):
                                                @if($item->tags and explode(',', $item->tags))
                                                    @foreach(explode(',', $item->tags) as $tag)

                                                        <a href="" rel="tag">{{$tag}}  @if(!$loop->last) , @endif</a>
                                                    @endforeach
                                            @endif
                                            <li>@lang('froontend.product_availability'):<span
                                                    class="in-stock text-success ml-5">{{$item->stock_count}} @lang('frontend.product_items_in_stock')</span></li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                           href="#Description">@lang('frontend.product_description')</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">

                                            {!! $item->desc !!}
                                            <ul class="product-more-infor mt-30">
                                                @foreach($item->parameters->where("status", 1) as $item)
                                                <li><span>{{$item->parent->title}}</span> {{$item->title}}</li>
                                                @endforeach
                                            </ul>
                                            <hr class="wp-block-separator is-style-dots">
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info">
                                        <table class="font-md">
                                            <tbody>
                                            <tr class="stand-up">
                                                <th>Stand Up</th>
                                                <td>
                                                    <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-wo-wheels">
                                                <th>Folded (w/o wheels)</th>
                                                <td>
                                                    <p>32.5″L x 18.5″W x 16.5″H</p>
                                                </td>
                                            </tr>
                                            <tr class="folded-w-wheels">
                                                <th>Folded (w/ wheels)</th>
                                                <td>
                                                    <p>32.5″L x 24″W x 18.5″H</p>
                                                </td>
                                            </tr>
                                            <tr class="door-pass-through">
                                                <th>Door Pass Through</th>
                                                <td>
                                                    <p>24</p>
                                                </td>
                                            </tr>
                                            <tr class="frame">
                                                <th>Frame</th>
                                                <td>
                                                    <p>Aluminum</p>
                                                </td>
                                            </tr>
                                            <tr class="weight-wo-wheels">
                                                <th>Weight (w/o wheels)</th>
                                                <td>
                                                    <p>20 LBS</p>
                                                </td>
                                            </tr>
                                            <tr class="weight-capacity">
                                                <th>Weight Capacity</th>
                                                <td>
                                                    <p>60 LBS</p>
                                                </td>
                                            </tr>
                                            <tr class="width">
                                                <th>Width</th>
                                                <td>
                                                    <p>24″</p>
                                                </td>
                                            </tr>
                                            <tr class="handle-height-ground-to-handle">
                                                <th>Handle height (ground to handle)</th>
                                                <td>
                                                    <p>37-45″</p>
                                                </td>
                                            </tr>
                                            <tr class="wheels">
                                                <th>Wheels</th>
                                                <td>
                                                    <p>12″ air / wide track slick tread</p>
                                                </td>
                                            </tr>
                                            <tr class="seat-back-height">
                                                <th>Seat back height</th>
                                                <td>
                                                    <p>21.5″</p>
                                                </td>
                                            </tr>
                                            <tr class="head-room-inside-canopy">
                                                <th>Head room (inside canopy)</th>
                                                <td>
                                                    <p>25″</p>
                                                </td>
                                            </tr>
                                            <tr class="pa_color">
                                                <th>Color</th>
                                                <td>
                                                    <p>Black, Blue, Red, White</p>
                                                </td>
                                            </tr>
                                            <tr class="pa_size">
                                                <th>Size</th>
                                                <td>
                                                    <p>M, S</p>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>
                                                    <div class="comment-list">
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="../assets/imgs/page/avatar-6.jpg" alt="">
                                                                    <h6><a href="#">Jacky Chan</a></h6>
                                                                    <p class="font-xxs">Since 2012</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Thank you very fast shipping from Poland only
                                                                        3days.</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">December 4, 2020 at
                                                                                3:12 pm </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply
                                                                                <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="../assets/imgs/page/avatar-7.jpg" alt="">
                                                                    <h6><a href="#">Ana Rosie</a></h6>
                                                                    <p class="font-xxs">Since 2008</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Great low price and works well.</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">December 4, 2020 at
                                                                                3:12 pm </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply
                                                                                <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                        <div class="single-comment justify-content-between d-flex">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <img src="../assets/imgs/page/avatar-8.jpg" alt="">
                                                                    <h6><a href="#">Steven Keny</a></h6>
                                                                    <p class="font-xxs">Since 2010</p>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="product-rate d-inline-block">
                                                                        <div class="product-rating" style="width:90%">
                                                                        </div>
                                                                    </div>
                                                                    <p>Authentic and Beautiful, Love these way more than
                                                                        ever expected They are Great earphones</p>
                                                                    <div class="d-flex justify-content-between">
                                                                        <div class="d-flex align-items-center">
                                                                            <p class="font-xs mr-30">December 4, 2020 at
                                                                                3:12 pm </p>
                                                                            <a href="#" class="text-brand btn-reply">Reply
                                                                                <i class="fi-rs-arrow-right"></i> </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--single-comment -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h4 class="mb-30">Customer reviews</h4>
                                                    <div class="d-flex mb-30">
                                                        <div class="product-rate d-inline-block mr-15">
                                                            <div class="product-rating" style="width:90%">
                                                            </div>
                                                        </div>
                                                        <h6>4.8 out of 5</h6>
                                                    </div>
                                                    <div class="progress">
                                                        <span>5 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 50%;"
                                                             aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                            50%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>4 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                            25%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>3 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 45%;"
                                                             aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                                            45%
                                                        </div>
                                                    </div>
                                                    <div class="progress">
                                                        <span>2 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 65%;"
                                                             aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                            65%
                                                        </div>
                                                    </div>
                                                    <div class="progress mb-30">
                                                        <span>1 star</span>
                                                        <div class="progress-bar" role="progressbar" style="width: 85%;"
                                                             aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                            85%
                                                        </div>
                                                    </div>
                                                    <a href="#" class="font-xs text-muted">How are ratings
                                                        calculated?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--comment form-->
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>
                                            <div class="product-rate d-inline-block mb-30">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    <form class="form-contact comment_form" action="#" id="commentForm">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <textarea class="form-control w-100" name="comment"
                                                                              id="comment" cols="30" rows="9"
                                                                              placeholder="Write Comment"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="name" id="name"
                                                                           type="text" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="email" id="email"
                                                                           type="email" placeholder="Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <input class="form-control" name="website"
                                                                           id="website" type="text"
                                                                           placeholder="Website">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <button type="submit" class="button button-contactForm">
                                                                Submit
                                                                Review
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-60">
                                <div class="col-12">
                                    <h3 class="section-title style-1 mb-30">@lang('frontend.product_related_products')</h3>
                                </div>
                                <div class="col-12">
                                    <div class="row related-products">
                                        @foreach($moreproducts as $chunk)

                                        <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                            <div class="product-cart-wrap small hover-up">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="{{ product_slug($chunk->slug) }}" tabindex="0">
                                                            <img class="default-img"
                                                                 src="{{ get_image($chunk->image) }}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                    <div
                                                        class="product-badges product-badges-position product-badges-mrg">

                                                            @if($chunk->categories->count())
                                                            <span class="hot">
                                                            {{ $chunk->categories->map(function ($tt) {
                                                                return $tt->title;
                                                            })->implode(', ') }}
                                                            </span>
                                                                @endif

                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <h2><a href="{{ product_slug($chunk->slug) }}" tabindex="0">Ulstra Bass
                                                            Headphone</a></h2>
                                                    <div class="product-price">
                                                        <span>$238.85 </span>
                                                        <span class="old-price">$245.8</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
