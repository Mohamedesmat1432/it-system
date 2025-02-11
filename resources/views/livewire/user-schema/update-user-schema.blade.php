<div>
    @if ($this->edit_modal)
    <x-dialog-modal wire:model="edit_modal" submit="save()" method="PATCH">
        <x-slot name="title">
            {{ __('site.update_user_schema') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mt-2">
                    <x-label for="user_id" value="{{ __('site.user_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="user_id">
                        <option value="">{{ __('site.select_user') }}</option>
                        @foreach ($this->users() as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="user_id" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="branch_id" value="{{ __('site.branch_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="branch_id">
                        <option value="">{{ __('site.select_branch') }}</option>
                        @foreach ($this->branches() as $key => $val)
                        <option value="{{ $key }}">
                            {{ $val }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="branch_id" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="floor" value="{{ __('site.floor') }}" />
                    <x-select class="mt-1 block w-full" wire:model="floor">
                        <option value="">{{ __('site.select_floor') }}</option>
                        @foreach ($this->floors() as $floor)
                        <option value="{{ $floor->value }}">
                            {{ $floor->value }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="floor" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="rack_id" value="{{ __('site.rack_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="rack_id">
                        <option value="">{{ __('site.select_rack') }}</option>
                        @foreach ($this->racks() as $key => $val)
                        <option value="{{ $key }}">
                            {{ $val }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="rack_id" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="subnet_id" value="{{ __('site.subnet_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="subnet_id">
                        <option value="">{{ __('site.select_subnet') }}</option>
                        @foreach ($this->subnets() as $key => $val)
                        <option value="{{ $key }}">
                            {{ $val }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="subnet_id" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="patch_id" value="{{ __('site.patch_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="patch_id">
                        <option value="">{{ __('site.select_patch') }}</option>
                        @foreach ($this->patches() as $patch)
                        <option value="{{ $patch->id }}">
                            {{ $patch->port }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="patch_id" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="switch_id" value="{{ __('site.switch_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="switch_id">
                        <option value="">{{ __('site.select_switch') }}</option>
                        @foreach ($this->switchs() as $switch)
                        <option value="{{ $switch->id }}">
                            {{ $switch->switchName?->name }} /
                            {{ $switch->port }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="switch_id" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="ip_id" value="{{ __('site.ip_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="ip_id">
                        <option value="">{{ __('site.select_ip') }}</option>
                        @foreach ($this->ips() as $ip)
                        <option value="{{ $ip->id }}">
                            {{ $ip->number }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="ip_id" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="telephone_id" value="{{ __('site.telephone_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="telephone_id">
                        <option value="">{{ __('site.select_telephone') }}</option>
                        @foreach ($this->telephones() as $key => $val)
                        <option value="{{ $key }}">
                            {{ $val }}
                        </option>
                        @endforeach
                    </x-select>
                    <x-input-error for="telephone_id" class="mt-2" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div class="mt-2">
                    <x-label for="notes" value="{{ __('site.notes') }}" />
                    <x-textarea class="mt-1 block w-full" wire:model="notes"
                        placeholder="{{ __('site.notes') }}"></x-textarea>
                    <x-input-error for="notes" class="mt-2" />
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