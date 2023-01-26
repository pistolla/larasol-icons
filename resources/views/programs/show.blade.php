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
                                <h6 class="text-white text-capitalize ps-3">{{ isset($title) ? $title : 'Program' }}</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="container-fluid">
                                <form method="POST" action="{!! route('programs.program.destroy', $program->id) !!}" accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ route('programs.program.index') }}" class="btn btn-primary" title="Show All Program">
                                                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                                            </a>
                        
                                            <a href="{{ route('programs.program.create') }}" class="btn btn-success" title="Create New Program">
                                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                            </a>
                                            
                                            <a href="{{ route('programs.program.edit', $program->id ) }}" class="btn btn-primary" title="Edit Program">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                            </a>
                        
                                            <button type="submit" class="btn btn-danger" title="Delete Program" onclick="return confirm(&quot;Click Ok to delete Program.?&quot;)">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </form>
                                <dl class="dl-horizontal">
                                    <dt>Program Name</dt>
                                    <dd>{{ $program->program_name }}</dd>
                                    <dt>Season</dt>
                                    <dd>{{ $program->season }}</dd>
                                    <dt>Start Date</dt>
                                    <dd>{{ $program->season_start }}</dd>
                                    <dt>Season End</dt>
                                    <dd>{{ $program->season_end }}</dd>
                                    <dt>Farm Type Criteria</dt>
                                    <dd>{{ $program->farm_type_criteria }}</dd>
                                    <dt>Farm Produce Criteria</dt>
                                    <dd>{{ $program->farm_produce_criteria }}</dd>
                                    <dt>County Boundary Criteria</dt>
                                    <dd>{{ $program->county_boundary_criteria }}</dd>
                                    <dt>Ward Boundary Criteria</dt>
                                    <dd>{{ $program->ward_boundary_criteria }}</dd>
                                    <dt>Maximum Farmers</dt>
                                    <dd>{{ $program->maximum_farmers }}</dd>
                                    <dt>Disbursed Amount</dt>
                                    <dd>{{ $program->disbursed_amount }}</dd>
                                    <dt>Deposited Amount</dt>
                                    <dd>{{ $program->deposited_amount }}</dd>
                                    <dt>Status</dt>
                                    <dd>{{ $program->status }}</dd>
                                    <dt>Organization</dt>
                                    <dd>{{ $program->organization }}</dd>
                                    <dt>Organization Logo</dt>
                                    <dd>{{ asset('storage/' . $program->organization_logo) }}</dd>
                                    <dt>Bank Account</dt>
                                    <dd>{{ $program->bank_account }}</dd>
                        
                                </dl>
                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
