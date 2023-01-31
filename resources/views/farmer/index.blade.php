<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <div id="main">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        
        <div class="row">
            <div class="col l12 m12 s12">
                <div class="card card card-default scrollspy">
                    <div class="card-content">
                        <h4 class="card-title">Farmers</h4>
                        
                        <div class="row">
                            <div class="col s12">
                                <ul class="tabs">
                                    <li class="tab col m3"><a href="#tab_users_active" class="active" role="tab" data-toggle="tab">Registered Farmers</a></li>
                                    <li class="tab col m3"><a href="#tab_users_pending" role="tab" data-toggle="tab">Approve Farmers</a></li>
                                    <li class="tab col m3"><a href="#tab_users_inactive" role="tab" data-toggle="tab">Farmers</a></li>
                                </ul>

                                <div id="tab_users_active" class="row">
                                    <div class="col s12">
                                        {{-- <div class=" me-3 my-3 text-end">
                                            @can('farmer-create')
                                            <a id="btn_add_user" class="btn btn-primary my-1" href="{{ route('farmers.create') }}"><i class="fas fa-plus ">&nbsp; Register Farmer</i></a>
                                            <a id="btn_add_user" class="btn btn-primary my-1" href="/farmers/export-farmers-csv"><i class="fas fa-file ">&nbsp; Export Farmer</i></a>
                                            <a id="btn_add_user" class="btn btn-primary my-1" href="/farmers/export-farmers-csv"><i class="fas fa-print ">&nbsp; Export All Farmers</i></a>
                                            @endcan
                                        </div> --}}
                                        {{$dataTable->table()}}
                                    </div>
                                </div>

                                {{-- <div id="tab_users_pending" class="tab-pane ">
                                    <div class="container-fluid">
                                        @can('farmer-approve')
                                        <a id="btn_add_user_i" class="btn btn-primary my-1"><i class="fas fa-plus">&nbsp; Approve Farmers</i></a>
                                        @endcan
                                        <div class="table-responsive p-0">
                                            <table class="display">
                                                <thead>
                                                    <tr>
                                                        <th class="">
                                                            CHECK</th>
                                                        <th class="">
                                                            ID</th>
                                                        <th class=" ps-2">
                                                            NATIONAL ID NO.</th>
                                                        <th class="text-center ">
                                                            NAME</th>
                                                        <th class="text-center ">
                                                            GENDER</th>
                                                        <th class="text-center ">
                                                            DATE OF BIRTH</th>
                                                        <th class="text-center ">
                                                            PHONE</th>
                                                        <th class="text-center ">
                                                            COUNTY</th>
                                                        <th class="text-center ">
                                                            WARD</th>
                                                        <th class="text-center ">
                                                            VILLAGE</th>
                                                        <th class="text-center ">
                                                            STATUS</th>
                                                        <th class="text-center ">
                                                            FARM TYPE</th>
                                                        <th class="text-center ">
                                                            PRODUCES</th>
                                                        <th class="text-center ">
                                                            FARM HOUSE</th>
                                                        <th class="text-secondary opacity-7"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($farmers))
                                                        @foreach ($farmers as $farmer)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="checked" value="" />
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $farmer->id}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->national_id}}</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{$farmer->first_name}}&nbsp;{{$farmer->last_name}}</h6>
                                                                    <p class="text-xs text-secondary mb-0">{{$farmer->email}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->gender}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->dob}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->phone}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->county}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->ward}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->village}}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-success">{{$farmer->status}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->farm_type}}</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Show Farm Produce">
                                                                Show Farm produce
                                                            </a>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Show Farm house">
                                                            Show Farm House  
                                                            </a>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                                Edit
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>

                                <div id="tab_users_inactive" class="tab-pane ">
                                    <div class="container-fluid">
                                        <div class="table-responsive p-0">
                                            <table class="display">
                                                <thead>
                                                    <tr>
                                                        <th class="">
                                                            CHECK</th>
                                                        <th class="">
                                                            ID</th>
                                                        <th class=" ps-2">
                                                            NATIONAL ID NO.</th>
                                                        <th class="text-center ">
                                                            NAME</th>
                                                        <th class="text-center ">
                                                            GENDER</th>
                                                        <th class="text-center ">
                                                            DATE OF BIRTH</th>
                                                        <th class="text-center ">
                                                            PHONE</th>
                                                        <th class="text-center ">
                                                            COUNTY</th>
                                                        <th class="text-center ">
                                                            WARD</th>
                                                        <th class="text-center ">
                                                            VILLAGE</th>
                                                        <th class="text-center ">
                                                            STATUS</th>
                                                        <th class="text-center ">
                                                            FARM TYPE</th>
                                                        <th class="text-center ">
                                                            PRODUCES</th>
                                                        <th class="text-center ">
                                                            FARM HOUSE</th>
                                                        <th class="text-secondary opacity-7"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($farmers))
                                                        @foreach ($farmers as $farmer)
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" name="checked" value="" />
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{ $farmer->id}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->national_id}}</span>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex px-2 py-1">
                                                                <div class="d-flex flex-column justify-content-center">
                                                                    <h6 class="mb-0 text-sm">{{$farmer->first_name}}&nbsp;{{$farmer->last_name}}</h6>
                                                                    <p class="text-xs text-secondary mb-0">{{$farmer->email}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->gender}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->dob}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->phone}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->county}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->ward}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->village}}</span>
                                                        </td>
                                                        <td class="align-middle text-center text-sm">
                                                            <span class="badge badge-sm bg-gradient-success">{{$farmer->status}}</span>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <span class="text-secondary text-xs font-weight-bold">{{$farmer->farm_type}}</span>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Show Farm Produce">
                                                                Show Farm produce
                                                            </a>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Show Farm house">
                                                            Show Farm House  
                                                            </a>
                                                        </td>
                                                        <td class="align-middle">
                                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                                Edit
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div> --}}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footers.auth></x-footers.auth>
    {{-- <x-plugins></x-plugins> --}}

    @push('css')
        <link type="text/css" rel="stylesheet" href="{{asset('assets')}}/css/app.css" >
    @endpush

    @push('js')
        <script src="{{ asset('vendor') }}/datatables/buttons.server-side.js" type="text/javascript"></script>
        {{$dataTable->scripts()}}
    @endpush
</x-layout>