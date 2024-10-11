<div class="sidebar-widget widget_alitheme_lastpost mb-20">
    <div class="widget-header position-relative mb-20 pb-10">
        <h5 class="widget-title">@lang('frontend.blogs_trending_now')</h5>
    </div>
    <div class="row">
        @foreach($blogs as $item)
        <div class="@if($loop->first) col-12 sm-grid-content mb-30 @else col-md-6 col-sm-6 sm-grid-content mb-30 @endif">
            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                <a href="blog-post-fullwidth.html">
                    <img src="{{ get_image($item->image) }}" alt="">
                </a>
            </div>
            <div class="post-content media-body">
                <h4 class="post-title mb-10 text-limit-2-row">{{ $item->title }}</h4>
                <div class="entry-meta meta-13 font-xxs color-grey">
                    <span class="post-on mr-10">  {{ ucwords($item->created_at->translatedFormat('d F', app()->getLocale())) }}</span>
                    <span class="hit-count has-dot ">{{ $item->view }} @lang('frontend.blog_views')</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--Widget ads-->

