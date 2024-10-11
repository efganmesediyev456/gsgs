@extends('site.layouts.main')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/{{app()->getLocale()}}">@lang('frontend.home_page')</a>
                    <span></span>
                    <a href="/{{app()->getLocale()}}/blogs">@lang('frontend.blogs_page')</a>
                    <span></span> {{ $blog->title }}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container custom">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="single-page pr-30">
                            <div class="single-header style-2">
                                <h1 class="mb-30">{{ $blog->title }}</h1>
                                <div class="single-header-meta">
                                    <div class="entry-meta meta-1 font-xs mt-15 mb-15">
                                        <span class="post-on">{{ ucwords($blog->created_at->translatedFormat('d F Y', app()->getLocale())) }}</span>
                                    </div>
                                </div>
                            </div>
                            <figure class="single-thumbnail">
                                <img src="{{ get_image($blog->image) }}" alt="">
                            </figure>
                            <div class="single-content">
                               {!! $blog->desc !!}
                            </div>

                        </div>
                    </div>






                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                            <div class="sidebar-widget widget_alitheme_lastpost mb-20">
                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title">@lang('frontend.related_posts')</h5>
                                </div>
                                <div class="row">
                                    @if($relatedBlogs)
                                        @foreach($relatedBlogs as $item)

                                        <div class="@if(!$loop->first) col-md-6 col-sm-6 sm-grid-content mb-30 @else col-12 sm-grid-content mb-30 @endif ">
                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                <a href="{{ url(app()->getLocale().'/blogs/'.$item->slug) }}">
                                                    <img src="{{ get_image($item->image) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h4 class="post-title mb-10 text-limit-2-row">{{ $item->title }} </h4>
                                                <div class="entry-meta meta-13 font-xxs color-grey">
                                                    <span class="post-on mr-10">{{ ucwords($item->created_at->translatedFormat('d F'))  }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                            <!--Widget ads-->
{{--                            <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none animated">--}}
{{--                                <img src="../assets/imgs/banner/banner-11.jpg" alt="">--}}
{{--                                <div class="banner-text">--}}
{{--                                    <span>Women Zone</span>--}}
{{--                                    <h4>Save 17% on <br>Office Dress</h4>--}}
{{--                                    <a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!--Widget Tags-->
                            @if($tagsString and explode(',', $tagsString) and count(explode(',', $tagsString)))
                            <div class="sidebar-widget widget_tags mb-50">
                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title">@lang('frontend.browse_tags') </h5>
                                </div>
                                <div class="tagcloud">
                                    @foreach(explode(',', $tagsString) as $exp)
                                        <a  class="tag-cloud-link">{{ $exp }}</a>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection


@section('footer_more')

@endsection
