<nav class="toolbox sticky-toolbox sticky-content fix-top">
    <div class="toolbox-left">
        <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                                    btn-icon-left d-block d-lg-none"><i
                class="w-icon-category"></i><span>Filters</span></a>
        <div class="toolbox-item toolbox-sort select-box text-dark">
            <label>@lang('frontend.sort_by') :</label>
            <select name="orderby" class="form-control filterSelect">
                <option value="">@lang('frontend.choose_filter')</option>
                <option value="filter_from_a_to_z" {{ old('filter', $orderby) == 'filter_from_a_to_z' ? 'selected' : '' }}>@lang('frontend.filter_from_a_to_z')</option>
                <option value="filter_from_z_to_a" {{ old('filter', $orderby) == 'filter_from_z_to_a' ? 'selected' : '' }}>@lang('frontend.filter_from_z_to_a')</option>
                <option value="filter_from_high_to_low" {{ old('filter', $orderby) == 'filter_from_high_to_low' ? 'selected' : '' }}>@lang('frontend.filter_from_high_to_low')</option>
                <option value="filter_from_low_to_high" {{ old('filter', $orderby) == 'filter_from_low_to_high' ? 'selected' : '' }}>@lang('frontend.filter_from_low_to_high')</option>
                <option value="filter_mostly_viewed" {{ old('filter', $orderby) == 'filter_mostly_viewed' ? 'selected' : '' }}>@lang('frontend.filter_mostly_viewed')</option>
                <option value="filter_latest_date" {{ old('filter', $orderby) == 'filter_latest_date' ? 'selected' : '' }}>@lang('frontend.filter_latest_date')</option>
            </select>

        </div>
    </div>
    {{--                                        <div class="toolbox-right">--}}
    {{--                                            <div class="toolbox-item toolbox-show select-box">--}}
    {{--                                                <select name="count" class="form-control">--}}
    {{--                                                    <option value="9">Show 9</option>--}}
    {{--                                                    <option value="12" selected="selected">Show 12</option>--}}
    {{--                                                    <option value="24">Show 24</option>--}}
    {{--                                                    <option value="36">Show 36</option>--}}
    {{--                                                </select>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="toolbox-item toolbox-layout">--}}
    {{--                                                <a href="vendor-wcmp-store-product-grid.html" class="icon-mode-grid btn-layout active">--}}
    {{--                                                    <i class="w-icon-grid"></i>--}}
    {{--                                                </a>--}}
    {{--                                                <a href="vendor-wcmp-store-product-list.html" class="icon-mode-list btn-layout">--}}
    {{--                                                    <i class="w-icon-list"></i>--}}
    {{--                                                </a>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
</nav>
<div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
    @foreach($items as $product)
        <div class="product-wrap">
            <div class="product text-center">
                <figure class="product-media">
                    <a href="{{ product_slug($product->slug) }}">
                        <img src="{{ get_image($product->image) }}" alt="Product"
                             width="300" height="338" />
                    </a>
                    {{--                                                    <div class="product-action-vertical">--}}
                    {{--                                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart" title="Add to cart"></a>--}}
                    {{--                                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart" title="Wishlist"></a>--}}
                    {{--                                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>--}}
                    {{--                                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quick View"></a>--}}
                    {{--                                                    </div>--}}
                </figure>
                <div class="product-details">
                    <h3 class="product-name">
                        <a href="{{ product_slug($product->slug) }}">{{ $product->title }}</a>
                    </h3>
                    {{--                                                    <div class="ratings-container">--}}
                    {{--                                                        <div class="ratings-full">--}}
                    {{--                                                            <span class="ratings" style="width: 100%;"></span>--}}
                    {{--                                                            <span class="tooltiptext tooltip-top"></span>--}}
                    {{--                                                        </div>--}}
                    {{--                                                        <a href="product-default.html" class="rating-reviews">(3--}}
                    {{--                                                            reviews)</a>--}}
                    {{--                                                    </div>--}}
                    <div class="product-pa-wrapper">
                        <div class="product-price">
                            <ins class="new-price">${{ number_format($product->price, 2) }}</ins>
                            @if($product->discount_price)
                                <del class="old-price">${{number_format($product->discount_price, 2)}}</del>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="toolbox toolbox-pagination justify-content-between">
    <p class="showing-info mb-2 mb-sm-0">
        Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }} results
    </p>
    <ul class="pagination">
        @if ($items->onFirstPage())
            <li class="prev disabled">
                <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                    <i class="w-icon-long-arrow-left"></i>@lang('frontend.prev')
                </a>
            </li>
        @else
            <li class="prev">
                <a href="{{ $items->previousPageUrl() }}" aria-label="Previous">
                    <i class="w-icon-long-arrow-left"></i>@lang('frontend.prev')
                </a>
            </li>
        @endif
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

        @if ($items->hasMorePages())
            <li class="next">
                <a href="{{ $items->nextPageUrl() }}" aria-label="Next">
                    @lang('frontend.next')<i class="w-icon-long-arrow-right"></i>
                </a>
            </li>
        @else
            <li class="next disabled">
                <a href="#" aria-label="Next" tabindex="-1" aria-disabled="true">
                    @lang('frontend.next')<i class="w-icon-long-arrow-right"></i>
                </a>
            </li>
        @endif
    </ul>
</div>
