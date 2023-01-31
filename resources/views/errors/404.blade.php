<x-layout bodyClass="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column  bg-full-screen-image blank-page blank-page">
    <!-- Navbar -->
    <x-navbars.navs.guest signin='login' signup='register'></x-navbars.navs.guest>
    <!-- End Navbar -->
    <div class="row">
      <div class="col s12">
        <div class="container"><div class="section section-404 p-0 m-0 height-100vh">
            <div class="row">
                <!-- 404 -->
                <div class="col s12 center-align white">
                    <img src="{{asset('assets')}}/img/error-2.png" class="bg-image-404" alt="">
                    <h1 class="error-code m-0">404</h1>
                    <h6 class="mb-2">Page not found</h6>
                    <a class="btn waves-effect waves-light gradient-45deg-deep-purple-blue gradient-shadow mb-4" href="{{ route('dashboard') }}">Back
                    TO Home</a>
                </div>
            </div>
        </div>
    </div>
    <x-footers.guest></x-footers.guest>
</x-layout>