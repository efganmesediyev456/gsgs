<form id="saveForm" action="{{$route}}" enctype="multipart/form-data">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($languages as $lang)
            <li class="nav-item" role="presentation">
                <button @class(['nav-link', 'active'=>$loop->index==0]) id="{{$lang->locale}}-tab" data-bs-toggle="tab" data-bs-target="#{{$lang->locale}}" type="button" role="tab" aria-controls="{{$lang->locale}}" aria-selected="true">
                    {{$lang->locale}}
                </button>
            </li>
        @endforeach
    </ul>


    @foreach($languages as $lang)
        <div  @class(['tab-pane','fade', 'show'=>$loop->index==0, 'active'=>$loop->index==0, 'mt-4']) id="{{$lang->locale}}" role="tabpanel" aria-labelledby="{{$lang->locale}}-tab">
            <div class="mb-3">
                <label for="category-name" class="form-label">Ad ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="name[{{$lang->locale}}]" value="{{$item->getTranslation('name', $lang->locale)}}" placeholder="Ad daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Vəzifə ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="position[{{$lang->locale}}]" value="{{$item->getTranslation('position', $lang->locale)}}" placeholder="Vəzifə daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Fikir ({{$lang->locale}})</label>
                <textarea type="text" class="form-control" id="category-name" name="message[{{$lang->locale}}]" placeholder="Fikir daxil edin">{{$item->getTranslation('message', $lang->locale)}}</textarea>
            </div>
        </div>
    @endforeach
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
