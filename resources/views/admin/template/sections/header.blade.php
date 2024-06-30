<header id="page-topbar">
    <div class="navbar-header">

        <div class="d-flex align-items-left">
            <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex align-items-center">
            <div class="dropdown d-inline-block">
                <x-admin-lang-button></x-admin-lang-button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset(empty(Auth::user()->photo) ? 'assets-admin/images/users/avatar-2.jpg' : Auth::user()->photo) }}">
                    <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="{{ url('profile') }}">
                        <span>@lang('admin/template.header.profile')</span>
                    </a>
                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                        href="{{ url('logout') }}">
                        <span>@lang('admin/template.header.logout')</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>
