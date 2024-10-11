@extends('gopanel.layouts.main')

@section('content')



    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Əlaqə</h4>
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


{{--                @foreach($languages as $lang)--}}
{{--                    <div  @class(['tab-pane','fade', 'show'=>$loop->index==0, 'active'=>$loop->index==0, 'mt-4']) id="{{$lang->locale}}" role="tabpanel" aria-labelledby="{{$lang->locale}}-tab">--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="category-name" class="form-label">Əlaqə ünvan({{$lang->locale}})</label>--}}
{{--                            <input type="text" class="form-control" id="category-name" name="address[{{$lang->locale}}]" value="{{$item->getTranslation('address', $lang->locale)}}" placeholder="">--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="category-name" class="form-label">Əlaqə başlıq({{$lang->locale}})</label>--}}
{{--                            <input type="text" class="form-control" id="category-name" name="title[{{$lang->locale}}]" value="{{$item->getTranslation('title', $lang->locale)}}" placeholder="">--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="category-name" class="form-label">Əlaqə haqqında({{$lang->locale}})</label>--}}
{{--                            <input type="text" class="form-control" id="category-name" name="desc[{{$lang->locale}}]" value="{{$item->getTranslation('desc', $lang->locale)}}" placeholder="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
                <div class="my-3">
                    <label for="category-name" class="form-label">Xəritə(kodu)</label>
                    <input type="text" class="form-control" id="category-map" name="map" value="{{$item->map}}" placeholder="">
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
