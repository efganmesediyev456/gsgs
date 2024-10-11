<footer class="main">
    <section class="newsletter p-30 text-white wow fadeIn animated">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-md-3 mb-lg-0">
                    <div class="row align-items-center">
                        <div class="col flex-horizontal-center">
                            <!-- <img class="icon-email" src="assets/imgs/theme/icons/icon-email.svg" alt=""> -->
                            <h4 class="font-size-20 mb-0 ml-3">{{$mainsetting->footer_title}}</h4>
                        </div>
                        <div class="col my-4 my-md-0 des">
                            <h5 class="font-size-15 ml-4 mb-0">
                                {!! $mainsetting->footer_desc !!}
                             </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <!-- Subscribe Form -->
                    <form class="form-subcriber d-flex wow fadeIn animated">
                        <input type="email" class="form-control bg-white font-small" placeholder="@lang('frontend.enter_your_email')">
                        <button class="btn bg-dark text-white" type="submit">@lang('frontend.subscribe')</button>
                    </form>
                    <!-- End Subscribe Form -->
                </div>
            </div>
        </div>
    </section>



    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="widget-about font-md mb-md-5 mb-lg-0">
                        <div class="logo logo-width-1 wow fadeIn animated footer_logo">
                            <a href="index.html">
                                <img src="{{ get_image($mainsetting->footer_logo) }}" alt="Cartridge Baku Logo">
                                <!-- <img src="assets/imgs/theme/logo.svg" alt="logo"> -->
                            </a>
                        </div>
                        <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">@lang('frontend.footer_contact')</h5>
                        <p class="wow fadeIn animated">
                            <strong>@lang('frontend.footer_address'): </strong>{{$mainsetting->footer_address}}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>@lang('frontend.footer_phone'): </strong>{{$mainsetting->footer_phone}}
                        </p>
                        <p class="wow fadeIn animated">
                            <strong>@lang('frontend.footer_hours'): </strong>{{$mainsetting->footer_hours}}
                        </p>
                        <!-- <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                        <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                            <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                            <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                            <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                            <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                            <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 mt-30 mt-md-0">
                    <h5 class="widget-title wow fadeIn animated">@lang('frontend.footer_menus')</h5>
                    <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                        @foreach($footer_menus as $menu)
                            <li><a href="/{{app()->getLocale()}}/{{$menu->slug}}">{{ $menu->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-2 d-md-none d-lg-block mt-30 mt-md-0">
                    <h5 class="widget-title wow fadeIn animated">@lang('frontend.categories')</h5>
                    <ul class="footer-list wow fadeIn animated">
                        @foreach($categories->where('footer_view',1) as $category)
                            <li><a href="{{ category_slug($category) }}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-3  col-md-3 mt-30 mt-md-0">
                    <h5 class="widget-title wow fadeIn animated">@lang('frontend.most_viewed_products')</h5>
                    <ul class="footer-list wow fadeIn animated">
                        <x-mostly-viewed-products/>
                    </ul>
                    <h5 class="mb-10 mt-50 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                    <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                        @foreach($sociallinks as $link)
                            <a href="{{ $link->url }}"  target="_blank" >
                                <img src="{{get_image($link->icon)}}" alt="">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="container pb-20 wow fadeIn animated">
        <div class="row">
            <div class="col-12 mb-20">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-lg-6">
                <div class="float-md-left font-sm text-muted mb-0">
                    {!! $mainsetting->copyright !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-lg-end text-start font-sm text-muted mb-0">
                    {!! $mainsetting->created_by !!}
                </div>
            </div>
        </div>
    </div>
</footer>
