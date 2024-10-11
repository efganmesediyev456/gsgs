<!doctype html>
<html lang="az">

<head>

    <meta charset="utf-8" />
    <title>Daxil ol | Spectr X</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Proweb Creative Agency" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}">

    <!-- owl.carousel css -->
    <link rel="stlesheet" href="{{ asset('admin/assets/libs/owl.carousel/assets/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/libs/owl.carousel/assets/owl.theme.default.min.css') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Sweet Alert -->
    <link href="{{ asset('admin/plugins/sweet-alert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/custom.css?v='.time()) }}" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body class="auth-body-bg">

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-9">
                    <div class="auth-full-bg pt-lg-5 p-4">
                        <div class="w-100">
                            <div class="bg-overlay"></div>
                            <div class="d-flex h-100 flex-column">

                                <div class="p-4 mt-auto">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-7">
                                            {{--  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="mb-4 mb-md-5 logo-login">
                                    <a href="/admin/login" class="d-block auth-logo">
                                        <img src="{{ asset('admin/assets/images/cartridgeadmin.png') }}" alt="" height="18" class="auth-logo-dark">
                                        <img src="{{ asset('admin/assets/images/cartridgeadmin.png') }}" alt="" height="18" class="auth-logo-light">
                                    </a>
                                    {{-- <img src="{{ asset('admin/assets/images/ikon.png') }}" alt="" height="18" class="auth-logo-light"> --}}
                                </div>
                                <div class="my-auto">
                                    <div>
                                        <h5 class="text-primary">Salam!</h5>
                                        <p class="text-muted">Davam etmək üçün daxil olun.</p>
                                    </div>

                                    <div class="mt-4">
                                        <form action="{{ route('gopanel.auth.login') }}" id="loginForm"
                                            method="POST">
                                             @csrf
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                                                @error('email')
                                                <div>
                                                    <span>{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Şifrə</label>
                                                <div class="input-group auth-pass-inputgroup">
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Enter password" aria-label="Password"
                                                        aria-describedby="password-addon">
                                                    <button class="btn btn-light " type="button" id="password-addon"><i
                                                            class="mdi mdi-eye-outline"></i></button>
                                                </div>
                                                @error('password')
                                                <div>
                                                    <span>{{ $message }}</span>
                                                </div>
                                                @enderror
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" name="remember_me" type="checkbox"
                                                    id="remember-check">
                                                <label class="form-check-label" for="remember-check">
                                                    Məni xatırla.
                                                </label>
                                            </div>

                                            <div class="mt-3 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light" type="submit">Daxil ol</button>
                                            </div>

                                            @error('email_or_password_incorrect')
                                            <div>
                                                <span>{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </form>
                                    </div>
                                </div>

                                <div class="mt-4 mt-md-5 text-center">
                                    <p class="mb-0">© 2023 ProWeb. Crafted with <i class="mdi mdi-heart text-danger"></i> by <a href="https://proweb.az/" target="_blank">proweb.az</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

    @include('gopanel.inc.scripts')
</body>


</html>
