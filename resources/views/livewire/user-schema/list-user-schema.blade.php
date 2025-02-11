<div>
    <x-page-content page-name="{{ __('site.user_schemas') }}">

        @can('create-user-schema')
        <livewire:user-schema.create-user-schema />
        @endcan
        @can('edit-user-schema')
        <livewire:user-schema.update-user-schema />
        @endcan
        @can('delete-user-schema')
        <livewire:user-schema.delete-user-schema />
        @endcan
        @can('bulk-delete-user-schema')
        <livewire:user-schema.bulk-delete-user-schema />
        @endcan
        @can('import-user-schema')
        <livewire:user-schema.import-user-schema />
        @endcan
        @can('export-user-schema')
        <livewire:user-schema.export-user-schema />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.user_schemas') }}
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
                            <x-create-button permission="create-user-schema" />
                            <x-import-button permission="import-user-schema" />
                            <x-export-button permission="export-user-schema" />
                        </div>
                    </div>
                    @can('bulk-delete-user-schema')
                    <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-user-schema')
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
                                    <button wire:click="sortByField('user_id')">
                                        {{ __('site.user_id') }}
                                    </button>
                                    <x-sort-icon sort_field="user_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('floor')">
                                        {{ __('site.floor') }}
                                    </button>
                                    <x-sort-icon sort_field="floor" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('branch_id')">
                                        {{ __('site.branch_id') }}
                                    </button>
                                    <x-sort-icon sort_field="branch_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('rack_id')">
                                        {{ __('site.rack_id') }}
                                    </button>
                                    <x-sort-icon sort_field="rack_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('patch_id')">
                                        {{ __('site.patch_id') }}
                                    </button>
                                    <x-sort-icon sort_field="patch_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('subnet_id')">
                                        {{ __('site.subnet_id') }}
                                    </button>
                                    <x-sort-icon sort_field="subnet_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('ip_id')">
                                        {{ __('site.ip_id') }}
                                    </button>
                                    <x-sort-icon sort_field="ip_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('telephone_id')">
                                        {{ __('site.telephone_id') }}
                                    </button>
                                    <x-sort-icon sort_field="telephone_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('switch_id')">
                                        {{ __('site.switch_id') }}
                                    </button>
                                    <x-sort-icon sort_field="switch_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('notes')">
                                        {{ __('site.notes') }}
                                    </button>
                                    <x-sort-icon sort_field="notes" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                        @forelse ($user_schemas as $user_schema)
                        <tr wire:key="user_schema-{{ $user_schema->id }}" class="odd:bg-gray-100">
                            @can('bulk-delete-user-schema')
                            <td class="p-2 border">
                                <x-checkbox wire:model.live="checkbox_arr" value="{{ $user_schema->id }}" />
                            </td>
                            @endcan
                            <td class="p-2 border">
                                {{ $user_schema->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->user?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->floor }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->branch?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->rack?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->patch?->port }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->subnet?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->ip?->number }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->telephone?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->switch?->port }}
                            </td>
                            <td class="p-2 border">
                                {{ $user_schema->notes }}
                            </td>
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <x-edit-button permission="edit-user-schema" id="{{ $user_schema->id }}" />
                                    <div class="mx-1"></div>
                                    <x-delete-button permission="delete-user-schema" id="{{ $user_schema->id }}"
                                        name="{{ $user_schema->user?->name }}" />
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

                @if ($user_schemas->hasPages())
                <x-paginate :data-links="$user_schemas->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>