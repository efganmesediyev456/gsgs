<section class="featured section-padding position-relative">
    <div class="container">
        <div class="row">
            @foreach($features as $feature)
            <a href="{{ $feature->url }}" class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <img src="{{ get_image($feature->icon) }}" alt="">
                    <h4 class="bg-1">{{ $feature->title }}</h4>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
