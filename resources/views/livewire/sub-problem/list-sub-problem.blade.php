<div>
    <x-page-content page-name="{{ __('site.sub_problems') }}">

        @can('create-sub-problem')
            <livewire:sub-problem.create-sub-problem />
        @endcan
        @can('edit-sub-problem')
            <livewire:sub-problem.update-sub-problem />
        @endcan
        @can('delete-sub-problem')
            <livewire:sub-problem.delete-sub-problem />
        @endcan
        @can('bulk-delete-sub-problem')
            <livewire:sub-problem.bulk-delete-sub-problem />
        @endcan
        @can('import-sub-problem')
            <livewire:sub-problem.import-sub-problem />
        @endcan
        @can('export-sub-problem')
            <livewire:sub-problem.export-sub-problem />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.sub_problems') }}
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
                            <x-create-button permission="create-sub-problem" />
                            <x-import-button permission="import-sub-problem" />
                            <x-export-button permission="export-sub-problem" />
                        </div>
                    </div>
                    @can('bulk-delete-sub-problem')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-sub-problem')
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
                                    <button wire:click="sortByField('problem_id')">
                                        {{ __('site.problem_id') }}
                                    </button>
                                    <x-sort-icon sort_field="problem_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                        @forelse ($sub_problems as $sub_problem)
                            <tr wire:key="problem-{{ $sub_problem->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-sub-problem')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $sub_problem->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $sub_problem->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $sub_problem->name }}
                                </td>
                                <td class="p-2 border">
                                    {{ $sub_problem->problem?->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-sub-problem" id="{{ $sub_problem->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-sub-problem" id="{{ $sub_problem->id }}"
                                            name="{{ $sub_problem->name }}" />
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

                @if ($sub_problems->hasPages())
                    <x-paginate :data-links="$sub_problems->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
