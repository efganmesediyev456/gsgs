@extends('gopanel.layouts.main')

@section('content')



    <div class="page-title-box">
        <div class="row align-items-center ">
            <div class="col-sm-6">
                <h4 class="page-title">Bloq</h4>
                {{-- <ol class="breadcrumb">
                    <ul>Əsas Səhifə</ul>
                    <ul>Kategoriyalar</ul>
                </ol> --}}
            </div>
            <div class="col-sm-6 d-flex justify-content-end">
                <a href="{{ route('gopanel.blogs.index') }}" class="btn btn-success">Geriyə qayıt</a>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include('gopanel.pages.blogs.components.form')
        </div>
    </div>

@endsection
@push('scripts')
    <script src="{{ asset('admin/assets/modules/js/template.js?v='.time()) }}"></script>
@endpush
