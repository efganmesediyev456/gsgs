<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{ isset($seo) ? $seo->seo_title : '' }}</title>
    @include('site.inc.meta')
    @include('site.inc.head')
</head>

<body class="about-us">
<div class="page-wrapper">
    <!-- Start of Header -->
    @include('site.inc.header')
    @yield('content')
    @include('site.inc.footer')
</div>

@include('site.inc.more')
<!-- End of Mobile Menu -->

<!-- Plugin JS File -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/sticky/sticky.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/vendor/zoom/jquery.zoom.js') }}"></script>
<script src="{{ asset('assets/vendor/photoswipe/photoswipe.js') }}"></script>
<script src="{{ asset('assets/vendor/photoswipe/photoswipe-ui-default.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.count-to/jquery.count-to.min.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/main.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
