@extends('gopanel.layouts.main')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Məhsullar</h4>
                {{-- <ol class="breadcrumb">
                    <ul>Əsas Səhifə</ul>
                    <ul>Kategoriyalar</ul>
                </ol> --}}
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <a class="btn btn-success" href="{{route("gopanel.productslist.updateOrSave")}}">
                        <i class="fas fa-plus-circle"></i> Əlavə Et
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include('gopanel.inc.dynamic_datatable', [
               '__datatableName' => 'Product',
               '__datatableId' => 'datatable-products',
            ])
        </div>
    </div>
@endsection
{{--@push('scripts')--}}
{{--    <script src="{{ asset('admin/assets/modules/js/template.js?v='.time()) }}"></script>--}}
{{--@endpush--}}
