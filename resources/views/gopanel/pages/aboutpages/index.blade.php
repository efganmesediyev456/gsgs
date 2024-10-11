@extends('gopanel.layouts.main')

@section('content')



    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Haqqımızda səhifəsi</h4>
                {{-- <ol class="breadcrumb">
                    <ul>Əsas Səhifə</ul>
                    <ul>Kategoriyalar</ul>
                </ol> --}}
            </div>

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
                            <label for="category-name" class="form-label">Haqqımızda  başlıq1({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="title1[{{$lang->locale}}]" value="{{$item->getTranslation('title1', $lang->locale)}}" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Haqqımızda  başlıq2 ({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="title2[{{$lang->locale}}]" value="{{$item->getTranslation('title2', $lang->locale)}}" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Haqqımızda  kontent ({{$lang->locale}})</label>
                            <textarea  type="text" class="form-control ckeditor" name="desc[{{$lang->locale}}]"  placeholder="">{{$item->getTranslation('desc', $lang->locale)}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="category-name" class="form-label">Müştəri rəyləri başlıq1({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="customer_title1[{{$lang->locale}}]" value="{{$item->getTranslation('customer_title1', $lang->locale)}}" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Müştəri rəyləri başlıq2({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="customer_title2[{{$lang->locale}}]" value="{{$item->getTranslation('customer_title2', $lang->locale)}}" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Müştəri rəyləri başlıq3({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="customer_title3[{{$lang->locale}}]" value="{{$item->getTranslation('customer_title3', $lang->locale)}}" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="category-name" class="form-label">Müştəri rəyləri başlıq4({{$lang->locale}})</label>
                            <input type="text" class="form-control" id="category-name" name="customer_title4[{{$lang->locale}}]" value="{{$item->getTranslation('customer_title4', $lang->locale)}}" placeholder="">
                        </div>

                    </div>
                @endforeach
                <div class="mb-3">
                    <label for="category-name" class="form-label">Şəkil</label>
                    <input type="file" class="form-control" id="category-name" name="image1" >
                    @if($item->image1)
                        <a href="/storage/{{$item->image1}}" target="_blank">
                            <img src="/storage/{{$item->image1}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">
                        </a>
                    @endif
                </div>
{{--                <div class="mb-3">--}}
{{--                    <label for="category-name" class="form-label">Şəkil2</label>--}}
{{--                    <input type="file" class="form-control" id="category-name" name="image2" >--}}
{{--                    @if($item->image2)--}}
{{--                        <a href="/storage/{{$item->image2}}" target="_blank">--}}
{{--                            <img src="/storage/{{$item->image2}}" alt="" width="200" style="object-fit: cover" height="100" class="mt-1">--}}
{{--                        </a>--}}
{{--                    @endif--}}
{{--                </div>--}}
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
