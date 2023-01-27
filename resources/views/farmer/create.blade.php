<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Farmers') }}
    </x-slot>
    <div class="row">
        <div class="col s12">
            <livewire:farmer-form />
        </div>
    </div>
</x-admin.wrapper>