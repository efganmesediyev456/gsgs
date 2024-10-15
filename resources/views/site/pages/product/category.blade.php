@extends('site.layouts.main')
@section('content')
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/{{app()->getLocale()}}">{{ __('frontend.home_page') }}</a>
                    <span></span>  {{ $category ? $category->title : __('frontend.products_page') }}
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9" id="productList">
                        <div class="shop-product-fillter">
                            <div class="totall-product"><p> @lang('frontend.we_found') <strong class="text-brand">{{$items->count().' '}}</strong>@lang('frontend.items_for_you')</p></div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>@lang('frontend.filter_show'):</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{ $limit }} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a class="@if($limit == 50) active @endif" href="{{ route('site.products.category',array_merge(Arr::except(request()->query(), ['page']),['limit'=>50, 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">50</a></li>
                                            <li><a class="@if($limit == 100) active @endif" href="{{ route('site.products.category',array_merge(Arr::except(request()->query(), ['page']),['limit'=>100, 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">100</a></li>
                                            <li><a class="@if($limit == 150) active @endif" href="{{ route('site.products.category',array_merge(Arr::except(request()->query(), ['page']),['limit'=>150, 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">150</a></li>
                                            <li><a class="@if($limit == 200) active @endif" href="{{ route('site.products.category',array_merge(Arr::except(request()->query(), ['page']),['limit'=>200, 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">200</a></li>
                                            <li><a class="@if($limit == 'all') active @endif" href="{{ route('site.products.category',array_merge(Arr::except(request()->query(), ['page']),['limit'=>'all', 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">All</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>@lang('frontend.filter_sort_by'):</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> @lang('frontend.'.$orderby) <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a  class="@if($orderby=='filter_from_a_to_z') active @endif" href="{{ route('site.products.category',array_merge(Arr::except($_GET, ['page']),['filter'=>'filter_from_a_to_z', 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">@lang('frontend.filter_from_a_to_z')</a></li>
                                            <li><a  class="@if($orderby=='filter_from_z_to_a') active @endif" href="{{ route('site.products.category',array_merge(Arr::except($_GET, ['page']),['filter'=>'filter_from_z_to_a', 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">@lang('frontend.filter_from_z_to_a')</a></li>
                                            <li><a  class="@if($orderby=='filter_from_high_to_low') active @endif" href="{{ route('site.products.category',array_merge(Arr::except($_GET, ['page']),['filter'=>'filter_from_high_to_low', 'language'=>app()->getLocale(), 'category'=>$category->slug ])) }}">@lang('frontend.filter_from_high_to_low')</a></li>
                                            <li><a  class="@if($orderby=='filter_from_low_to_high') active @endif" href="{{ route('site.products.category',array_merge(Arr::except($_GET, ['page']),['filter'=>'filter_from_low_to_high', 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">@lang('frontend.filter_from_low_to_high')</a></li>
                                            <li><a  class="@if($orderby=='filter_mostly_viewed') active @endif" href="{{ route('site.products.category',array_merge(Arr::except($_GET, ['page']),['filter'=>'filter_mostly_viewed', 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">@lang('frontend.filter_mostly_viewed')</a></li>
                                            <li><a  class="@if($orderby=='filter_latest_date') active @endif" href="{{ route('site.products.category',array_merge(Arr::except($_GET, ['page']),['filter'=>'filter_latest_date', 'language'=>app()->getLocale(), 'category'=>$category->slug])) }}">@lang('frontend.filter_latest_date')</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @foreach($items as $product)
                                <div class="col-lg-4 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ product_slug($product->slug) }}">
                                                    <img class="default-img" src="{{ get_image($product->image) }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="{{ product_slug($product->slug) }}">{{ $product->title }}</a>
                                            </div>
                                            <h2><a href="{{ product_slug($product->slug) }}">{{ $product->subtitle }}</a></h2>
                                            @include('site.pages.inc.product_price', ['pro'=>$product])
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!--pagination-->
                        <div class="pagination-area mt-45 mb-sm-5 mb-lg-0">
                            <nav aria-label="Page navigation example">
                                @if($limit != 'all' && method_exists($items, 'hasPages') && $items->hasPages())
                                    <ul class="pagination justify-content-start">

                                        @php
                                            $totalPages = $items->lastPage();
                                            $currentPage = $items->currentPage();
                                            $start = max(1, $currentPage - 2);
                                            $end = min($totalPages, $currentPage + 2);
                                        @endphp
                                        @if ($start > 1)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $items->url(1) }}">1</a>
                                            </li>
                                            @if ($start > 2)
                                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                            @endif
                                        @endif

                                        @for ($page = $start; $page <= $end; $page++)
                                            <li class="page-item {{ $page == $currentPage ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $items->url($page) }}">{{ $page }}</a>
                                            </li>
                                        @endfor

                                        @if ($end < $totalPages)
                                            @if ($end < $totalPages - 1)
                                                <li class="page-item disabled"><span class="page-link">...</span></li>
                                            @endif
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $items->url($totalPages) }}">{{ $totalPages }}</a>
                                            </li>
                                        @endif
                                    </ul>
                                @endif
                            </nav>
                        </div>
                    </div>

                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <!-- <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                <li><a href="shop-grid-right.html">Shoes & Bags</a></li>
                                <li><a href="shop-grid-right.html">Blouses & Shirts</a></li>
                                <li><a href="shop-grid-right.html">Dresses</a></li>
                                <li><a href="shop-grid-right.html">Swimwear</a></li>
                                <li><a href="shop-grid-right.html">Beauty</a></li>
                                <li><a href="shop-grid-right.html">Jewelry & Watch</a></li>
                                <li><a href="shop-grid-right.html">Accessories</a></li>
                            </ul>
                        </div> -->
                        <!-- Fillter By Price -->
                        <div class="sidebar-widget price_range range mb-30">
                            <form action="" id="products_filter">
                                <input type="hidden" name="category_id" value="{{$category?->id}}">
                                <input type="hidden" name="limit" value="{{$limit}}">
                                <input type="hidden" name="orderby" value="{{$orderby}}">
                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title mb-10">@lang('frontend.fill_by_price')</h5>
                                    <div class="bt-1 border-color-1"></div>
                                </div>
                                <div class="price-filter">
                                    <div class="price-filter-inner">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <div class="label-input">
                                                <span>@lang('frontend.filter_range'):</span>
                                                <input type="text" id="amount" placeholder="Add Your Price" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group">
                                    <div class="list-group-item mb-10 mt-10">
                                        <label class="fw-900">@lang('frontend.all_brends')</label>
                                        <div class="custome-checkbox" id="brendList">
                                            @foreach($brends as $brend)
                                                <input class="form-check-input" @checked(request()->brend == $brend->id) type="checkbox" name="brend" id="brend_{{$brend->id}}" value="{{$brend->id}}">
                                                <label class="form-check-label" for="brend_{{$brend->id}}"><span>{{ $brend->title }} ({{$brend->products()->count()}})</span></label>
                                                <br>
                                            @endforeach
                                        </div>

                                        <div id="parameterList">
                                            @foreach($parameters->map(function ($item){return $item->parent;})->unique()->sortBy(function($item){return $item->title;}) as $parameter)
                                                <label class="fw-900 mt-15">{{$parameter->title}}</label>
                                                <div class="custome-checkbox">
                                                    @foreach($parameter->children as $child)
                                                        @if($parameters->where('id', $child->id)->count())
                                                            <input @checked(request()->parameter and in_array($child->id, request()->parameter)) class="form-check-input" type="checkbox" name="parameter[]" id="parameter_{{$child->id}}" value="{{$child->id}}">
                                                            <label class="form-check-label" for="parameter_{{$child->id}}"><span> {{ $child->title }} ({{$child->products()->count()}})</span></label>
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endforeach
                                        </div>



                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">@lang('frontend.new_products')</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            @foreach($latest_products as $product)
                                <div class="single-post clearfix">
                                    <div class="image">
                                        <img src="{{ get_image($product->image) }}" alt="{{ product_slug($product->slug) }}">
                                    </div>
                                    <div class="content pt-10">
                                        <h5><a href="{{ product_slug($product->slug) }}">Chen Cardigan</a></h5>
                                        @include('site.pages.inc.product_price', ['pro'=>$product])
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


@section('footer_more')

@endsection
