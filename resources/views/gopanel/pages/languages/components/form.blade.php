<form id="saveForm" action="{{$route}}" enctype="multipart/form-data">



    <div class="mb-3">
        <label for="category-name" class="form-label">Başlıq</label>
        <input type="text" class="form-control" id="category-name" name="title" placeholder="" value="{{ $item->title }}">
    </div>

    <div class="mb-3">
        <label for="category-name" class="form-label">Dilin kodu</label>
        <input type="text" class="form-control" id="category-name" name="locale" placeholder="" value="{{ $item->locale }}">
    </div>

    <div class="mb-3">
        <label for="category-name" class="form-label">İkon şəkli</label>
        <input type="file" class="form-control" id="category-name" name="icon" >
        @if($item->icon)
        <a href="/storage/{{$item->icon}}" target="_blank">
            <img src="/storage/{{$item->icon}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
        </a>
        @endif
    </div>


</form>
