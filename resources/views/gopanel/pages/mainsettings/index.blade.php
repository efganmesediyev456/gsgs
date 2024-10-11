@extends('gopanel.layouts.main')

@section('content')



    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Əsas Ayarlar</h4>
                {{-- <ol class="breadcrumb">
                    <ul>Əsas Səhifə</ul>
                    <ul>Kategoriyalar</ul>
                </ol> --}}
            </div>
{{--            <div class="col-sm-6">--}}
{{--                <div class="float-right">--}}
{{--                    <button class="btn btn-success" id="openmodal" data-route="{{route("gopanel.sliders.updateOrSave")}}">--}}
{{--                        <i class="fas fa-plus-circle"></i> Əlavə Et--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="card">
        <div class="card-body">
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
                            <label for="category-name" class="form-label">Sayt adı({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="title[{{$lang->locale}}]" value="{{$item->getTranslation('title', $lang->locale)}}" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Footer adı({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="footer_title[{{$lang->locale}}]" value="{{$item->getTranslation('footer_title', $lang->locale)}}" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Footer kontent({{$lang->locale}})</label>
                            <textarea class="form-control" id="category-name" name="footer_desc[{{$lang->locale}}]"  placeholder="">{{$item->getTranslation('footer_desc', $lang->locale)}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="category-name" class="form-label">Footer ünvan({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="footer_address[{{$lang->locale}}]" value="{{$item->getTranslation('footer_address', $lang->locale)}}" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="category-name" class="form-label">Footer iş saatları({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="footer_hours[{{$lang->locale}}]" value="{{$item->getTranslation('footer_hours', $lang->locale)}}" placeholder="">
                        </div>


                        <div class="mb-3">
                            <label for="category-name" class="form-label">Footer Deal başlıq({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="footer_deal_title[{{$lang->locale}}]" value="{{$item->getTranslation('footer_deal_title', $lang->locale)}}" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Footer Deal haqqında({{$lang->locale}})</label>
                            <textarea class="form-control ckeditor"  name="footer_deal_desc[{{$lang->locale}}]"  placeholder="">{{$item->getTranslation('footer_deal_desc', $lang->locale)}}</textarea>
                        </div>


                        <div class="mb-3">
                            <label for="category-name" class="form-label">Müəllif hüququ ({{$lang->locale}})</label>
                            <textarea class="form-control ckeditor"  name="copyright[{{$lang->locale}}]"  placeholder="">{{$item->getTranslation('copyright', $lang->locale)}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Tərəfindən yaradılmışdır ({{$lang->locale}})</label>
                            <textarea class="form-control ckeditor"  name="created_by[{{$lang->locale}}]"  placeholder="">{{$item->getTranslation('created_by', $lang->locale)}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="category-name" class="form-label">Header kontent  ({{$lang->locale}})</label>
                            <input type="text" class="form-control tagsview"  name="header_desc[{{$lang->locale}}]" value="{{$item->getTranslation('header_desc', $lang->locale)}}" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="category-name" class="form-label">Seo Başlıq ({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="seo_title[{{$lang->locale}}]" value="{{$item->getTranslation('seo_title', $lang->locale)}}" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Seo haqqında  ({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="seo_desc[{{$lang->locale}}]" value="{{$item->getTranslation('seo_desc', $lang->locale)}}" placeholder="">
                        </div>

                        <div class="mb-3">
                            <label for="category-name" class="form-label">Seo açar sözlər  ({{$lang->locale}})</label>
                            <input type="text" class="form-control tagsview"  name="seo_tags[{{$lang->locale}}]" value="{{$item->getTranslation('seo_tags', $lang->locale)}}" placeholder="">
                        </div>


                    </div>
                @endforeach

                <div class="mb-3">
                    <label for="category-name" class="form-label">Header Telefon nömrəsi</label>
                    <input type="text" class="form-control"  name="header_phone" value="{{$item->header_phone}}" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="category-name" class="form-label">Footer telefon nömrəsi</label>
                    <input type="text" class="form-control"  name="footer_phone" value="{{$item->footer_phone}}" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="category-name" class="form-label">Whatsapp(Sifarişin gedəcəyi nömrə)(nümunə: 994558857194)</label>
                    <input type="text" class="form-control"  name="whatsapp" value="{{$item->whatsapp}}" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="category-name" class="form-label">Xəritə (kod)</label>
                    <input type="text" class="form-control"  name="map" value="{{$item->map}}" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="category-name" class="form-label">Logo</label>
                    <input type="file" class="form-control" id="category-name" name="logo" >
                    @if($item->logo)
                        <a href="/storage/{{$item->logo}}" target="_blank">
                            <img src="/storage/{{$item->logo}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
                        </a>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="category-name" class="form-label">Footer logo</label>
                    <input type="file" class="form-control" id="category-name" name="footer_logo" >
                    @if($item->footer_logo)
                        <a href="/storage/{{$item->footer_logo}}" target="_blank">
                            <img src="/storage/{{$item->footer_logo}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
                        </a>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="category-name" class="form-label">Favikon</label>
                    <input type="file" class="form-control" id="category-name" name="favicon" >
                    @if($item->favicon)
                        <a href="/storage/{{$item->favicon}}" target="_blank">
                            <img src="/storage/{{$item->favicon}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
                        </a>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="category-name" class="form-label">Footer deal şəkil</label>
                    <input type="file" class="form-control" id="category-name" name="footer_deal_image" >
                    @if($item->footer_deal_image)
                        <a href="/storage/{{$item->footer_deal_image}}" target="_blank">
                            <img src="/storage/{{$item->footer_deal_image}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
                        </a>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="button" class="btn btn-primary" id="saveSale"><i class="fas fa-save"></i> Yadda Saxla</button>
                </div>
            </form>


        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('admin/assets/modules/js/template.js?v='.time()) }}"></script>
@endpush
