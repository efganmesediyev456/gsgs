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
                <label for="category-name" class="form-label">Reklam başlıq ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="title[{{$lang->locale}}]" value="{{$item->getTranslation('title', $lang->locale)}}" placeholder="Reklam adını daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Reklam başlıq 2 ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="title2[{{$lang->locale}}]" value="{{$item->getTranslation('title2', $lang->locale)}}" placeholder="Reklam adını daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Reklam başlıq 3 ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="title3[{{$lang->locale}}]" value="{{$item->getTranslation('title3', $lang->locale)}}" placeholder="Reklam adını daxil edin">
            </div>
{{--            <div class="mb-3">--}}
{{--                <label for="category-name" class="form-label">Reklam başlıq 4 ({{$lang->locale}})</label>--}}
{{--                <input type="text" class="form-control" id="category-name" name="title4[{{$lang->locale}}]" value="{{$item->getTranslation('title4', $lang->locale)}}" placeholder="Reklam adını daxil edin">--}}
{{--            </div>--}}
        </div>
    @endforeach
    <div class="mb-3">
        <label for="category-name" class="form-label">Url</label>
        <input type="text" class="form-control" id="url" name="url" value="{{$item->url}}" placeholder="Url daxil edin">
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
