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
                <input type="text" class="form-control" id="title" name="title[{{$lang->locale}}]" value="{{$item->getTranslation('title', $lang->locale)}}" placeholder="">
            </div>
            <div class="mb-3">
                <label for="category-name" class="form-label">Ünvan ({{$lang->locale}})</label>
                <input type="text" class="form-control" id="address" name="address[{{$lang->locale}}]" value="{{$item->getTranslation('address', $lang->locale)}}" placeholder="">
            </div>
        </div>
    @endforeach
    <div class="mb-3">
        <label for="category-name" class="form-label">Email</label>
        <input type="text" class="form-control" id="address" name="email" value="{{$item->email}}" placeholder="">
    </div>
    <div class="mb-3">
        <label for="category-name" class="form-label">Telefon nömrəsi</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{$item->phone}}" placeholder="">
    </div>

</form>
