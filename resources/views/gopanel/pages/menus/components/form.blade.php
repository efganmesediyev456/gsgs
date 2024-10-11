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
                <label for="category-name" class="form-label">Menu başlıq ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="title[{{$lang->locale}}]" value="{{$item->getTranslation('title', $lang->locale)}}" placeholder="Menu adını daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Menu seo başlıq ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="seo_title[{{$lang->locale}}]" value="{{$item->getTranslation('seo_title', $lang->locale)}}" placeholder="Menu seo başlıq adını daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Menu seo açar sözlər ({{$lang->locale}})</label>
                <input type="text" class="form-control tagsview"  name="seo_keywords[{{$lang->locale}}]" value="{{$item->getTranslation('seo_keywords', $lang->locale)}}" placeholder="Menu seo tag daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Menu seo haqqında ({{$lang->locale}})</label>
                <textarea type="text" class="form-control"  name="seo_desc[{{$lang->locale}}]" placeholder="Menu description daxil edin">{{$item->getTranslation('seo_desc', $lang->locale)}}</textarea>
            </div>
        </div>
    @endforeach

{{--    <div class="mb-3">--}}
{{--        <label for="category-name" class="form-label">Menu slug </label>--}}
{{--        <input type="text" class="form-control" id="category-name" name="slug" value="{{$item->slug}}" placeholder="Menu slug daxil edin">--}}
{{--    </div>--}}
    <div class="mb-3">
        <label for="category-name" class="form-label">Şəkil</label>
        <input type="file" class="form-control" id="category-name" name="image" >
        @if($item->image)
        <a href="/storage/{{$item->image}}" target="_blank">
            <img src="/storage/{{$item->image}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
        </a>
        @endif
    </div>
    <input type="hidden" name="parent_id" value="{{ $item->parent_id ?? request()->parent_id }}">
</form>
