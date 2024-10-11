<form id="saveForm" action="{{$route}}">

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
                <label for="category-name" class="form-label">Kateqoriyanın adı ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="title[{{$lang->locale}}]" value="{{$item->getTranslation('title', $lang->locale)}}" placeholder="Kategoriya adını daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Seo adı ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="seo_title[{{$lang->locale}}]" value="{{$item->getTranslation('seo_title', $lang->locale)}}" placeholder="Kategoriya adını daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Seo haqqında ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="seo_desc[{{$lang->locale}}]" value="{{$item->getTranslation('seo_desc', $lang->locale)}}" placeholder="Kategoriya adını daxil edin">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Seo açar sozler ({{$lang->locale}})</label>
                <input type="text" class="form-control tagsview"  name="seo_keywords[{{$lang->locale}}]" value="{{$item->getTranslation('seo_keywords', $lang->locale)}}" placeholder="Kategoriya adını daxil edin">
            </div>
        </div>
    @endforeach

    <div class="mb-3">
        <label for="category-name" class="form-label">İkon şəkli</label>
        <input type="file" class="form-control" id="category-name" name="icon" >
        @if($item->icon)
            <a href="/storage/{{$item->icon}}" target="_blank">
                <img src="/storage/{{$item->icon}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
            </a>
        @endif
    </div>

    <div class="mb-3">
        <label for="category-name" class="form-label">List şəkli</label>
        <input type="file" class="form-control" id="category-name" name="list_image" >
        @if($item->list_image)
            <a href="/storage/{{$item->list_image}}" target="_blank">
                <img src="/storage/{{$item->list_image}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
            </a>
        @endif
    </div>

    <div class="hiddeninputs">
        @if ($parent_id && !empty($parent_id) && !is_null($parent_id))
            <input type="hidden" name="parent_id" value="{{$parent_id}}">
        @endif
    </div>
</form>
