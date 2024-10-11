<form id="saveForm" action="{{$route}}" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="category-name" class="form-label">image <span class="text-danger">Size(800X900)</span></label>
        <input type="file" class="form-control" id="category-name" name="file" >
        @if($item->file)
        <a href="/storage/{{$item->file}}" target="_blank">
            <img src="/storage/{{$item->file}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
        </a>
        @endif
    </div>
</form>
