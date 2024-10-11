@extends('site.layouts.main')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/{{app()->getLocale()}}">@lang('frontend.home_page')</a>
                    <span></span> @lang('frontend.blogs_page')
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container custom">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="single-header mb-50">
                            <h1 class="font-xxl text-brand">@lang('frontend.blogs_page')</h1>
                        </div>
                        <div class="loop-grid loop-list pr-30">
                            @foreach($items as $item)
                            <article class="wow fadeIn animated hover-up mb-30">
                                <div class="post-thumb" style="background-image: url({{ get_image($item->image) }});">
                                </div>
                                <div class="entry-content-2">
                                    <h3 class="post-title mb-15">
                                        <a href="{{ blog_slug($item) }}">
                                            {{ $item->title }}
                                        </a>
                                    </h3>
                                    <p class="post-exerpt mb-30">{{$item->subtitle}}</p>
                                    <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                        <div>
                                            <span class="post-on"> <i class="fi-rs-clock"></i>
                                            {{ ucwords($item->created_at->translatedFormat('d F Y', app()->getLocale())) }}
                                            </span>
                                        </div>
                                        <a href="{{ blog_slug($item) }}" class="text-brand">@lang('frontend.blogs_more')<i class="fi-rs-arrow-right"></i></a>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                        <!--post-grid-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    @for ($i = 1; $i <= $items->lastPage(); $i++)
                                        @if ($i == 1 || $i == 2 || $i == $items->lastPage() || ($i >= $items->currentPage() - 1 && $i <= $items->currentPage() + 1))
                                            <li class="page-item {{ $i == $items->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $items->url($i) }}">{{ $i }}</a>
                                            </li>

                                        @elseif ($i == 3 && $items->currentPage() > 4)
                                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>

                                        @elseif ($i == $items->lastPage() - 1 && $items->currentPage() < $items->lastPage() - 2)
                                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>

                                        @endif
                                    @endfor

                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <x-blog-trend/>
{{--                            <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none animated">--}}
{{--                                <img src="../assets/imgs/banner/banner-11.jpg" alt="">--}}
{{--                                <div class="banner-text">--}}
{{--                                    <span>Women Zone</span>--}}
{{--                                    <h4>Save 17% on <br>Office Dress</h4>--}}
{{--                                    <a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="sidebar-widget widget_tags mb-50">
                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title">@lang('frontend.popular_tags') </h5>
                                </div>
                                <div class="tagcloud">
                                    <x-popular-tags/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@section('footer_more')

@endsection
