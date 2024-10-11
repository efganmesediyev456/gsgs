<!-- JAVASCRIPT -->
<script src="{{ asset('admin/assets/libs/jquery/jquery.min.js') }}"></script>
{{-- Jquery ui  --}}
<script src="{{ asset('admin/assets/libs/jquery-ui-dist/jquery-ui.min.js') }}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
<script src="{{asset('admin/assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/node-waves/waves.min.js') }}"></script>
<!-- owl.carousel js -->
<script src="{{ asset('admin/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
<!-- auth-2-carousel init -->
<script src="{{ asset('admin/assets/js/pages/auth-2-carousel.init.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery.json-editor.min.js') }}"></script>

<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('admin/plugins/sweet-alert2/sweetalert2.min.js') }}"></script>
<!-- apexcharts -->
<script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<!-- dashboard init -->
<script src="{{ asset('admin/assets/js/pages/dashboard.init.js') }}"></script>

<script src="{{asset('admin/plugins/lightbox2/js/lightbox.js')}}"></script>
<!-- Bootstrap toggle js -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- App js -->
{{--tagify--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.31.3/tagify.min.js" integrity="sha512-YrKVSda1sKH9vnfrtO2Dzkv1CHmsnQsPTIBv9IDdu7bqiHAvmTf02zxHv3t+d2hcIWTgJHi+6X6Oy21MVyWNwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
<script src="{{asset('admin/assets/js/jquery.tagsinput.js')}}"></script>
<script src="{{asset('admin/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js?v='.time()) }}"></script>
<script src="{{ asset('admin/assets/js/custom.js?v='.time()) }}"></script>
@stack('scripts')
@stack('js_stack')
