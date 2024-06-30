<button type="button" class="btn header-item waves-effect" data-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    @if (App::isLocale('en'))
        <img src="{{ asset('assets-admin/images/flags/us.jpg') }}" alt="Header Language" height="16">
        <span class="d-none d-sm-inline-block ml-1">English</span>
    @else
        <img src="{{ asset('assets-admin/images/flags/indo.jpg') }}" alt="Header Language" height="16">
        <span class="d-none d-sm-inline-block ml-1">Indonesian</span>
    @endif
    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
</button>
<div class="dropdown-menu dropdown-menu-right">
    <!-- item-->
    @if (App::isLocale('id'))
        <a href="{{ url('locale/en') }}" class="dropdown-item notify-item">
            <img src="{{ asset('assets-admin/images/flags/us.jpg') }}" class="mr-1" height="12">
            <span class="align-middle">English</span>
        </a>
    @else
        <a href="{{ url('locale/id') }}" class="dropdown-item notify-item">
            <img src="{{ asset('assets-admin/images/flags/indo.jpg') }}" class="mr-1" height="12">
            <span class="align-middle">Indonesian</span>
        </a>
    @endif
</div>
