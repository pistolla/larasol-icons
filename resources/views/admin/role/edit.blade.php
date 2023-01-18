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
                        <x-admin.breadcrumb href="{{route('role.index')}}" title="{{ __('Update role') }}">{{ __('<< Back to all roles') }}</x-admin.breadcrumb>
                        <x-admin.form.errors />
    
                        <div>

                            <form method="POST" action="{{ route('role.update', $role->id) }}">
                            @csrf
                            @method('PUT')

                                <div class="py-2">
                                <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

                                <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                                    type="text"
                                                    name="name"
                                                    value="{{ old('name', $role->name) }}"
                                                    />
                                </div>

                                @unless ($role->name == env('APP_SUPER_ADMIN', 'super-admin'))
                                <div class="py-2">
                                    <h3 class="inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight py-4 block sm:inline-block flex">Permissions</h3>
                                    <div class="grid grid-cols-4 gap-4">
                                        @forelse ($permissions as $permission)
                                            <div class="col-span-4 sm:col-span-2 md:col-span-1">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ in_array($permission->id, $roleHasPermissions) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @empty
                                            ----
                                        @endforelse
                                    </div>
                                </div>
                                @endunless

                                <div class="flex justify-end mt-4">
                                    <x-admin.form.button>{{ __('Update') }}</x-admin.form.button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.wrapper>
