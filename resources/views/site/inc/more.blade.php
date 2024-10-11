</div>
<!-- End of Page Wrapper -->
<!-- Start of Sticky Footer -->

<!-- End of Sticky Footer -->
<!-- Start of Scroll Top -->
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
        version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
        <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
    </svg> </a>
<!-- End of Scroll Top -->
<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="/{{app()->getLocale()}}/search" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" value="{{request()->search}}" autocomplete="off" placeholder="@lang('frontend.search_here')"
                   required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">@lang('frontend.main_menus')</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">@lang('frontend.categories')</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
{{--                    <li><a href="demo5.html">Efgan</a></li>--}}
{{--                    <li>--}}
{{--                        <a href="shop-banner-sidebar.html">Mağaza</a>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="#">Mağaza Səhifələri</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="shop-banner-sidebar.html">Yan Banner</a></li>--}}
{{--                                    <li><a href="shop-boxed-banner.html">Qutulu Banner</a></li>--}}
{{--                                    <li><a href="shop-fullwidth-banner.html">Tam Enli Banner</a></li>--}}
{{--                                    <li><a href="shop-horizontal-filter.html">Üfüqi Filtr<span--}}
{{--                                                class="tip tip-hot">Təcili</span></a></li>--}}
{{--                                    <li><a href="shop-off-canvas.html">Kənar panelr<span--}}
{{--                                                class="tip tip-new">Yeni</span></a></li>--}}
{{--                                    <li><a href="shop-infinite-scroll.html">Sonsuz Ajax Scroll</a></li>--}}
{{--                                    <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>--}}
{{--                                    <li><a href="shop-both-sidebar.html">İkitrərəfli Banner</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">Mağaza Planları</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="shop-grid-3cols.html">3 Columns Mode</a></li>--}}
{{--                                    <li><a href="shop-grid-4cols.html">4 Columns Mode</a></li>--}}
{{--                                    <li><a href="shop-grid-5cols.html">5 Columns Mode</a></li>--}}
{{--                                    <li><a href="shop-grid-6cols.html">6 Columns Mode</a></li>--}}
{{--                                    <li><a href="shop-grid-7cols.html">7 Columns Mode</a></li>--}}
{{--                                    <li><a href="shop-grid-8cols.html">8 Columns Mode</a></li>--}}
{{--                                    <li><a href="shop-list.html">List Mode</a></li>--}}
{{--                                    <li><a href="shop-list-sidebar.html">List Mode With Sidebar</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">Məhsul Səhifələri</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="product-variable.html">Variable Product</a></li>--}}
{{--                                    <li><a href="product-featured.html">Featured &amp; Sale</a></li>--}}
{{--                                    <li><a href="product-accordion.html">Data In Accordion</a></li>--}}
{{--                                    <li><a href="product-section.html">Data In Sections</a></li>--}}
{{--                                    <li><a href="product-swatch.html">Image Swatch</a></li>--}}
{{--                                    <li><a href="product-extended.html">Extended Info</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="product-without-sidebar.html">Without Sidebar</a></li>--}}
{{--                                    <li><a href="product-video.html">360<sup>o</sup> &amp; Video<span--}}
{{--                                                class="tip tip-new">Yeni</span></a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">Məhsul Strukturu</a>--}}
{{--                                <ul>--}}
{{--                                    <li><a href="product-default.html">Default<span--}}
{{--                                                class="tip tip-hot">Təcili</span></a></li>--}}
{{--                                    <li><a href="product-vertical.html">Vertical Thumbs</a></li>--}}
{{--                                    <li><a href="product-grid.html">Grid Images</a></li>--}}
{{--                                    <li><a href="product-masonry.html">Masonry</a></li>--}}
{{--                                    <li><a href="product-gallery.html">Gallery</a></li>--}}
{{--                                    <li><a href="product-sticky-info.html">Sticky Info</a></li>--}}
{{--                                    <li><a href="product-sticky-thumb.html">Sticky Thumbs</a></li>--}}
{{--                                    <li><a href="product-sticky-both.html">Sticky Both</a></li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="vendor-dokan-store.html">Satıcı</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="blog.html">Blog</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="about-us.html">Səhifələr</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="elements.html">Elementlər</a>--}}

{{--                    </li>--}}


                    @foreach($menus->where('parent_id', null) as $menu)
                        <li class="@if(request()->fullUrl()==url($menu->slug)) active @endif">
                            <a href="{{  menu_slug($menu) }}">{{ $menu->title }}</a>

{{--                            @if($menu->children()->count())--}}
{{--                                <ul class="megamenu">--}}
{{--                                    <li>--}}
{{--                                        <ul>--}}
{{--                                            @foreach($menu->children->sortBy('order')->where('status',1) as $child)--}}
{{--                                                <li><a href="{{ menu_slug($child) }}">{{ $child->title }}</a></li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            @endif--}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    @foreach($categories->where('parent_id', null) as $category)
                        <li>
                            <a href="shop-fullwidth-banner.html">
                                <i class="w-icon-tshirt2"></i>{{$category->title}}
                            </a>
                            @if($categories->where('parent_id', $category->id)->count()>0)
                                <ul>
                                    @foreach($categories->where('parent_id', $category->id) as $cat)
                                        <li>
                                            <a href="shop-fullwidth-banner.html">{{ $cat->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->
<!-- Start of Newsletter popup -->
<div class="newsletter-popup mfp-hide">
    <div class="newsletter-content">
        <h4 class="text-uppercase font-weight-normal ls-25">Qaçırmayın <span class="text-primary">25% Endİrİm</span>
        </h4>
        <h2 class="ls-25">Catridge-də qeydiyyatdan keç</h2>
        <p class="text-light ls-10">Xüsusi təkliflər haqqında yenilikləri almaq üçün Catridge-yə abunə olun.</p>
        <form action="#" method="get" class="input-wrapper input-wrapper-inline input-wrapper-round">
            <input type="email" class="form-control email font-size-md" name="email" id="email2"
                   placeholder="Poçt ünvanınız..." required="">
            <button class="btn btn-dark" type="submit">TƏQDİM EDİN</button>
        </form>
        <div class="form-checkbox d-flex align-items-center">
            <input type="checkbox" class="custom-checkbox" id="hide-newsletter-popup" name="hide-newsletter-popup"
                   required="">
            <label for="hide-newsletter-popup" class="font-size-sm text-light">Bir daha göstərməyin.</label>
        </div>
    </div>
</div>
<!-- End of Newsletter popup -->
<!-- Start of Quick View -->
<div class="product product-single product-popup">
    <div class="row gutter-lg">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="product-gallery product-gallery-sticky">
                <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                    <div class="swiper-wrapper row cols-1 gutter-no">
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="assets/images/products/popup/1-440x494.jpg"
                                     data-zoom-image="assets/images/products/popup/1-800x900.jpg"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="assets/images/products/popup/2-440x494.jpg"
                                     data-zoom-image="assets/images/products/popup/2-800x900.jpg"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="assets/images/products/popup/3-440x494.jpg"
                                     data-zoom-image="assets/images/products/popup/3-800x900.jpg"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                        <div class="swiper-slide">
                            <figure class="product-image">
                                <img src="assets/images/products/popup/4-440x494.jpg"
                                     data-zoom-image="assets/images/products/popup/4-800x900.jpg"
                                     alt="Water Boil Black Utensil" width="800" height="900">
                            </figure>
                        </div>
                    </div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button>
                </div>
                <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                            'navigation': {
                                'nextEl': '.swiper-button-next',
                                'prevEl': '.swiper-button-prev'
                            }
                        }">
                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                        <div class="product-thumb swiper-slide">
                            <img src="assets/images/products/popup/1-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="assets/images/products/popup/2-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="assets/images/products/popup/3-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                        <div class="product-thumb swiper-slide">
                            <img src="assets/images/products/popup/4-103x116.jpg" alt="Product Thumb" width="103"
                                 height="116">
                        </div>
                    </div>
                    <button class="swiper-button-next"></button>
                    <button class="swiper-button-prev"></button>
                </div>
            </div>
        </div>
        <div class="col-md-6 overflow-hidden p-relative">
            <div class="product-details scrollable pl-0">
                <h2 class="product-title">Elektronika Qara Printer</h2>
                <div class="product-bm-wrapper">
                    <figure class="brand">
                        <img src="assets/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
                    </figure>
                    <div class="product-meta">
                        <div class="product-categories">
                            Category:
                            <span class="product-category"><a href="#">Elektronika</a></span>
                        </div>
                        <div class="product-sku">
                            SKU: <span>MS46891340</span>
                        </div>
                    </div>
                </div>

                <hr class="product-divider">

                <div class="product-price">$40.00</div>

                <div class="ratings-container">
                    <div class="ratings-full">
                        <span class="ratings" style="width: 80%;"></span>
                        <span class="tooltiptext tooltip-top"></span>
                    </div>
                    <a href="#" class="rating-reviews">(3 Baxış)</a>
                </div>

                <div class="product-short-desc">
                    <ul class="list-type-check list-style-none">
                        <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                        <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                        <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                    </ul>
                </div>

                <hr class="product-divider">

                <div class="product-form product-variation-form product-color-swatch">
                    <label>Color:</label>
                    <div class="d-flex align-items-center product-variations">
                        <a href="#" class="color" style="background-color: #ffcc01"></a>
                        <a href="#" class="color" style="background-color: #ca6d00;"></a>
                        <a href="#" class="color" style="background-color: #1c93cb;"></a>
                        <a href="#" class="color" style="background-color: #ccc;"></a>
                        <a href="#" class="color" style="background-color: #333;"></a>
                    </div>
                </div>
                <div class="product-form product-variation-form product-size-swatch">
                    <label class="mb-1">Size:</label>
                    <div class="flex-wrap d-flex align-items-center product-variations">
                        <a href="#" class="size">Small</a>
                        <a href="#" class="size">Medium</a>
                        <a href="#" class="size">Large</a>
                        <a href="#" class="size">Extra Large</a>
                    </div>
                    <a href="#" class="product-variation-clean">Clean All</a>
                </div>

                <div class="product-variation-price">
                    <span></span>
                </div>

                <div class="product-form">
                    <div class="product-qty-form">
                        <div class="input-group">
                            <input class="quantity form-control" type="number" min="1" max="10000000">
                            <button class="quantity-plus w-icon-plus"></button>
                            <button class="quantity-minus w-icon-minus"></button>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-cart">
                        <i class="w-icon-cart"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>

                <div class="social-links-wrapper">
                    <div class="social-links">
                        <div class="social-icons social-no-color border-thin">
                            <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest fab fa-pinterest-p"></a>
                            <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                            <a href="#" class="social-icon social-youtube fab fa-linkedin-in"></a>
                        </div>
                    </div>
                    <span class="divider d-xs-show"></span>
                    <div class="product-link-wrapper d-flex">
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"><span></span></a>
                        <a href="#"
                           class="btn-product-icon btn-compare btn-icon-left w-icon-compare"><span></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Quick view -->
