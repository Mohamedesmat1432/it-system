<div>
    <x-page-content page-name="{{ __('site.companies') }}">

        @can('create-telephone')
            <livewire:telephone.create-telephone />
        @endcan
        @can('edit-telephone')
            <livewire:telephone.update-telephone />
        @endcan
        @can('delete-telephone')
            <livewire:telephone.delete-telephone />
        @endcan
        @can('bulk-delete-telephone')
            <livewire:telephone.bulk-delete-telephone />
        @endcan
        @can('import-telephone')
            <livewire:telephone.import-telephone />
        @endcan
        @can('export-telephone')
            <livewire:telephone.export-telephone />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.companies') }}
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
                            <x-create-button permission="create-telephone" />
                            <x-import-button permission="import-telephone" />
                            <x-export-button permission="export-telephone" />
                        </div>
                    </div>
                    @can('bulk-delete-telephone')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-telephone')
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
                        @forelse ($telephones as $telephone)
                            <tr wire:key="telephone-{{ $telephone->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-telephone')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $telephone->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $telephone->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $telephone->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-telephone" id="{{ $telephone->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-telephone" id="{{ $telephone->id }}"
                                            name="{{ $telephone->name }}" />
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

                @if ($telephones->hasPages())
                    <x-paginate :data-links="$telephones->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
