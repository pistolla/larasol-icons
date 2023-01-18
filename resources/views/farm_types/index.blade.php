<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Farming Type"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Farm Types</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="me-3 my-3 text-end" role="group">
                                <a href="{{ route('farm_types.farm_types.create') }}" class="btn btn-success" title="Create New Farm Types">
                                    <i class="fas fa-plus ">&nbsp; Add Farm Type</i>
                                </a>
                            </div>
                            @if(Session::has('success_message'))
                                <div class="alert alert-success">
                                    <span class="glyphicon glyphicon-ok"></span>
                                    {!! session('success_message') !!}
                        
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                        
                                </div>
                            @endif
                            @if(count($farmTypesObjects) == 0)
                                <div class="container-fluid text-center">
                                    <h4>No Farm Types Available.</h4>
                                </div>
                            @else
                            <div class="container-fluid">
                                <div class="table-responsive">
                    
                                    <table class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Farm Type Name</th>
                    
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($farmTypesObjects as $farmTypes)
                                            <tr>
                                                <td>{{ $farmTypes->id }}</td>
                                                <td>{{ $farmTypes->farm_type_name }}</td>
                    
                                                <td>
                    
                                                    <form method="POST" action="{!! route('farm_types.farm_types.destroy', $farmTypes->id) !!}" accept-charset="UTF-8">
                                                    <input name="_method" value="DELETE" type="hidden">
                                                    {{ csrf_field() }}
                    
                                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                                            <a href="{{ route('farm_types.farm_types.show', $farmTypes->id ) }}" class="btn btn-info" title="Show Farm Types">
                                                                <i class="glyphicon glyphicon-open" aria-hidden="true">Show</i>
                                                            </a>
                                                            <a href="{{ route('farm_types.farm_types.edit', $farmTypes->id ) }}" class="btn btn-primary" title="Edit Farm Types">
                                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                                            </a>
                    
                                                            <button type="submit" class="btn btn-danger" title="Delete Farm Types" onclick="return confirm(&quot;Click Ok to delete Farm Types.&quot;)">
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                                            </button>
                                                        </div>
                    
                                                    </form>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                    
                                </div>
                            </div>
                    
                            <div class="card-footer">
                                {!! $farmTypesObjects->render() !!}
                            </div>
                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-layout>
