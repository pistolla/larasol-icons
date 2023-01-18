<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Counties"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">{{ !empty($title) ? $title : 'Wards' }}</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container-fluid">
                                <div class="me-3 my-3 text-end" role="group">
                    
                                    <a href="{{ route('wards.wards.index') }}" class="btn btn-primary" title="Show All Wards">
                                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                                    </a>
                    
                                    <a href="{{ route('wards.wards.create') }}" class="btn btn-success" title="Create New Wards">
                                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    </a>
                    
                                </div>
                                @if ($errors->any())
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                    
                                <form method="POST" action="{{ route('wards.wards.update', $wards->id) }}" id="edit_wards_form" name="edit_wards_form" accept-charset="UTF-8" class="form-horizontal">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PUT">
                                @include ('wards.form', [
                                                            'wards' => $wards,
                                                          ])
                    
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <input class="btn btn-primary" type="submit" value="Update">
                                        </div>
                                    </div>
                                </form>
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
