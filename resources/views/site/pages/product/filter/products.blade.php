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
                    <li><a class="@if($limit == 50) active @endif" href="{{ route('site.products.index',array_merge(request()->query(),['limit'=>50, 'language'=>app()->getLocale()])) }}">50</a></li>
                    <li><a class="@if($limit == 100) active @endif" href="{{ route('site.products.index',array_merge(request()->query(),['limit'=>100, 'language'=>app()->getLocale()])) }}">100</a></li>
                    <li><a class="@if($limit == 150) active @endif" href="{{ route('site.products.index',array_merge(request()->query(),['limit'=>150, 'language'=>app()->getLocale()])) }}">150</a></li>
                    <li><a class="@if($limit == 200) active @endif" href="{{ route('site.products.index',array_merge(request()->query(),['limit'=>200, 'language'=>app()->getLocale()])) }}">200</a></li>
                    <li><a class="@if($limit == 'all') active @endif" href="{{ route('site.products.index',array_merge(request()->query(),['limit'=>'all', 'language'=>app()->getLocale()])) }}">All</a></li>
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
                    <li><a  class="@if($orderby=='filter_from_a_to_z') active @endif" href="{{ route('site.products.index',array_merge($_GET,['filter'=>'filter_from_a_to_z', 'language'=>app()->getLocale()])) }}">@lang('frontend.filter_from_a_to_z')</a></li>
                    <li><a  class="@if($orderby=='filter_from_z_to_a') active @endif" href="{{ route('site.products.index',array_merge($_GET,['filter'=>'filter_from_z_to_a', 'language'=>app()->getLocale()])) }}">@lang('frontend.filter_from_z_to_a')</a></li>
                    <li><a  class="@if($orderby=='filter_from_high_to_low') active @endif" href="{{ route('site.products.index',array_merge($_GET,['filter'=>'filter_from_high_to_low', 'language'=>app()->getLocale() ])) }}">@lang('frontend.filter_from_high_to_low')</a></li>
                    <li><a  class="@if($orderby=='filter_from_low_to_high') active @endif" href="{{ route('site.products.index',array_merge($_GET,['filter'=>'filter_from_low_to_high', 'language'=>app()->getLocale()])) }}">@lang('frontend.filter_from_low_to_high')</a></li>
                    <li><a  class="@if($orderby=='filter_mostly_viewed') active @endif" href="{{ route('site.products.index',array_merge($_GET,['filter'=>'filter_mostly_viewed', 'language'=>app()->getLocale()])) }}">@lang('frontend.filter_mostly_viewed')</a></li>
                    <li><a  class="@if($orderby=='filter_latest_date') active @endif" href="{{ route('site.products.index',array_merge($_GET,['filter'=>'filter_latest_date', 'language'=>app()->getLocale()])) }}">@lang('frontend.filter_latest_date')</a></li>
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
