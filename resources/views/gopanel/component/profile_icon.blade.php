<div class="dropdown d-inline-block">
    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <img class="rounded-circle header-profile-user" src="{{ get_image(auth('admin')->user()->image) }}"
            alt="Header Avatar">
        <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth('admin')->user()->name }}</span>
        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-end">
        <!-- item-->
{{--        <a class="dropdown-item" href="#"><i--}}
{{--                class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>--}}
{{--        <div class="dropdown-divider"></div>--}}
        <a class="dropdown-item text-danger" href="{{ route('gopanel.logout') }}"><i
                class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span
                key="t-logout">Logout</span></a>
    </div>
</div>
