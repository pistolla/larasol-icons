<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <div id="main">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Wards"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">{{ isset($title) ? $title : 'Wards' }}</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container-fluid">
                                <form method="POST" action="{!! route('wards.wards.destroy', $wards->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('wards.wards.index') }}" class="btn btn-primary" title="Show All Wards">
                                                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                                            </a>
                        
                                            <a href="{{ route('wards.wards.create') }}" class="btn btn-success" title="Create New Wards">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </a>
                                            
                                            <a href="{{ route('wards.wards.edit', $wards->id ) }}" class="btn btn-primary" title="Edit Wards">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true">Edit</span>
                                            </a>
                        
                                            <button type="submit" class="btn btn-danger" title="Delete Wards" onclick="return confirm(&quot;Click Ok to delete Wards.?&quot;)">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                            </button>
                                        </div>
                                    </form>
                                <dl class="dl-horizontal">
                                    <dt>Ward Name</dt>
                                    <dd>{{ $wards->ward_name }}</dd>
                                    <dt>County</dt>
                                    <dd>{{ $wards->county_id }}</dd>
                        
                                </dl>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>