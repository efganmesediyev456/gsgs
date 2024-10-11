@extends('site.layouts.main')
@section('content')
    <main class="main">

        <x-home-slider/>
        <x-feature/>
        <section class="product-tabs section-padding position-relative wow fadeIn animated">
            <div class="bg-square"></div>
            <div class="container">
                <div class="tab-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                                    data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                                    aria-selected="true">@lang('frontend.featured_products')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-two" data-bs-toggle="tab" data-bs-target="#tab-two"
                                    type="button" role="tab" aria-controls="tab-two" aria-selected="false">@lang('frontend.popular_products')</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three"
                                    type="button" role="tab" aria-controls="tab-three" aria-selected="false">@lang('frontend.latest_added_products')</button>
                        </li>
                    </ul>
                    <a href="{{ url(app()->getLocale().'/products') }}" class="view-more d-none d-md-flex">@lang('frontend.view_more_products')<i
                            class="fi-rs-angle-double-small-right"></i></a>
                </div>
                <!--End nav-tabs-->
                <div class="tab-content wow fadeIn animated" id="myTabContent">
                    <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                        <div class="row product-grid-4">
                            <x-featured-product/>
                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab one (Featured)-->
                    <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two">
                        <div class="row product-grid-4">
                            <x-popular-product/>
                        </div>
                    </div>
                    <!--En tab two (Popular)-->
                    <div class="tab-pane fade" id="tab-three" role="tabpanel" aria-labelledby="tab-three">
                        <div class="row product-grid-4">

                            <x-latest-products/>

                        </div>
                        <!--End product-grid-4-->
                    </div>
                    <!--En tab three (New added)-->
                </div>
                <!--End tab-content-->
            </div>
        </section>
        <x-discover/>
        <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>@lang('frontend.popular_categories_title1')</span> @lang('popular_categories_title2')</h3>
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows">
                    </div>
                    <div class="carausel-6-columns" id="carausel-6-columns">
                        <x-popular-categories/>
                    </div>
                </div>
            </div>
        </section>
        <x-advertisement/>
        <section class="section-padding">
            <div class="container wow fadeIn animated">
                <h3 class="section-title mb-20"><span>@lang('frontend.new_arrivals_title1')</span> @lang('frontend.new_arrivals_title2')</h3>
                <x-arrival/>
            </div>
        </section>
        <x-brend />
        <section class="bg-grey-9 section-padding">
            <div class="container pt-25 pb-25">
                <div class="heading-tab d-flex">
                    <div class="heading-tab-left wow fadeIn animated">
                        <h3 class="section-title mb-20"><span>Monthly</span> Best Sell</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex">
                        <div class="banner-img style-2 wow fadeIn animated">
                            <img src="assets/imgs/banner/banner-9.jpg" alt="">
                            <div class="banner-text">
                                <span>Woman Area</span>
                                <h4 class="mt-5">Save 17% on <br>Clothing</h4>
                                <a href="shop-grid-right.html" class="text-white">Shop Now <i
                                        class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="tab-content wow fadeIn animated" id="myTabContent-1">
                            <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                                 aria-labelledby="tab-one-1">
                                <div class="carausel-4-columns-cover arrow-center position-relative">
                                    <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                                    <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                        <x-mostly-best-products/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End tab-content-->
                    </div>
                    <!--End Col-lg-9-->
                </div>
            </div>
        </section>
        <section class="section-padding">
            <div class="container pt-25 pb-20">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="section-title mb-20"><span>@lang('frontend.blogs_title1')</span> @lang('frontend.blog_title2')</h3>
                        <div class="post-list mb-4 mb-lg-0">
                            @foreach($blogs as $item)
                                <article class="wow fadeIn animated">
                                    <div class="d-md-flex d-block">
                                        <div class="post-thumb d-flex mr-15">
                                            <a class="color-white" href="{{ blog_slug($item) }}">
                                                <!-- <img src="assets/imgs/blog/blog-2.jpg" alt=""> -->
                                                <img src="{{ get_image($item->image) }}" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content">
                                            <div class="entry-meta mb-10 mt-10">
                                                <a class="entry-meta meta-2" href="{{ blog_slug($item) }}"><span
                                                        class="post-in font-x-small">{{ $item->title }}</span></a>
                                            </div>
                                            <h4 class="post-title mb-25 text-limit-2-row">
                                                <a href="{{ blog_slug($item) }}">{{ $item->subtitle }}</a>
                                            </h4>
                                            <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                <div>
                                                    <span class="post-on">{{ucwords($item->created_at->translatedFormat('d F Y','az'))}}</span>
                                                </div>
                                                <a href="{{ blog_slug($item) }}">@lang('frontend.blogs_read_more')</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-lg-6">
                       <x-blog-offer/>
                    </div>
                </div>
            </div>
        </section>
        <x-deal/>

    </main>
@endsection


@section('footer_more')

@endsection
