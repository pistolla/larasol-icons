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
                        <div class=" me-3 my-3 text-end">
                                @can('role create')
                                    <x-admin.add-link href="{{ route('role.create') }}">
                                        {{ __('Add Role') }}
                                    </x-admin.add-link>
                                    <x-admin.add-link href="{{ route('user.index') }}">
                                        {{ __('Assign Role') }}
                                    </x-admin.add-link>
                                @endcan
                                <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i
                                    class="material-icons text-sm">print</i>&nbsp;&nbsp;Export</a>
                                <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i
                                    class="material-icons text-sm">print</i>&nbsp;&nbsp;Export All</a>
                            </div>
                            <div class="table-responsive p-0">
                                <x-admin.grid.search action="{{ route('role.index') }}" />
                                <x-admin.grid.table>
                                    <x-slot name="head">
                                        <tr>
                                            <x-admin.grid.th>
                                                @include('admin.includes.sort-link', ['label' => 'Name', 'attribute' => 'name'])
                                            </x-admin.grid.th>
                                            @canany(['role edit', 'role delete'])
                                            <x-admin.grid.th>
                                                {{ __('Actions') }}
                                            </x-admin.grid.th>
                                            @endcanany
                                        </tr>
                                    </x-slot>
                                    <x-slot name="body">
                                    @foreach($roles as $role)
                                        <tr>
                                            <x-admin.grid.td>
                                                <div class="text-sm text-gray-900">
                                                    <a href="{{route('role.show', $role->id)}}" class="no-underline hover:underline text-cyan-600">{{ $role->name }}</a>
                                                </div>
                                            </x-admin.grid.td>
                                            @canany(['role edit', 'role delete'])
                                            <x-admin.grid.td>
                                                <form action="{{ route('role.destroy', $role->id) }}" method="POST">
                                                    <div class="flex">
                                                        @can('role edit')
                                                        <a href="{{route('role.edit', $role->id)}}" class="text-secondary font-weight-bold text-xs">
                                                            {{ __('Edit') }}
                                                        </a>
                                                        @endcan

                                                        @can('role delete')
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="text-danger font-weight-bold text-xs" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                                            {{ __('Delete') }}
                                                        </button>
                                                        @endcan
                                                    </div>
                                                </form>
                                            </x-admin.grid.td>
                                            @endcanany
                                        </tr>
                                        @endforeach
                                        @if($roles->isEmpty())
                                            <tr>
                                                <td colspan="2">
                                                    <div class="flex flex-col justify-center items-center py-4 text-lg">
                                                        {{ __('No Result Found') }}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    </x-slot>
                                </x-admin.grid.table>
                            </div>
                        <div class="py-8">
                            {{ $roles->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.wrapper>
