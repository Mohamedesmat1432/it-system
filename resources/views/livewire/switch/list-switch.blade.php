<div>
    <x-page-content page-name="{{ __('site.switchs') }}">

        @can('create-switch')
            <livewire:switch.create-switch />
        @endcan
        @can('edit-switch')
            <livewire:switch.update-switch />
        @endcan
        @can('delete-switch')
            <livewire:switch.delete-switch />
        @endcan
        @can('bulk-delete-switch')
            <livewire:switch.bulk-delete-switch />
        @endcan
        @can('import-switch')
            <livewire:switch.import-switch />
        @endcan
        @can('export-switch')
            <livewire:switch.export-switch />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.switchs') }}
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
                            <x-create-button permission="create-switch" />
                            <x-import-button permission="import-switch" />
                            <x-export-button permission="export-switch" />
                        </div>
                    </div>
                    @can('bulk-delete-switch')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-switch')
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
                                    <button wire:click="sortByField('port')">
                                        {{ __('site.port') }}
                                    </button>
                                    <x-sort-icon sort_field="port" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                        @forelse ($switchs as $switch)
                            <tr wire:key="switch-{{ $switch->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-switch')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $switch->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $switch->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $switch->name }}
                                </td>
                                <td class="p-2 border">
                                    {{ $switch->port }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-switch" id="{{ $switch->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-switch" id="{{ $switch->id }}"
                                            name="{{ $switch->name }}" />
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

                @if ($switchs->hasPages())
                    <x-paginate :data-links="$switchs->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
