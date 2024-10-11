@extends('gopanel.layouts.main')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Sayta Abunə olanlar</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include('gopanel.inc.dynamic_datatable', [
               '__datatableName' => 'SiteApply',
               '__datatableId' => 'datatable-siteapply',
            ])

        </div>
    </div>
    @include('gopanel.pages.features.partials.modals')
@endsection
@push('scripts')
    <script src="{{ asset('admin/assets/modules/js/template.js?v='.time()) }}"></script>
@endpush
