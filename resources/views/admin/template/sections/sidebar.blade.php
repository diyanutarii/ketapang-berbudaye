<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div class="navbar-brand-box">
            <a href="{{ url('/') }}" class="logo">
                <x-logo width="150"></x-logo>
            </a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-home"></i>
                        <span>@lang('admin/template.sidebar.dashboard')</span>
                    </a>
                </li>

                <li class="menu-title">Master Data</li>

                <li>
                    <a href="{{ url('administrators') }}" class="waves-effect">
                        <i class="mdi mdi-account-details"></i>
                        <span>@lang('admin/template.sidebar.administrator')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('tangible-cultural-heritages') }}" class="waves-effect">
                        <i class="mdi mdi-bank-outline"></i>
                        <span>@lang('admin/template.sidebar.tangible-cultural-heritage')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('intangible-cultural-heritages') }}" class="waves-effect">
                        <i class="mdi mdi-shopping-music"></i>
                        <span>@lang('admin/template.sidebar.intangible-cultural-heritage')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('events') }}" class="waves-effect">
                        <i class="mdi mdi-auto-fix"></i>
                        <span>@lang('admin/template.sidebar.event')</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('libraries') }}" class="waves-effect">
                        <i class="mdi mdi-library-shelves"></i>
                        <span>@lang('admin/template.sidebar.reference')</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
