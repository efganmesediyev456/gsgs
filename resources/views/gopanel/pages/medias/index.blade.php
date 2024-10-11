@extends('gopanel.layouts.main')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Media</h4>
                {{-- <ol class="breadcrumb">
                    <ul>Əsas Səhifə</ul>
                    <ul>Kategoriyalar</ul>
                </ol> --}}
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <button class="btn btn-success" id="openmodal" data-route="{{route("gopanel.medias.updateOrSave",['imageable_type'=>request()->imageable_type,'imageable_id'=>request()->imageable_id])}}">
                        <i class="fas fa-plus-circle"></i> Əlavə Et
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

             @include('gopanel.inc.dynamic_datatable', [
                '__datatableName' => 'Media',
                '__datatableId' => 'datatable-media',
                'imageable_type'       => request()->imageable_type,
                'imageable_id'         => request()->imageable_id
             ])

        </div>
    </div>
    @include('gopanel.pages.medias.partials.modals')
@endsection
@push('scripts')
    <script src="{{ asset('admin/assets/modules/js/template.js?v='.time()) }}"></script>
@endpush
