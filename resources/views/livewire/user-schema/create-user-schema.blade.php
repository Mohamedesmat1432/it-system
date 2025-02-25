<div>
    @if ($this->create_modal)
        <x-dialog-modal wire:model="create_modal" submit="save()" method="POST">
            <x-slot name="title">
                {{ __('site.create_user_schema') }}
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mt-2">
                        <x-label for="user_id" value="{{ __('site.user_id') }}" />
                        <x-select-search class="mt-1 block w-full" :data="$this->users()" :placeholder="__('site.select_user')" name="user_id"
                            search="search" :selected-value="$user_id" />
                        <x-input-error for="user_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="branch_id" value="{{ __('site.branch_id') }}" />
                        <x-select-search class="mt-1 block w-full" :data="$this->branches()" :placeholder="__('site.select_branch')" name="branch_id"
                            search="search" :selected-value="$branch_id" />
                        <x-input-error for="branch_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="floor" value="{{ __('site.floor') }}" />
                        <div id="parentFloor" class="relative mt-1" wire:ignore x-data="{ floor: @entangle('floor') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#floorId');
                                    let parent = $('#parentFloor');
                                    let placeholder = '{{ __('site.select_floor') }}';
                            
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
                                        floor = $(this).val();
                                    });
                            
                                    $watch('floor', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <x-select id="floorId" class="mt-1 block w-full" wire:model="floor">
                                <option value="">{{ __('site.select_floor') }}</option>
                                @foreach ($this->floors() as $floor)
                                    <option value="{{ $floor->value }}">{{ $floor->value }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="floor" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="rack_id" value="{{ __('site.rack_id') }}" />
                        <x-select-search class="mt-1 block w-full" :data="$this->racks()" :placeholder="__('site.select_rack')" name="rack_id"
                            search="search" :selected-value="$rack_id" />
                        <x-input-error for="rack_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="subnet_id" value="{{ __('site.subnet_id') }}" />
                        <x-select-search class="mt-1 block w-full" :data="$this->subnets()" :placeholder="__('site.select_subnet')" name="subnet_id"
                            search="search" :selected-value="$subnet_id" />
                        <x-input-error for="subnet_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="patch_id" value="{{ __('site.patch_id') }}" />
                        <x-select-search class="mt-1 block w-full" :data="$this->patches()" :placeholder="__('site.select_patch')" name="patch_id"
                            search="search" :selected-value="$patch_id" />
                        <x-input-error for="patch_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="switch_id" value="{{ __('site.switch_id') }}" />
                        <x-select-search class="mt-1 block w-full" :data="$this->switchs()" :placeholder="__('site.select_switch')"
                            name="switch_id" search="search" :selected-value="$switch_id" />
                        <x-input-error for="switch_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="ip_id" value="{{ __('site.ip_id') }}" />
                        <x-select-search class="mt-1 block w-full" :data="$this->ips()" :placeholder="__('site.select_ip')" name="ip_id"
                            search="search" :selected-value="$ip_id" />
                        <x-input-error for="ip_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="telephone_id" value="{{ __('site.telephone_id') }}" />
                        <x-select-search class="mt-1 block w-full" :data="$this->telephones()" :placeholder="__('site.select_telephone')"
                            name="telephone_id" search="search" :selected-value="$telephone_id" />
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
                <x-secondary-button class="mx-2" wire:click="$set('create_modal',false)" wire:loading.attr="disabled">
                    {{ __('site.cancel') }}
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif
</div>
