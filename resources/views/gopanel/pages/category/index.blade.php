@extends('gopanel.layouts.main')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Kategorialar</h4>
                {{-- <ol class="breadcrumb">
                    <ul>Əsas Səhifə</ul>
                    <ul>Kategoriyalar</ul>
                </ol> --}}
            </div>
            <div class="col-sm-6">
                <div class="float-right">
                    <button class="btn btn-success" id="openmodal" data-route="{{route("gopanel.category.get.form" , ['parent_id' => $parent_id])}}">
                        <i class="fas fa-plus-circle"></i> Əlavə Et
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- @include('gopanel.inc.dynamic_datatable', [
                '__datatableName' => 'category',
                '__datatableId' => 'datatable-category',
             ]) --}}
             <div class="table-responsive">
                <table class="table table-bordered mb-0">

                    <thead>
                        <tr>
                            <th><i class="fas fa-expand-arrows-alt"></i></th>
                            <th>#</th>
                            <th>Adı</th>
                            <th>Alt Kateqoriyalar</th>
                            <th>Saytın sonunda göstər</th>
                            <th>Status</th>
                            <th>Popyulardımı?</th>
                            <th>Əməliyyatlar</th>
                        </tr>
                    </thead>
                    <tbody class="sortable sortableIcon" data-model="{{$model}}" data-row="order">
                        @foreach ($categories as $category)
                        <tr id="ord-{{$category->id}}">
                            <td class="sort-td"><i class="fas fa-arrows-alt-v"></i></td>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$category->title}}</td>
                            <td>{!!$category->childe_link!!}</td>
                            <td>{!!status_btn($category->id,$model,$category->footer_view, ['row'=>'footer_view'])!!}</td>
                            <td>{!!status_btn($category->id,$model,$category->status)!!}</td>
                            <td>{!!status_btn($category->id,$model,$category->popular, ['row'=>'popular'])!!}</td>
                            <td>

                                <button data-bs-toggle="tooltip" data-bs-placement="top" data-route="{{route("gopanel.category.get.form" , $category)}}" class="btn btn-info edit-category btn-sm">
                                    <i class="fas fa-edit"></i>
                               </button>
                                {!!delete_btn($category->id,$model)!!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('gopanel.pages.category.partials.modals')
@endsection
@push('scripts')
<script src="{{ asset('admin/assets/modules/js/category.js?v='.time()) }}"></script>
@endpush
