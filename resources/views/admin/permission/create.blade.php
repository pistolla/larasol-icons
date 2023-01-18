<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Permissions') }}
    </x-slot>
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create Permissions</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="container-fluid">
    
                        <x-admin.breadcrumb href="{{route('permission.index')}}" title="{{ __('Create permission') }}">{{ __('<< Back to all permissions') }}</x-admin.breadcrumb>
                        <x-admin.form.errors />
                        <div>

                            <form method="POST" action="{{ route('permission.store') }}">
                            @csrf

                                <div class="py-2">
                                    <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

                                    <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                                        type="text"
                                                        name="name"
                                                        value="{{ old('name') }}"
                                                        />
                                </div>

                                <div class="flex justify-end mt-4">
                                    <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.wrapper>