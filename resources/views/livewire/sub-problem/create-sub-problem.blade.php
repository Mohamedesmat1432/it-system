<div>
    @if ($this->create_modal)
        <x-dialog-modal wire:model="create_modal" submit="save()" method="POST">
            <x-slot name="title">
                {{ __('site.create_sub_problem') }}
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mt-2">
                        <x-label for="problem_id" value="{{ __('site.problem_id') }}" />
                        <div id="parentProblem" class="relative mt-1" wire:ignore x-data="{ problem_id: @entangle('problem_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#problemId');
                                    let parent = $('#parentProblem');
                                    let placeholder = '{{ __('site.select_problem') }}';

                                    if (select.data('select2')) {
                                        select.select2('destroy');
                                    }
                            
                                    select.select2({
                                        tags: true,
                                        dropdownParent: parent,
                                        placeholder: placeholder,
                                        allowClear: true,
                                        minimumResultsForSearch: 0
                                    });
                            
                                    select.on('change', function() {
                                        problem_id = $(this).val();
                                    });
                            
                                    $watch('problem_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <select id="problemId" class="mt-1 block w-full" wire:model="problem_id">
                                <option value="">{{ __('site.select_problem') }}</option>
                                @foreach ($this->problems() as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error for="problem_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="name" value="{{ __('site.name') }}" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="name"
                            placeholder="{{ __('site.name') }}" />
                        <x-input-error for="name" class="mt-2" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-indigo-button type="submit" wire:loading.attr="disabled">
                    {{ __('site.save') }}
                </x-indigo-button>
                <x-secondary-button class="mx-2" wire:click="$set('create_modal',false)" wire:loading.attr="disabled">
                    {{ __('site.cancel') }}
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif
</div>
