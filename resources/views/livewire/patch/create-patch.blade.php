<div>
    @if ($this->create_modal)
    <x-dialog-modal wire:model="create_modal" submit="save()" method="POST">
        <x-slot name="title">
            {{ __('site.create_patch') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
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
