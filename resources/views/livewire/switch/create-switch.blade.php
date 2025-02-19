<div>
    @if ($this->create_modal)
        <x-dialog-modal wire:model="create_modal" submit="save()" method="POST">
            <x-slot name="title">
                {{ __('site.create_switch') }}
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mt-2">
                        <x-label for="switch_name_id" value="{{ __('site.switch_name_id') }}" />
                        <div id="parentSwitchName" class="relative mt-1" wire:ignore x-data="{ switch_name_id: @entangle('switch_name_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#switchNameId');
                                    let parent = $('#parentSwitchName');
                                    let placeholder = '{{ __('site.select_switch_name') }}';
                            
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
                                        switch_name_id = $(this).val();
                                    });
                            
                                    $watch('switch_name_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">

                            <select id="switchNameId" class="mt-1 block w-full" wire:model="switch_name_id">
                                <option value="">{{ __('site.select_switch_name') }}</option>
                                @foreach ($this->switchNames() as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error for="switch_name_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="port" value="{{ __('site.port') }}" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="port"
                            placeholder="{{ __('site.port') }}" />
                        <x-input-error for="port" class="mt-2" />
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
