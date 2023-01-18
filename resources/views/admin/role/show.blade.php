<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Roles') }}
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Roles</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container-fluid">
                        <x-admin.breadcrumb href="{{route('role.index')}}" title="{{ __('View role') }}">{{ __('<< Back to all roles') }}</x-admin.breadcrumb> 
    
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <tbody>
                                    <tr>
                                        <td>{{ __('Name') }}</td>
                                        <td>{{$role->name}}</td>
                                    </tr>
                                    <tr>
                                    @unless ($role->name == env('APP_SUPER_ADMIN', 'super-admin'))
                                    <td>{{ __('Permissions') }}</td>
                                        <td>

                                        <div class="py-2">
                                            <div class="grid grid-cols-4 gap-4">
                                                @forelse ($permissions as $permission)
                                                    <div class="col-span-4 sm:col-span-2 md:col-span-2">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ in_array($permission->id, $roleHasPermissions) ? 'checked' : '' }} disabled="disabled" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                @empty
                                                    ----
                                                @endforelse
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    @endunless
                                    <tr>
                                        <td>{{ __('Created') }}</td>
                                        <td>{{$role->created_at}}</td>
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

