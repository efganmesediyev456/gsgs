@stack('styles')
{{-- Jquery ui  --}}
<link href="{{ asset('admin/assets/css/pages/jquery-ui.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
<!-- Bootstrap Css -->
<link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{asset('admin/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- Sweet Alert -->
<link href="{{ asset('admin/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
<!-- Icons Css -->
<link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
<!-- Bootstrap Toggle button -->
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('admin/plugins/lightbox2/css/lightbox.css')}}">
<link rel="stylesheet" href="{{asset('admin/assets/css/jquery.tagsinput.css')}}?v={{time()}}">
<!-- App Css-->
<link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
<link href="{{ asset('admin/assets/css/custom.css?v='.time()) }}" id="app-style" rel="stylesheet" type="text/css"/>
@stack('css_stack')
