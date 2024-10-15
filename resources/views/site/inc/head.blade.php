{{--<script>--}}
{{--    WebFontConfig = {--}}
{{--        google: { families: ['Poppins:400,500,600,700,800'] }--}}
{{--    };--}}
{{--    (function (d) {--}}
{{--        var wf = d.createElement('script'), s = d.scripts[0];--}}
{{--        wf.src = '/assets/js/webfont.js';--}}
{{--        wf.async = true;--}}
{{--        s.parentNode.insertBefore(wf, s);--}}
{{--    })(document);--}}
{{--</script>--}}

{{--<link rel="preload" href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">--}}
{{--<link rel="preload" href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">--}}
{{--<link rel="preload" href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}" as="font" type="font/woff2" crossorigin="anonymous">--}}
{{--<link rel="preload" href="{{ asset('assets/fonts/wolmart87d5.woff?png09e') }}" as="font" type="font/woff" crossorigin="anonymous">--}}

{{--<!-- Vendor CSS -->--}}
{{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">--}}

{{--<!-- Plugins CSS -->--}}
{{--<link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">--}}
{{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.min.css') }}">--}}
{{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}">--}}

{{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}


{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">--}}



{{--<meta name="description" content="{{ isset($seo) ? $seo->seo_desc : '' }}">--}}
{{--<meta name="keywords" content="{{ isset($seo) ? $seo->seo_keywords : '' }}">--}}
{{--<meta property="og:title" content="{{ isset($seo) ? $seo->seo_title : '' }}" />--}}
{{--<meta property="og:description" content="{{ isset($seo) ? $seo->seo_desc : '' }}" />--}}
{{--<meta property="og:type" content="website" />--}}
{{--<meta property="og:url" content="{{ request()->url() }}" />--}}
{{--<meta property="og:image" content="{{ isset($seo) ? url(get_image($seo->image)) : '' }}" />--}}
{{--<meta property="og:locale" content="{{ app()->getLocale().'_'.strtoupper(app()->getLocale()) }}" />--}}




{{--<!-- Default CSS -->--}}
{{--@if(Route::currentRouteName() === 'site.home')--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">--}}
{{--@else--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/photoswipe/photoswipe.min.css') }}">--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/photoswipe/default-skin/default-skin.min.css') }}">--}}
{{--    <!-- Swiper's CSS -->--}}
{{--    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">--}}

{{--    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.min.css') }}">--}}
{{--@endif--}}
{{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}?v={{time()}}">--}}




<link rel="stylesheet" href="{{asset('assets/css/main.css')}}?v={{time()}}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}?v={{time()}}">
<link rel="stylesheet" href="{{ asset('assets/css/frontend.css') }}?v={{time()}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

