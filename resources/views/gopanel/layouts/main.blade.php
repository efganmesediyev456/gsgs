<!doctype html>
<html lang="en">
<head>
    @include('gopanel.blocks.head')
</head>
<body data-sidebar="dark" data-layout-mode="light">

<div id="layout-wrapper">
    @include('gopanel.blocks.header')
    @include('gopanel.blocks.left_sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @if (View::hasSection('heading_buttons') && View::hasSection('heading_title'))
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">@yield('heading_title')</h4>
                            <ol class="breadcrumb">
                                @yield('heading_breadcrumbs')
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right">
                                @yield('heading_buttons')
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @yield('content')
            </div>
        </div>
        @include('gopanel.blocks.footer')
    </div>
</div>
<div class="rightbar-overlay"></div>
@include('gopanel.inc.scripts')
</body>
</html>
