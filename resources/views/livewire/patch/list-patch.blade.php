<div>
    <x-page-content page-name="{{ __('site.patchs') }}">

        @can('create-patch')
            <livewire:patch.create-patch />
        @endcan
        @can('edit-patch')
            <livewire:patch.update-patch />
        @endcan
        @can('delete-patch')
            <livewire:patch.delete-patch />
        @endcan
        @can('bulk-delete-patch')
            <livewire:patch.bulk-delete-patch />
        @endcan
        @can('import-patch')
            <livewire:patch.import-patch />
        @endcan
        @can('export-patch')
            <livewire:patch.export-patch />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.patchs') }}
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
                            <x-create-button permission="create-patch" />
                            <x-import-button permission="import-patch" />
                            <x-export-button permission="export-patch" />
                        </div>
                    </div>
                    @can('bulk-delete-patch')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-patch')
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
                        @forelse ($patchs as $patch)
                            <tr wire:key="patch-{{ $patch->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-patch')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $patch->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $patch->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $patch->port }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-patch" id="{{ $patch->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-patch" id="{{ $patch->id }}"
                                            name="{{ $patch->port }}" />
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

                @if ($patchs->hasPages())
                    <x-paginate :data-links="$patchs->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
