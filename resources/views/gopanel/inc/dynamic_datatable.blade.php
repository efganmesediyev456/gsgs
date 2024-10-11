@push('styles')
    <!-- DataTables -->
    <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css"/>
    <link href="{{asset('admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{asset('admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
    rel="stylesheet" type="text/css"/>
    {{-- Datatable  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
<div class="table-responsive">
    <table id="{{ $__datatableId }}" class="table dt-responsive nowrap w-100"
           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    </table>
</div>
@push('scripts')
    <!-- Required datatable js -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>

@endpush
@push('js_stack')
    @php
        if (isset($__export)) {
            $__excel    = isset($__export['excel']) ? $__export['excel'] : '1,2,3,4';
            $__pdf      = isset($__export['pdf']) ? $__export['pdf'] : '1,2,3,4';
            $__print    = isset($__export['print']) ? $__export['print'] : '1,2,3,4';
        }
        else{
            $__excel    = '0,1,2,3,4,5,6,7,8,9,10';
            $__pdf      = '0,1,2,3,4,5,6,7,8,9,10';
            $__print    = '0,1,2,3,4,5,6,7,8,9,10';
        }
        $__sorted=false;
        if(isset($__cusomParam) && is_array($__cusomParam) and array_key_exists('sorted', $__cusomParam)){
            $__sorted=$__cusomParam['sorted'];
        }else{
            $__sorted=false;
        }
        if (isset($__cusomParam)) {
            $__cusomParam =  is_array($__cusomParam) ? $__cusomParam = http_build_query($__cusomParam, 'amp;amp;', '&') : $__cusomParam;
            $__cusomParam = str_replace("amp;","",$__cusomParam);
        } else {
            $__cusomParam = '';
        }
        $options = "[10, 25, 50, 100, 300,'-1'], ['10 Ədəd', '25 Ədəd', '50 Ədəd', '100 Ədəd', '300 Ədəd', 'Hamısı']";
        if (isset($__all_status_diasbled)) {
            $options = "[10, 25, 50, 100, 300], ['10 Ədəd', '25 Ədəd', '50 Ədəd', '100 Ədəd', '300 Ədəd']";
        }
        $imageable_type = isset($imageable_type) ? urlencode($imageable_type) : null;
        $imageable_id   = isset($imageable_id ) ? $imageable_id  : null;

    @endphp
    <script>
        @if($__sorted)
            rowReorderConfig = {
            "rowReorder": {
                selector: 'td:first-child',
                update: false
            }
        };
        @else
            rowReorderConfig = {
            "rowReorder": false
        };
        @endif
    </script>
    <script src="{{ asset('admin/assets/js/initDatatable.js?v='.time()) }}"></script>
    <script>

        var dTableRoute = '{{ route('gopanel.datatable.source', $__datatableName) }}?show_columns=ok';
        var dTableSourceRoute = "{{ route('gopanel.datatable.source', $__datatableName) . '?' . request()->getQueryString() . $__cusomParam }}";
        var __cusomParam = '{{$__cusomParam}}';
        var dTableElement = $("#{{ isset($__datatableId) ? $__datatableId : 'datatable' }}");
        var options = [{!!$options!!}];
        var imageable_type = '{{$imageable_type}}'
        var imageable_id   = '{{$imageable_id}}'
        var model   = '{{$__datatableName}}'
        $(document).ready(function() {
            getColumnsInitTable(dTableRoute,dTableSourceRoute, dTableElement, options);
        });
    </script>
@endpush
