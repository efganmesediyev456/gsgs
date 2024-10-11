@extends('gopanel.layouts.main')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Kəşf edin</h4>
                {{-- <ol class="breadcrumb">
                    <ul>Əsas Səhifə</ul>
                    <ul>Kategoriyalar</ul>
                </ol> --}}
            </div>
            @if(\App\Models\Entities\Discover::count()<1)
                <div class="col-sm-6">
                    <div class="float-right">
                        <button class="btn btn-success" id="openmodal" data-route="{{route("gopanel.discovers.updateOrSave")}}">
                            <i class="fas fa-plus-circle"></i> Əlavə Et
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body">
             @include('gopanel.inc.dynamic_datatable', [
                '__datatableName' => 'Discover',
                '__datatableId' => 'datatable-discover',
             ])
        </div>
    </div>
    @include('gopanel.pages.discovers.partials.modals')
@endsection
@push('scripts')
    <script src="{{ asset('admin/assets/modules/js/template.js?v='.time()) }}"></script>
@endpush
