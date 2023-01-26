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
        <li class="bold">
                <a class="collapsible-header waves-effect waves-cyan {{ $activePage == 'dashboard' ? ' active ' : '' }} "
                    href="{{ route('dashboard') }}">
                    
                        <i class="material-icons opacity-10">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan {{ $activePage == 'farmers' ? ' active ' : '' }} "
                href="{{ route('farmers.index') }}">
                
                    <i class="material-icons opacity-10">table_view</i>
                <span>Farmers</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan {{ $activePage == 'evoucher' ? ' active ' : '' }}  "
                href="{{ route('evoucher') }}">
                
                    <i class="material-icons opacity-10">receipt_long</i>
                <span>Evoucher</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan {{ $activePage == 'evoucher' ? ' active ' : '' }} "
                href="{{ route('evoucher') }}">
                
                    <i class="material-icons opacity-10">people</i>
                <span>User Management</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan {{ $activePage == 'role.index' ? 'active ' : '' }} "
                href="{{ route('role.index') }}">
                
                    <i class="material-icons opacity-10">key</i>
                <span>User Roles</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan {{ $activePage == 'permission.index' ? 'active ' : '' }} "
                href="{{ route('permission.index') }}">
                
                    <i class="material-icons opacity-10">lock</i>
                <span>User Permissions</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan {{ $activePage == 'generator_tables.generator_table.index' ? ' active ' : '' }}  "
                href="{{ route('generator_tables.generator_table.index') }}">
                
                    <i class="material-icons opacity-10">settings</i>
                <span>Setup</span>
            </a>
        </li>
        <li class="bold">
            <a class="collapsible-header waves-effect waves-cyan {{ $activePage == 'profile' ? ' active ' : '' }}  "
                href="{{ route('profile') }}">
                
                    <i class="material-icons opacity-10">person</i>
                <span>Profile</span>
            </a>
        </li>
    </ul>
    
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>

</aside>
