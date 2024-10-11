<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('admin/assets/images/logo.svg') }}" alt="" height="22">
                            </span>
                    <span class="logo-lg">
                                <img src="{{ asset('admin/assets/images/logo.svg') }}" alt="" height="45">
                            </span>
                </a>



                <a href="#" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('admin/assets/images/logo-light.svg') }}" alt=""
                                     height="22">
                            </span>
                    <span class="logo-lg">
                                <img width="200" style="object-fit: contain" src="{{ asset('admin/assets/images/cartridgeadmin.png') }}" alt="" height="45">
                            </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                    id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <!-- Customer Search-->
            {{-- <div class="app-search d-none d-lg-block ml-5" style="margin-left: 50px">
                <div class="position-relative">
                    <input type="text" class="form-control searchCustomer" data-search="customerResults" route="{{route('gopanel.customer.search')}}" placeholder="Müştəri xtar ...">
                    <span class="bx bx-search-alt"></span>
                </div>
                <div id="results-list " class="mt-1" style="position: absolute">
                    <div class="list-group list-group-item-success" id="customerResults">
                      </div>
                </div>
            </div> --}}


        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect"
                        id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                       aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

{{--            <div class="app-search d-none d-lg-block searchBlock">--}}
{{--                <div class="position-relative">--}}
{{--                    <input type="text" class="form-control search" data-search="driverResults" data-route="{{route('gopanel.process.user')}}" placeholder="Axtar ...">--}}
{{--                    <span class="bx bx-search-alt"></span>--}}
{{--                    <div class="search-list search-list-driver" style="display: none;">--}}
{{--                        <div class="search-list-body">--}}
{{--                            <ul id="searchDriverListBody">--}}
{{--                                <li>--}}
{{--                                    <div>--}}
{{--                                        <a href="" class="d-flex">--}}
{{--                                            <span style="position: relative" class="mdi mdi-loading rotate-anime"></span>--}}
{{--                                            <span style="position: relative">Axtarılır ....</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect"
                        data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>


            @include('gopanel.component.profile_icon')
        </div>
    </div>
</header>
