@props(['activePage'])

<aside
    class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square"
    id="sidenav-main">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="index.html">
                <img src="{{ asset('assets') }}/img/logo-ct.png" alt="materialize logo"/>
                <span class="logo-text hide-on-med-and-down">LARASOL</span>
            </a>
            <a class="navbar-toggler" href="#"><i class="material-icons">chevron_left</i></a></h1>
    </div>
    
    <hr class="horizontal light mt-0 mb-2">
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow">
        <li class="bold mb-4">
                <a class="collapsible-header waves-effect waves-cyan display-flex {{ $activePage == 'dashboard' ? '  ' : '' }} "
                    href="{{ route('dashboard') }}">
                    <img src="{{ asset('vendor/blade-larasol-icons/graphs.svg') }}" width="40" height="40"/>
                        {{-- <i class="material-icons opacity-10 deep-orange-text text-darken-4">dashboard</i> --}}
                    <span>Dashboard</span>
                </a>
            </li>
        <li class="bold mb-4">
            <a class="collapsible-header waves-effect waves-cyan display-flex {{ $activePage == 'farmers' ? ' active ' : 'active' }} "
                href="{{ route('farmers.index') }}">
                <img src="{{ asset('vendor/blade-larasol-icons/delivery.svg') }}" width="40" height="40"/>
                    {{-- <i class="material-icons opacity-10 yellow-text text-darken-4">table_view</i> --}}
                <span>Farmers</span>
            </a>
        </li>
        <li class="bold mb-4">
            <a class="collapsible-header waves-effect waves-cyan display-flex {{ $activePage == 'evoucher' ? ' active ' : '' }}  "
                href="{{ route('evoucher') }}">
                <img src="{{ asset('vendor/blade-larasol-icons/cash.svg') }}" width="40" height="40"/>
                    {{-- <i class="material-icons opacity-10 red-text text-darken-4">receipt_long</i> --}}
                <span>Evoucher</span>
            </a>
        </li>
        <li class="bold mb-4">
            <a class="collapsible-header waves-effect waves-cyan display-flex {{ $activePage == 'evoucher' ? ' active ' : '' }} "
                href="{{ route('evoucher') }}">
                <img src="{{ asset('vendor/blade-larasol-icons/calculator.svg') }}" width="40" height="40"/>
                    {{-- <i class="material-icons opacity-10 purple-text text-darken-4">people</i> --}}
                <span>User Management</span>
            </a>
        </li>
        <li class="bold mb-4">
            <a class="collapsible-header waves-effect waves-cyan display-flex {{ $activePage == 'role.index' ? 'active ' : '' }} "
                href="{{ route('role.index') }}">
                <img src="{{ asset('vendor/blade-larasol-icons/safe.svg') }}" width="40" height="40"/>
                    {{-- <i class="material-icons opacity-10 teal-text text-darken-4">key</i> --}}
                <span>User Roles</span>
            </a>
        </li>
        <li class="bold mb-4">
            <a class="collapsible-header waves-effect waves-cyan display-flex {{ $activePage == 'permission.index' ? 'active ' : '' }} "
                href="{{ route('permission.index') }}">
                <img src="{{ asset('vendor/blade-larasol-icons/website-lock.svg') }}" width="40" height="40"/>
                    {{-- <i class="material-icons opacity-10 green-text text-darken-4">lock</i> --}}
                <span>User Permissions</span>
            </a>
        </li>
        <li class="bold mb-4">
            <a class="collapsible-header waves-effect waves-cyan display-flex {{ $activePage == 'generator_tables.generator_table.index' ? ' active ' : '' }}  "
                href="{{ route('generator_tables.generator_table.index') }}">
                <img src="{{ asset('vendor/blade-larasol-icons/stopwatch.svg') }}" width="40" height="40"/>
                    {{-- <i class="material-icons opacity-10 blue-text text-darken-4">settings</i> --}}
                <span>Setup</span>
            </a>
        </li>
        <li class="bold mb-4">
            <a class="collapsible-header waves-effect waves-cyan display-flex {{ $activePage == 'profile' ? ' active ' : '' }}  "
                href="{{ route('profile') }}">
                <img src="{{ asset('vendor/blade-larasol-icons/light-bulb.svg') }}" width="40" height="40"/>
                    {{-- <i class="material-icons opacity-10 blue-grey-text text-darken-4">person</i> --}}
                <span>Profile</span>
            </a>
        </li>
    </ul>
    
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>

</aside>
