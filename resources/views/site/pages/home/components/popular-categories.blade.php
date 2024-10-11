@foreach($categories as $category)
<div class="card-1">
    <figure class=" img-hover-scale overflow-hidden">
        <a href="{{ category_slug($category) }}">
            <img src="{{ get_image($category->list_image) }}" alt="">
        </a>
    </figure>
    <h5><a href="{{ category_slug($category) }}">{{ $category->title }}</a></h5>
</div>
@endforeach

