<div>
    <x-page-content page-name="{{ __('site.subnets') }}">

        @can('create-subnet')
            <livewire:subnet.create-subnet />
        @endcan
        @can('edit-subnet')
            <livewire:subnet.update-subnet />
        @endcan
        @can('delete-subnet')
            <livewire:subnet.delete-subnet />
        @endcan
        @can('bulk-delete-subnet')
            <livewire:subnet.bulk-delete-subnet />
        @endcan
        @can('import-subnet')
            <livewire:subnet.import-subnet />
        @endcan
        @can('export-subnet')
            <livewire:subnet.export-subnet />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.subnets') }}
                </h1>
            </div>

            <div class="mt-6 text-gray-500 leading-relaxed">
                <div class="mt-3">
                    <div class="md:flex justify-between">
                        <div class="mb-2">
                            <x-input type="search" wire:model.live.debounce.500ms="search"
                                placeholder="{{ __('site.search') }}..." />
                        </div>
                        <div class="mb-2 grid grid-cols-3 md:grid-cols-3 gap-4">
                            <x-create-button permission="create-subnet" />
                            <x-import-button permission="import-subnet" />
                            <x-export-button permission="export-subnet" />
                        </div>
                    </div>
                    @can('bulk-delete-subnet')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-subnet')
                                <td class="px-4 py-2 border">
                                    <div class="text-center">
                                        <x-checkbox wire:click="checkboxAll" wire:model.live="checkbox_status" />
                                    </div>
                                </td>
                            @endcan
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('id')">
                                        {{ __('site.id') }}
                                    </button>
                                    <x-sort-icon sort_field="id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('name')">
                                        {{ __('site.name') }}
                                    </button>
                                    <x-sort-icon sort_field="name" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    {{ __('site.action') }}
                                </div>
                            </td>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @forelse ($subnets as $subnet)
                            <tr wire:key="subnet-{{ $subnet->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-subnet')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $subnet->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $subnet->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $subnet->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-subnet" id="{{ $subnet->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-subnet" id="{{ $subnet->id }}"
                                            name="{{ $subnet->name }}" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="p-2 border text-center">
                                    {{ __('site.no_data_found') }}
                                </td>
                            </tr>
                        @endforelse
                    </x-slot>
                </x-table>

                @if ($subnets->hasPages())
                    <x-paginate :data-links="$subnets->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
