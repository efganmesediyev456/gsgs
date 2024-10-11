@extends('site.layouts.main')
@section('content')
    <main class="main single-page">

        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/{{app()->getLocale()}}">@lang('frontend.home_page')</a>
                    <span></span> @lang('frontend.about_page')
                </div>
            </div>
        </div>
        <section class="section-padding">
            <div class="container pt-25">
                <div class="row">
                    <div class="col-lg-6 align-self-center mb-lg-0 mb-4">
                        <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">
                            {{$about->title1}}
                        </h6>
                        <h1 class="font-heading mb-40">
                            {{$about->title2}}
                        </h1>
                        {!! $about->desc !!}
                       </div>
                    <div class="col-lg-6">
                        <img src="{{get_image($about->image1)}}" alt="">
                    </div>
                </div>
            </div>
        </section>
{{--        <section id="team" class="pt-25 wow fadeIn animated">--}}
{{--            <div class="container">--}}
{{--                <div class="row mb-50 align-items-center">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <h6 class="mt-0 mb-15 text-uppercase font-sm text-brand wow fadeIn animated">Our Team</h6>--}}
{{--                        <h2 class="mb-15 wow fadeIn animated">Top team of experts</h2>--}}
{{--                        <p class="text-grey-3 wow fadeIn animated">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione optio perferendis sequi mollitia quis autem ea cupiditate possimus!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="carausel-5-columns-cover position-relative wow fadeIn animated">--}}
{{--                    <div class="row wow fadeIn animated carausel-5-columns teams_item_wrapper" id="carausel-5-columns">--}}
{{--                        <div class="teams_item">--}}
{{--                            <div class="blog-card border-radius-10 overflow-hidden text-center">--}}
{{--                                <img src="../assets/imgs/page/avatar-1.jpg" alt="" class="border-radius-10 mb-30 hover-up">--}}
{{--                                <h4 class="fw-500 mb-0">Patric Adams</h4>--}}
{{--                                <p class="fw-400 text-brand mb-10">CEO & Co-Founder</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--col-->--}}
{{--                        <div class="teams_item">--}}
{{--                            <div class="blog-card border-radius-10 overflow-hidden text-center">--}}
{{--                                <img src="../assets/imgs/page/avatar-2.jpg" alt="" class="border-radius-10 mb-30 hover-up">--}}
{{--                                <h4 class="fw-500 mb-0">Dilan Specter</h4>--}}
{{--                                <p class="fw-400 text-brand mb-10">Head Engineer</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--col-->--}}
{{--                        <div class="teams_item">--}}
{{--                            <div class="blog-card border-radius-10 overflow-hidden text-center">--}}
{{--                                <img src="../assets/imgs/page/avatar-3.jpg" alt="" class="border-radius-10 mb-30 hover-up">--}}
{{--                                <h4 class="fw-500 mb-0">Tomas Baker</h4>--}}
{{--                                <p class="fw-400 text-brand mb-10">Senior Planner</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--col-->--}}
{{--                        <div class="teams_item">--}}
{{--                            <div class="blog-card border-radius-10 overflow-hidden text-center">--}}
{{--                                <img src="../assets/imgs/page/avatar-4.jpg" alt="" class="border-radius-10 mb-30 hover-up">--}}
{{--                                <h4 class="fw-500 mb-0">Norton Mendos</h4>--}}
{{--                                <p class="fw-400 text-brand mb-10">Project Manager</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--col-->--}}
{{--                        <div class="teams_item">--}}
{{--                            <div class="blog-card border-radius-10 overflow-hidden text-center">--}}
{{--                                <img src="../assets/imgs/page/avatar-1.jpg" alt="" class="border-radius-10 mb-30 hover-up">--}}
{{--                                <h4 class="fw-500 mb-0">Patric Adams</h4>--}}
{{--                                <p class="fw-400 text-brand mb-10">CEO & Co-Founder</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--col-->--}}
{{--                        <div class="teams_item">--}}
{{--                            <div class="blog-card border-radius-10 overflow-hidden text-center">--}}
{{--                                <img src="../assets/imgs/page/avatar-2.jpg" alt="" class="border-radius-10 mb-30 hover-up">--}}
{{--                                <h4 class="fw-500 mb-0">Dilan Specter</h4>--}}
{{--                                <p class="fw-400 text-brand mb-10">Head Engineer</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--col-->--}}
{{--                        <div class="teams_item">--}}
{{--                            <div class="blog-card border-radius-10 overflow-hidden text-center">--}}
{{--                                <img src="../assets/imgs/page/avatar-3.jpg" alt="" class="border-radius-10 mb-30 hover-up">--}}
{{--                                <h4 class="fw-500 mb-0">Tomas Baker</h4>--}}
{{--                                <p class="fw-400 text-brand mb-10">Senior Planner</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--col-->--}}
{{--                        <div class="teams_item">--}}
{{--                            <div class="blog-card border-radius-10 overflow-hidden text-center">--}}
{{--                                <img src="../assets/imgs/page/avatar-4.jpg" alt="" class="border-radius-10 mb-30 hover-up">--}}
{{--                                <h4 class="fw-500 mb-0">Norton Mendos</h4>--}}
{{--                                <p class="fw-400 text-brand mb-10">Project Manager</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--col-->--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </section>--}}





        <!-- <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows"></div>
            <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                <div class="brand-logo"><img class="img-grey-hover" src="../assets/imgs/banner/brand-1.png" alt=""></div>
                <div class="brand-logo"><img class="img-grey-hover" src="../assets/imgs/banner/brand-2.png" alt=""></div>
                <div class="brand-logo"><img class="img-grey-hover" src="../assets/imgs/banner/brand-3.png" alt=""></div>
                <div class="brand-logo"><img class="img-grey-hover" src="../assets/imgs/banner/brand-4.png" alt=""></div>
                <div class="brand-logo"><img class="img-grey-hover" src="../assets/imgs/banner/brand-5.png" alt=""></div>
                <div class="brand-logo"><img class="img-grey-hover" src="../assets/imgs/banner/brand-6.png" alt=""></div>
                <div class="brand-logo"><img class="img-grey-hover" src="../assets/imgs/banner/brand-3.png" alt=""></div>
            </div>
        </div> -->




















        <section id="testimonials" class="section-padding">
            <div class="container pt-25">
                <div class="row mb-50">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h6 class="mt-0 mb-10 text-uppercase  text-brand font-sm wow fadeIn animated">{{$about->customer_title1}}</h6>
                        <h2 class="mb-15 text-grey-1 wow fadeIn animated">{{$about->customer_title2}}<br>{{$about->customer_title3}}</h2>
                        <p class="w-50 m-auto text-grey-3 wow fadeIn animated">
                            {{$about->customer_title4}}
                        </p>
                    </div>
                </div>
                <div class="row align-items-center">
                    @foreach($customerratings as $rating)
                    <div class="col-md-6 col-lg-4">
                        <div class="hero-card box-shadow-outer-6 wow fadeIn animated mb-30 hover-up d-flex">
                            <div class="hero-card-icon icon-left-2 hover-up ">
                                <img class="btn-shadow-brand hover-up border-radius-5 bg-brand-muted" src="{{get_image($rating->image)}}" alt="">
                            </div>
                            <div class="pl-30">
                                <h5 class="mb-5 fw-500">
                                   {{$rating->name}}
                                </h5>
                                <p class="font-sm text-grey-5">{{$rating->position}}</p>
                                <p class="text-grey-3">
                                    {{$rating->message}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>






        <section class="section-padding">
            <div class="container pb-25">
                <h3 class="section-title mb-20 wow fadeIn animated text-center"><span>@lang('frontend.brand_title1')</span> @lang('frontend.brand_title2')</h3>
                <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                    <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                        @foreach($brends as $brend)
                        <div class="brand-logo">
                            <img class="img-grey-hover" src="{{ get_image($brend->image) }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@section('footer_more')

@endsection
