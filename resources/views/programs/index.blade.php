<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <div id="main">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Produces"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Programs</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="me-3 my-3 text-end" role="group">
                                <a href="{{ route('programs.program.create') }}" class="btn btn-success" title="Create New Program">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
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
                            @if(count($programs) == 0)
                                <div class="container-fluid text-center">
                                    <h4>No Programs Available.</h4>
                                </div>
                            @else
                            <div class="container-fluid">
                                <div class="table-responsive">
                    
                                    <table class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Program Name</th>
                                                <th>Season</th>
                                                <th>Start Date</th>
                                                <th>Season End</th>
                                                <th>Farm Type Criteria</th>
                                                <th>Farm Produce Criteria</th>
                                                <th>County Boundary Criteria</th>
                                                <th>Ward Boundary Criteria</th>
                                                <th>Maximum Farmers</th>
                                                <th>Disbursed Amount</th>
                                                <th>Deposited Amount</th>
                                                <th>Status</th>
                                                <th>Organization</th>
                                                <th>Organization Logo</th>
                                                <th>Bank Account</th>
                    
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($programs as $program)
                                            <tr>
                                                <td>{{ $program->program_name }}</td>
                                                <td>{{ $program->season }}</td>
                                                <td>{{ $program->season_start }}</td>
                                                <td>{{ $program->season_end }}</td>
                                                <td>{{ $program->farm_type_criteria }}</td>
                                                <td>{{ $program->farm_produce_criteria }}</td>
                                                <td>{{ $program->county_boundary_criteria }}</td>
                                                <td>{{ $program->ward_boundary_criteria }}</td>
                                                <td>{{ $program->maximum_farmers }}</td>
                                                <td>{{ $program->disbursed_amount }}</td>
                                                <td>{{ $program->deposited_amount }}</td>
                                                <td>{{ $program->status }}</td>
                                                <td>{{ $program->organization }}</td>
                                                <td>{{ $program->organization_logo }}</td>
                                                <td>{{ $program->bank_account }}</td>
                    
                                                <td>
                    
                                                    <form method="POST" action="{!! route('programs.program.destroy', $program->id) !!}" accept-charset="UTF-8">
                                                    <input name="_method" value="DELETE" type="hidden">
                                                    {{ csrf_field() }}
                    
                                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                                            <a href="{{ route('programs.program.show', $program->id ) }}" class="btn btn-info" title="Show Program">
                                                                <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                                            </a>
                                                            <a href="{{ route('programs.program.edit', $program->id ) }}" class="btn btn-primary" title="Edit Program">
                                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                                            </a>
                    
                                                            <button type="submit" class="btn btn-danger" title="Delete Program" onclick="return confirm(&quot;Click Ok to delete Program.&quot;)">
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
                                {!! $programs->render() !!}
                            </div>
                            
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>