@extends('gopanel.layouts.main')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Müştəri rəyləri</h4>
                {{-- <ol class="breadcrumb">
                    <ul>Əsas Səhifə</ul>
                    <ul>Kategoriyalar</ul>
                </ol> --}}
            </div>

            <div class="col-sm-6">
                    <div class="float-right">
                        <button class="btn btn-success" id="openmodal" data-route="{{route("gopanel.customerratings.updateOrSave")}}">
                            <i class="fas fa-plus-circle"></i> Əlavə Et
                        </button>
                    </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
             @include('gopanel.inc.dynamic_datatable', [
                '__datatableName' => 'CustomerRating',
                '__datatableId' => 'datatable-customerrating',
             ])
        </div>
    </div>
    @include('gopanel.pages.customerratings.partials.modals')
@endsection
@push('scripts')
    <script src="{{ asset('admin/assets/modules/js/template.js?v='.time()) }}"></script>
@endpush
