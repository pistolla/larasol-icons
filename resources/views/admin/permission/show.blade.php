<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Permissions') }}
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Permission</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container-fluid">
                        <x-admin.breadcrumb href="{{route('permission.index')}}" title="{{ __('View permission') }}">{{ __('<< Back to all permissions') }}</x-admin.breadcrumb> 
    
    
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    <tr>
                                        <td>{{ __('Name') }}</td>
                                        <td>{{$permission->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Created') }}</td>
                                        <td>{{$permission->created_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.wrapper>
