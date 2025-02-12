<div>
    @if ($this->edit_modal)
    <x-dialog-modal wire:model="edit_modal" submit="save()" method="PATCH">
        <x-slot name="title">
            {{ __('site.update_switch_name') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mt-2">
                    <x-label for="name" value="{{ __('site.name') }}" />
                    <x-input type="text" class="mt-1 block w-full" wire:model="name"
                        placeholder="{{ __('site.name') }}" />
                    <x-input-error for="name" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="ip" value="{{ __('site.ip') }}" />
                    <x-input type="text" class="mt-1 block w-full" wire:model="ip"
                        placeholder="{{ __('site.ip') }}" />
                    <x-input-error for="ip" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="password" value="{{ __('site.password') }}" />
                    <x-input type="text" class="mt-1 block w-full" wire:model="password"
                        placeholder="{{ __('site.password') }}" />
                    <x-input-error for="password" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="password_enable" value="{{ __('site.password_enable') }}" />
                    <x-input type="text" class="mt-1 block w-full" wire:model="password_enable"
                        placeholder="{{ __('site.password_enable') }}" />
                    <x-input-error for="password_enable" class="mt-2" />
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
