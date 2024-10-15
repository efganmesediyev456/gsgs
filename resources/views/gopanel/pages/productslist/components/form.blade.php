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
            <div class="row">
                <div class="col-lg mb-3">
                    <label for="category-name" class="form-label">Məhsul başlıq({{$lang->locale}})</label>
                    <input type="text" class="form-control" id="category-name" name="title[{{$lang->locale}}]" value="{{$item->getTranslation('title', $lang->locale)}}" placeholder="">
                </div>
                <div class="col-lg mb-3">
                    <label for="category-name" class="form-label">Məhsul qısa başlıq ({{$lang->locale}})</label>
                    <input type="text" class="form-control" id="category-name" name="subtitle[{{$lang->locale}}]" value="{{$item->getTranslation('subtitle', $lang->locale)}}" placeholder="">
                </div>

            </div>
            <div class="col-lg mb-3">
                <label for="category-name" class="form-label">Məhsul taqlar ({{$lang->locale}})</label>
                <input type="text" class="form-control tagsview"  name="tags[{{$lang->locale}}]" value="{{$item->getTranslation('tags', $lang->locale)}}" placeholder="">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Məhsul kontent ({{$lang->locale}})</label>
                <textarea  type="text" class="form-control ckeditor" name="desc[{{$lang->locale}}]"  placeholder="">{{$item->getTranslation('desc', $lang->locale)}}</textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-lg">
                    <label for="category-name" class="form-label">Məhsul seo başlıq ({{$lang->locale}})</label>
                    <input type="text" class="form-control"  name="seo_title[{{$lang->locale}}]" value="{{$item->getTranslation('seo_title', $lang->locale)}}" placeholder="">
                </div>

                <div class="mb-3 col-lg">
                    <label for="category-name" class="form-label">Məhsul seo haqqında ({{$lang->locale}})</label>
                    <textarea type="text" class="form-control"  name="seo_desc[{{$lang->locale}}]"  placeholder="">{{$item->getTranslation('seo_desc', $lang->locale)}}</textarea>
                </div>
            </div>

            <div class="mb-3">
                <label for="category-name" class="form-label">Məhsul seo açar sözlər ({{$lang->locale}})</label>
                <input type="text" class="form-control tagsview"  name="seo_keywords[{{$lang->locale}}]" value="{{$item->getTranslation('seo_keywords', $lang->locale)}}" placeholder="">
            </div>




        </div>
    @endforeach
   <div class="row">
       <div class="mb-3 col-lg">
           <label for="category-name" class="form-label">Məhsul keçid linki </label>
           <input  type="text" class="form-control ckeditor" name="slug"  placeholder="" value="{{$item->slug}}">
       </div>
       <div class="mb-3 col-lg">
           <label for="category-name" class="form-label">Məhsul Sku kodu</label>
           <input  type="text" class="form-control" name="sku"  placeholder="" value="{{$item->sku}}">
       </div>
       <div class="mb-3 col-lg">
           <label for="category-name" class="form-label">Məhsul Stock miqdarı</label>
           <input  type="text" class="form-control" name="stock_count"  placeholder="" value="{{$item->stock_count}}">
       </div>
       <div class="mb-3 col-lg">
           <label for="categories" class="form-label">Kateqoriyalar</label>
           <select name="categories[]" id="categories" class="form-control select2" multiple>
               @foreach($categories as $category)
                   <option value="{{ $category->id }}"
                       {{ $item->categories->contains($category->id) ? 'selected' : '' }}>
                       {{ $category->title }}
                   </option>
               @endforeach
           </select>
       </div>

       <div class="mb-3 col-lg">
           <label for="categories" class="form-label">Brend</label>
           <select name="brend_id" id="brend" class="form-control select2" >
               <option value="">Seç</option>
                @foreach($brends as $brend)
                   <option value="{{ $brend->id }}"
                       {{ $item?->brend?->id == $brend->id? 'selected' : '' }}>
                       {{ $brend->title }}
                   </option>
               @endforeach
           </select>
       </div>
   </div>

    <div class="row">
        <div class="mb-3 col-lg">
            <label for="category-name" class="form-label">Məhsul  qiymət </label>
            <input type="number" any=".01" class="form-control"  name="price" value="{{$item->price}}" placeholder="">
        </div>
        <div class="mb-3 col-lg">
            <label for="category-name" class="form-label">Məhsul endirimli qiymət </label>
            <input type="number" any=".01" class="form-control"  name="discount_price" value="{{$item->discount_price}}" placeholder="">
        </div>

        <div class="mb-3 col-lg">
            <label  class="form-label">Məhsul endirimli qiymətlər bölümündə göstər</label>
            <select name="discount_view" id="" class="select2 form-control">
                <option value="0" @selected($item->getRawOriginal('discount_view')==0)>Xeyr</option>
                <option value="1" @selected($item->getRawOriginal('discount_view')==1)>Bəli</option>
            </select>

        </div>

        <div class="mb-3 col-lg">
            <label for="categories" class="form-label">Parametrlər</label>
            <select name="parameters[]" id="parameters" class="form-control select2" multiple>

                @foreach($parameters as $param)
                    <option disabled value="{{ $param->id }}"
                        {{ $item?->parameters?->contains($param->id) ? 'selected' : '' }}>
                        {{ $param->title }}
                    </option>
                    @if($param->children->count())
                    @foreach($param->children as $child)
                            <option value="{{ $child->id }}"
                                {{ $item?->parameters?->contains($child->id) ? 'selected' : '' }}>
                                ---{{ $child->title }}
                            </option>
                    @endforeach
                    @endif
                @endforeach
            </select>
        </div>


    </div>

    <div class="mb-3">
        <label for="category-name" class="form-label">Şəkil <span class="text-danger">Ölçü(800X900)</span></label>
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
