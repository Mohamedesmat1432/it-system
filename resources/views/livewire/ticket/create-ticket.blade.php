<div>
    @if ($this->create_modal)
        <x-dialog-modal wire:model="create_modal" submit="save()" method="POST">
            <x-slot name="title">
                {{ __('site.create_ticket') }}
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
                            <x-select id="problemId" class="mt-1 block w-full" wire:model="problem_id"
                                wire:change="subProblems">
                                <option value="">{{ __('site.select_problem') }}</option>
                                @foreach ($this->problems() as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="problem_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="sub_problem_id" value="{{ __('site.sub_problem_id') }}" />
                        <div id="parentSubProblem" class="relative mt-1" wire:ignore x-data="{ sub_problem_id: @entangle('sub_problem_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#subProblemId');
                                    let parent = $('#parentSubProblem');
                                    let placeholder = '{{ __('site.select_sub_problem') }}';
                            
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
                                        sub_problem_id = $(this).val();
                                    });
                            
                                    $watch('sub_problem_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <x-select id="subProblemId" class="mt-1 block w-full" wire:model="sub_problem_id">
                                <option value="">{{ __('site.select_sub_problem') }}</option>
                                @foreach ($this->subProblems() as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="sub_problem_id" class="mt-2" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <div class="mt-2">
                        <x-label for="description" value="{{ __('site.description') }}" />
                        <x-textarea class="mt-1 block w-full" wire:model="description"
                            placeholder="{{ __('site.description') }}"></x-textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="file" value="{{ __('site.file') }}" />
                        <x-input type="file" class="mt-1 block w-full" wire:model="file"
                            placeholder="{{ __('site.file') }}" />
                        <x-input-error for="file" class="mt-2" />

                    </div>
                    @if ($file)
                        @php
                            $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                            $icon = asset('icons/icon-pdf.png');
                        @endphp

                        @if ($extension == 'pdf')
                            <div class="mt-4 flex items-center">
                                <img src="{{ $icon }}" alt="{{ $extension }}" class="w-12 h-12 mr-2">
                                <span>{{ $file->getClientOriginalName() }}</span>
                            </div>
                        @else
                            <div class="mt-4 flex items-center">
                                <img src="{{ $file->temporaryUrl() }}" alt="{{ $extension }}"
                                    class="w-12 h-12 mr-2">
                            </div>
                        @endif
                    @endif
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
