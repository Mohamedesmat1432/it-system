<div>
    @if ($this->edit_modal)
    <x-dialog-modal wire:model="edit_modal" submit="save()" method="PATCH">
        <x-slot name="title">
            {{ __('site.update_switch') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mt-2">
                    <x-label for="switch_name_id" value="{{ __('site.switch_name_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="switch_name_id">
                        <option value="">{{ __('site.select_switch_name') }}</option>
                        @foreach ($this->switchNames() as $switchName)
                        <option value="{{ $switchName->id }}">
                            {{ $switchName->name }}
                        </option>
                        @endforeach
                    </x-select>
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
            <x-secondary-button class="mx-2" wire:click="$set('edit_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    @endif
</div>