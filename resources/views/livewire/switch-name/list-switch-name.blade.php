<div>
    <x-page-content page-name="{{ __('site.switch_names') }}">

        @can('create-switch-name')
        <livewire:switch-name.create-switch-name />
        @endcan
        @can('edit-switch-name')
        <livewire:switch-name.update-switch-name />
        @endcan
        @can('delete-switch-name')
        <livewire:switch-name.delete-switch-name />
        @endcan
        @can('bulk-delete-switch-name')
        <livewire:switch-name.bulk-delete-switch-name />
        @endcan
        @can('import-switch-name')
        <livewire:switch-name.import-switch-name />
        @endcan
        @can('export-switch-name')
        <livewire:switch-name.export-switch-name />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.switch_names') }}
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
                            <x-create-button permission="create-switch-name" />
                            <x-import-button permission="import-switch-name" />
                            <x-export-button permission="export-switch-name" />
                        </div>
                    </div>
                    @can('bulk-delete-switch-name')
                    <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-switch-name')
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
                                    <button wire:click="sortByField('ip')">
                                        {{ __('site.ip') }}
                                    </button>
                                    <x-sort-icon sort_field="ip" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('password')">
                                        {{ __('site.password') }}
                                    </button>
                                    <x-sort-icon sort_field="password" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('password_enable')">
                                        {{ __('site.password_enable') }}
                                    </button>
                                    <x-sort-icon sort_field="password_enable" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                        @forelse ($switch_names as $switch_name)
                        <tr wire:key="subnet-{{ $switch_name->id }}" class="odd:bg-gray-100">
                            @can('bulk-delete-switch-name')
                            <td class="p-2 border">
                                <x-checkbox wire:model.live="checkbox_arr" value="{{ $switch_name->id }}" />
                            </td>
                            @endcan
                            <td class="p-2 border">
                                {{ $switch_name->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $switch_name->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $switch_name->ip }}
                            </td>
                            <td class="p-2 border">
                                {{ $switch_name->password }}
                            </td>
                            <td class="p-2 border">
                                {{ $switch_name->password_enable }}
                            </td>
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <x-edit-button permission="edit-switch-name" id="{{ $switch_name->id }}" />
                                    <div class="mx-1"></div>
                                    <x-delete-button permission="delete-switch-name" id="{{ $switch_name->id }}"
                                        name="{{ $switch_name->name }}" />
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

                @if ($switch_names->hasPages())
                <x-paginate :data-links="$switch_names->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>