@extends('gopanel.layouts.main')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Əlaqə detalları</h4>
                {{-- <ol class="breadcrumb">
                    <ul>Əsas Səhifə</ul>
                    <ul>Kategoriyalar</ul>
                </ol> --}}
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <button class="btn btn-success" id="openmodal" data-route="{{route("gopanel.contactdetails.updateOrSave")}}">
                        <i class="fas fa-plus-circle"></i> Əlavə Et
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
             @include('gopanel.inc.dynamic_datatable', [
                '__datatableName' => 'ContactDetail',
                '__datatableId' => 'datatable-contactdetails',
             ])

        </div>
    </div>
    @include('gopanel.pages.contactdetails.partials.modals')
@endsection
@push('scripts')
    <script src="{{ asset('admin/assets/modules/js/template.js?v='.time()) }}"></script>
@endpush
