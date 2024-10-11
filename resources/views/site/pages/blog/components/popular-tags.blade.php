
@if($tags and explode(',', $tags) and count(explode(',', $tags)))
            @foreach(explode(',', $tags) as $exp)
                <a class="tag-cloud-link" href="#">{{ $exp }}</a>
            @endforeach
@endif
