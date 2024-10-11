<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>{{isset($seo) ? $seo->seo_title : ''}}</title>
    @include('site.inc.meta')
    <!-- Favicon -->
    @include('site.inc.favicon')
    <!-- WebFont.js -->
    @include('site.inc.head')
</head>
<body class="home">
<div class="page-wrapper">
    <h1 class="d-none">Cartridge</h1>
    <div id="progress-bar"></div>

    <!-- Start of Header -->
    @include('site.inc.header')
    <!-- End of Header -->
    <!-- Start of Main-->
    @yield('content')
    <!-- Start of Footer -->
   @include('site.inc.footer')
    <!-- End of Footer -->
{{--   @include('site.inc.more')--}}
<!-- Plugin JS File -->
    @include('site.inc.footer_js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('/assets/js/custom.js?v='.time()) }}"></script>

</body>
</html>
