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
                <label for="category-name" class="form-label">Bloq başlıq({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="title[{{$lang->locale}}]" value="{{$item->getTranslation('title', $lang->locale)}}" placeholder="">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Bloq qısa başlıq ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="category-name" name="subtitle[{{$lang->locale}}]" value="{{$item->getTranslation('subtitle', $lang->locale)}}" placeholder="">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Bloq taqlar ({{$lang->locale}})</label>
                <input type="text" class="form-control tagsview"  name="tags[{{$lang->locale}}]" value="{{$item->getTranslation('tags', $lang->locale)}}" placeholder="">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Bloq kontent ({{$lang->locale}})</label>
                <textarea  type="text" class="form-control ckeditor" name="desc[{{$lang->locale}}]"  placeholder="">{{$item->getTranslation('desc', $lang->locale)}}</textarea>
            </div>

            <div class="mb-3">
                <label for="category-name" class="form-label">Bloq seo başlıq ({{$lang->locale}})</label>
                <input type="text" class="form-control"  name="seo_title[{{$lang->locale}}]" value="{{$item->getTranslation('seo_title', $lang->locale)}}" placeholder="">
            </div>

            <div class="mb-3">
                <label for="category-name" class="form-label">Bloq seo haqqında ({{$lang->locale}})</label>
                <textarea type="text" class="form-control"  name="seo_desc[{{$lang->locale}}]"  placeholder="">{{$item->getTranslation('seo_desc', $lang->locale)}}</textarea>
            </div>

            <div class="mb-3">
                <label for="category-name" class="form-label">Bloq seo açar sözlər ({{$lang->locale}})</label>
                <input type="text" class="form-control tagsview"  name="seo_keywords[{{$lang->locale}}]" value="{{$item->getTranslation('seo_keywords', $lang->locale)}}" placeholder="">
            </div>




        </div>
    @endforeach
    <div class="mb-3">
        <label for="category-name" class="form-label">Bloq keçid linki </label>
        <input  type="text" class="form-control ckeditor" name="slug"  placeholder="" value="{{$item->slug}}">
    </div>
    <div class="mb-3">
        <label for="category-name" class="form-label">Şəkil <span class="text-danger">Ölçü(660X420)</span></label>
        <input type="file" class="form-control" id="category-name" name="image" >
        @if($item->image)
            <a href="/storage/{{$item->image}}" target="_blank">
                <img src="/storage/{{$item->image}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
            </a>
        @endif
    </div>
    <div class="mb-3">
        <button type="button" class="btn btn-primary" id="saveSale"><i class="fas fa-save"></i> Yadda Saxla</button>
    </div>
</form>
