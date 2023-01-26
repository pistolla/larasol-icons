<div class="row mb-4">
                <div class="col s12 m6 mb-2">
                    <div class="card animate fadeUp pb-4">
                        <div class="card-content" style="height: 32rem;">
                            <div class="row">
                                <div class="col l10 m10">
                                    <h6 class="card-title mb-0">Farmers per Status</h6>
                                    <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">{{$farmers_count}} farmers</span> registered
                                    </p>
                                </div>
                                <div class="col l2 m2">
                                    <a class="dropdown-trigger" id="dropdownTable" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-content"
                                        aria-labelledby="dropdownTable">
                                        <li><a  href="javascript:;">Download PNG</a>
                                        </li>
                                        <li><a  href="javascript:;">Download JPG</a></li>
                                        <li><a  href="javascript:;">Download SVG</a></li>
                                    </ul>
                                </div>
                            </div>
                        
                            <livewire:livewire-pie-chart
                                key="{{ $pieChartModel->reactiveKey() }}"
                                :pie-chart-model="$pieChartModel"
                            />
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 mb-2">
                    <div class="card animate fadeUp pb-4">
                        <div class="card-content" style="height: 32rem;">
                            <div class="row">
                                <div class="col l10 m10">
                                    <h6 class="card-title mb-0">No of Famers Per Farm Type</h6>
                                    <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">{{$farmers_count}} farmers</span> registered
                                    </p>
                                </div>
                                <div class="col l2 m2 ">
                                    <a class="dropdown-trigger" id="dropdownTable" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-content"
                                        aria-labelledby="dropdownTable">
                                        <li><a  href="javascript:;">Download PNG</a>
                                        </li>
                                        <li><a  href="javascript:;">Download JPG</a></li>
                                        <li><a  href="javascript:;">Download SVG</a></li>
                                    </ul>
                                </div>
                            </div>
                            <livewire:livewire-column-chart
                                key="{{ $columnChartModel->reactiveKey() }}"
                                :column-chart-model="$columnChartModel"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col s12 m6 mb-2">
                    <div class="card animate fadeUp pb-4">
                        <div class="card-content" style="height: 32rem;">
                            <div class="row">
                                <div class="col l10 m10">
                                    <h6 class="card-title mb-0">Farmers per county</h6>
                                    <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">{{$farmers_count}} farmers</span> registered
                                    </p>
                                </div>
                                <div class="col l2 m2 ">
                                    <a class="dropdown-trigger" id="dropdownTable" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-content"
                                        aria-labelledby="dropdownTable">
                                        <li><a  href="javascript:;">Download PNG</a>
                                        </li>
                                        <li><a  href="javascript:;">Download JPG</a></li>
                                        <li><a  href="javascript:;">Download SVG</a></li>
                                    </ul>
                                </div>
                            </div>
                        
                            <livewire:livewire-column-chart
                                key="{{ $columnCountyChartModel->reactiveKey() }}"
                                :column-chart-model="$columnCountyChartModel"
                            />
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 mb-2">
                    <div class="card animate fadeUp pb-4">
                        <div class="card-content" style="height: 32rem;">
                            <div class="row">
                                <div class="col l10 m10">
                                    <h6 class="card-title mb-0">No of Youth Farmers per county</h6>
                                    <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">{{$farmers_count}} farmers</span> registered
                                    </p>
                                </div>
                                <div class="col l2 m2 ">
                                    <a class="dropdown-trigger" id="dropdownTable" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-content"
                                        aria-labelledby="dropdownTable">
                                        <li><a  href="javascript:;">Download PNG</a>
                                        </li>
                                        <li><a  href="javascript:;">Download JPG</a></li>
                                        <li><a  href="javascript:;">Download SVG</a></li>
                                    </ul>
                                </div>
                            </div>
                        
                            <livewire:livewire-pie-chart
                                key="{{ $pieChartYouthModel->reactiveKey() }}"
                                :pie-chart-model="$pieChartYouthModel"
                            />
                        </div>
                    </div>
                </div>
            </div>
