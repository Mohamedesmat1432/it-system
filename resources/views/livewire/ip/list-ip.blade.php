<div>
    <x-page-content page-name="{{ __('site.ips') }}">

        @can('create-ip')
            <livewire:ip.create-ip />
        @endcan
        @can('edit-ip')
            <livewire:ip.update-ip />
        @endcan
        @can('delete-ip')
            <livewire:ip.delete-ip />
        @endcan
        @can('bulk-delete-ip')
            <livewire:ip.bulk-delete-ip />
        @endcan
        @can('import-ip')
            <livewire:ip.import-ip />
        @endcan
        @can('export-ip')
            <livewire:ip.export-ip />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.ips') }}
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
                            <x-create-button permission="create-ip" />
                            <x-import-button permission="import-ip" />
                            <x-export-button permission="export-ip" />
                        </div>
                    </div>
                    @can('bulk-delete-ip')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-ip')
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
                                    <button wire:click="sortByField('number')">
                                        {{ __('site.number') }}
                                    </button>
                                    <x-sort-icon sort_field="number" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                        @forelse ($ips as $ip)
                            <tr wire:key="ip-{{ $ip->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-ip')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $ip->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $ip->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $ip->number }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-ip" id="{{ $ip->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-ip" id="{{ $ip->id }}"
                                            name="{{ $ip->number }}" />
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

                @if ($ips->hasPages())
                    <x-paginate :data-links="$ips->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
