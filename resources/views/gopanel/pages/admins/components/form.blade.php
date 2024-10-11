<form id="saveForm" action="{{$route}}" enctype="multipart/form-data">


    <div class="mb-3">
        <label for="category-name" class="form-label">Ad </label>
        <input type="text" class="form-control" id="category-name" name="name" value="{{$item->name}}" placeholder="">
    </div>

    <div class="mb-3">
        <label for="category-name" class="form-label">Soyad </label>
        <input type="text" class="form-control" id="category-name" name="surname" value="{{$item->surname}}" placeholder="">
    </div>

    <div class="mb-3">
        <label for="category-name" class="form-label">Email </label>
        <input type="text" class="form-control" id="category-name" name="email" value="{{$item->email}}" placeholder="">
    </div>

    <div class="mb-3">
        <label for="category-name" class="form-label">Şifrə </label>
        <input type="password" class="form-control" id="category-name" name="password" value="" placeholder="">
    </div>



    <div class="mb-3">
        <label for="category-name" class="form-label">Şəkil</label>
        <input type="file" class="form-control" id="category-name" name="image" >
        @if($item->image)
        <a href="/storage/{{$item->image}}" target="_blank">
            <img src="/storage/{{$item->image}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
        </a>
        @endif
    </div>
</form>
