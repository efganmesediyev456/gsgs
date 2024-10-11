@extends('gopanel.layouts.main')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Tərcümələr</h4>
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <button class="btn btn-success" id="openmodal" data-route="{{route("gopanel.langtranslations.updateOrSave")}}">
                        <i class="fas fa-plus-circle"></i> Əlavə Et
                    </button>
                    <a class="btn btn-success" href="/gopanel/langtranslations/reset">
                        <i class="fas fa-plus-circle"></i> Əlavə Et (Tabledan)
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
             @include('gopanel.inc.dynamic_datatable', [
                '__datatableName' => 'LangTranslation',
                '__datatableId' => 'datatable-langtranslations',
             ])

        </div>
    </div>
    @include('gopanel.pages.langtranslations.partials.modals')
@endsection
@push('scripts')
    <script src="{{ asset('admin/assets/modules/js/template.js?v='.time()) }}"></script>
@endpush
