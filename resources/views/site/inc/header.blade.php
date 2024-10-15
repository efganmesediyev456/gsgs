<header class="header-area header-style-2 header-height-2">
    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            <li><i class="fi-rs-smartphone"></i> <a href="#">{{ $mainsetting->header_phone }}</a></li>
                            <li><i class="fi-rs-marker"></i><a target="_blank" href="{{ $mainsetting->map }}">@lang('frontend.located')</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                @if($mainsetting and $mainsetting->header_desc)
                                    @php
                                    $kontent = array_map(function ($item){
                                        return '<li>'.$item.'</li>';
                                    }, explode(',',$mainsetting->header_desc));
                                    $kontent = implode($kontent);

                                    @endphp
                                    {!! $kontent !!}

                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                            <li>
                                <a class="language-dropdown-active" href="{{ \App\Helpers\UrlHelper::changeLanguageSegment($currentLanguage->locale) }}">
                                    <i class="fi-rs-world"></i> {{ strtoupper(app()->getLocale()) }} <i
                                        class="fi-rs-angle-small-down">
                                    </i>
                                </a>
                                <ul class="language-dropdown">
                                    @foreach($languages as $language)

                                        <li>
                                            <a href="{{ \App\Helpers\UrlHelper::changeLanguageSegment($language->locale) }}">
                                                <img src="{{ get_image($language->icon) }}" alt="{{ strtoupper($language->locale) }} Flag"/>
                                                {{ strtoupper($language->locale) }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo header_logo">
                    <a href="/{{app()->getLocale()}}">
                        <img src="{{ get_image($mainsetting->logo) }}" alt="Cartridge Baku Logo">
                    </a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">
                        <form method="get" action="/{{app()->getLocale()}}/products">
                            <select name="category" class="select-active">
                                <option value="">{{ __('frontend.category_search') }}</option>
                                @foreach($categories as $category)
                                    <option @selected($category->slug==request()->category) value="{{ $category->slug }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <input type="text"  name="search" id="search" placeholder="@lang('frontend.search_here')"
                                   required value="{{request()->search}}"/>
                        </form>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-headset"></i>{{ $mainsetting->header_phone  }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo d-block d-lg-none header_mobile_logo">
                    <a href="/{{app()->getLocale()}}">
                        <img src="{{ get_image($mainsetting->logo) }}" alt="Cartridge Baku Logo">
                        <!-- <img src="assets/imgs/theme/logo.svg" alt="logo"> -->
                    </a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">

                        <a class="categori-button-active @if(Route::currentRouteName()=='site.home')  index open @else pages @endif" href="javascript:void(0);">
                            <span class="fi-rs-apps"></span> @lang('frontend.look_at_categories_list')
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-large @if(Route::currentRouteName()=='site.home') index open @else pages @endif">
                            <ul>
                                @foreach($categories->where('parent_id', null) as $key=>$category)

                                <li class="@if($key>10) more_slide_open @endif @if($categories->where('parent_id', $category->id)->count()>0) has-children @endif">
                                    <a href="{{ category_slug($category) }}">
                                        <img width="17px" height="17px" style="margin-right: 5px;" src="{{get_image($category->icon)}}" alt="">
                                        {{ $category->title }}
                                    </a>
                                    @if($categories->where('parent_id', $category->id)->count()>0)
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col">
                                                        <ul>
                                                            @foreach($categories->where('parent_id', $category->id) as $cat)

                                                            <li><a class="dropdown-item nav-link nav_item"
                                                                   href="{{ category_slug($cat) }}">
                                                                    <img width="17px" height="17px" style="margin-right: 5px;" src="{{get_image($cat->icon)}}" alt="">
                                                                    {{ $cat->title }}</a></li>
                                                            @endforeach

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                </li>
                                @endforeach

                            </ul>
                            @if($categories->where('parent_id',null)->count() > 10)
                            <div class="more_categories">@lang('frontend.show_more_categories')</div>
                            @endif
                        </div>
                    </div>
                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                        <nav>
                            <ul>

                                @foreach($menus->where('parent_id', null) as $menu)
                                    <li class="@if(request()->fullUrl()==url($menu->slug)) active @endif">
                                        <a href="{{  menu_slug($menu) }}">{{ $menu->title }}</a>

{{--                                        @if($menu->children()->count())--}}
{{--                                            <!-- Start of Megamenu -->--}}
{{--                                            <ul class="megamenu">--}}
{{--                                                <li>--}}
{{--                                                    <ul>--}}
{{--                                                        @foreach($menu->children->sortBy('order')->where('status',1) as $child)--}}
{{--                                                            <li><a href="{{ menu_slug($child) }}">{{ $child->title }}</a></li>--}}
{{--                                                        @endforeach--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                           --}}
{{--                                        @endif--}}
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>

                <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2 d-block d-lg-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo sidebar_mobile_logo">
                <a href="index.html">
                    <img src="./assets/imgs/logo/logo-removebg-preview.png" alt="Cartridge Baku Logo">

                    <!-- <img src="assets/imgs/theme/logo.svg" alt="logo"> -->
                </a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-search search-style-3 mobile-header-border">
                <form action="#">
                    <input type="text" placeholder="Search for items…">
                    <button type="submit"><i class="fi-rs-search"></i></button>
                </form>
            </div>
            <div class="mobile-menu-wrap mobile-header-border">
                <div class="main-categori-wrap mobile-header-border">
                    <a class="categori-button-active-2" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>
                    <div class="categori-dropdown-wrap categori-dropdown-active-small">
                        <ul>
                            <li><a href="shop-grid-right.html"><i class="evara-font-dress"></i>Women's Clothing</a>
                            </li>
                            <li><a href="shop-grid-right.html"><i class="evara-font-tshirt"></i>Men's Clothing</a>
                            </li>
                            <li> <a href="shop-grid-right.html"><i class="evara-font-smartphone"></i> Cellphones</a>
                            </li>
                            <li><a href="shop-grid-right.html"><i class="evara-font-desktop"></i>Computer &
                                    Office</a></li>
                            <li><a href="shop-grid-right.html"><i class="evara-font-cpu"></i>Consumer
                                    Electronics</a></li>
                            <li><a href="shop-grid-right.html"><i class="evara-font-home"></i>Home & Garden</a></li>
                            <li><a href="shop-grid-right.html"><i class="evara-font-high-heels"></i>Shoes</a></li>
                            <li><a href="shop-grid-right.html"><i class="evara-font-teddy-bear"></i>Mother &
                                    Kids</a></li>
                            <li><a href="shop-grid-right.html"><i class="evara-font-kite"></i>Outdoor fun</a></li>
                        </ul>
                    </div>
                </div>
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="index.html">Home</a>
                            <ul class="dropdown">
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="shop-grid-right.html">shop</a>
                            <ul class="dropdown">
                                <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Single Product</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                        <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                        <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-filter.html">Shop – Filter</a></li>
                                <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                <li><a href="shop-cart.html">Shop – Cart</a></li>
                                <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                <li><a href="shop-compare.html">Shop – Compare</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Mega
                                menu</a>
                            <ul class="dropdown">
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Women's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Dresses</a></li>
                                        <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                        <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                        <li><a href="shop-product-right.html">Women's Sets</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Men's Fashion</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Jackets</a></li>
                                        <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                        <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Technology</a>
                                    <ul class="dropdown">
                                        <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                        <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                        <li><a href="shop-product-right.html">Tablets</a></li>
                                        <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                        <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                href="blog-category-fullwidth.html">Blog</a>
                            <ul class="dropdown">
                                <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                <li><a href="blog-category-list.html">Blog Category List</a></li>
                                <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                        href="#">Single Product Layout</a>
                                    <ul class="dropdown">
                                        <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                        <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                        <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="page-about.html">About Us</a></li>
                                <li><a href="page-contact.html">Contact</a></li>
                                <li><a href="page-account.html">My Account</a></li>
                                <li><a href="page-login-register.html">login/register</a></li>
                                <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                <li><a href="page-terms.html">Terms of Service</a></li>
                                <li><a href="page-404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                            <ul class="dropdown">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                                <li><a href="#">Spanish</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-header-info-wrap mobile-header-border">
                <div class="single-mobile-header-info mt-30">
                    <a href="page-contact.html"> Our location </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="page-login-register.html">Log In / Sign Up </a>
                </div>
                <div class="single-mobile-header-info">
                    <a href="#">(+01) - 2345 - 6789 </a>
                </div>
            </div>
            <div class="mobile-social-icon">
                <h5 class="mb-15 text-grey-4">Follow Us</h5>
                <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
            </div>
        </div>
    </div>
</div>

