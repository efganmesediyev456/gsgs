<form id="saveForm" action="{{$route}}" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="category-name" class="form-label">Şəkil</label>
        <input type="file" class="form-control" id="category-name" name="image" >
        @if($item->image)
        <a href="/storage/{{$item->image}}" target="_blank" class="my-3 d-block">
            <img src="/storage/{{$item->image}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
        </a>
        @endif
    </div>
</form>
