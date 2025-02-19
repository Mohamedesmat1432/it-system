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
                        <div id="parentUser" class="relative mt-1" wire:ignore x-data="{ user_id: @entangle('user_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#userId');
                                    let parent = $('#parentUser');
                                    let placeholder = '{{ __('site.select_user') }}';
                            
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
                                        user_id = $(this).val();
                                    });
                            
                                    $watch('user_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <select id="userId" class="mt-1 block w-full" wire:model="user_id">
                                <option value="">{{ __('site.select_user') }}</option>
                                @foreach ($this->users() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-error for="user_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="branch_id" value="{{ __('site.branch_id') }}" />
                        <div id="parentBranch" class="relative mt-1" wire:ignore x-data="{ branch_id: @entangle('branch_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#branchId');
                                    let parent = $('#parentBranch');
                                    let placeholder = '{{ __('site.select_branch') }}';
                            
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
                                        branch_id = $(this).val();
                                    });
                            
                                    $watch('branch_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <x-select id="branchId" class="mt-1 block w-full" wire:model="branch_id">
                                <option value="">{{ __('site.select_branch') }}</option>
                                @foreach ($this->branches() as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </x-select>
                        </div>
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
                        <div id="parentRack" class="relative mt-1" wire:ignore x-data="{ rack_id: @entangle('rack_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#rackId');
                                    let parent = $('#parentRack');
                                    let placeholder = '{{ __('site.select_rack') }}';
                            
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
                                        rack_id = $(this).val();
                                    });
                            
                                    $watch('rack_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <x-select id="rackId" class="mt-1 block w-full" wire:model="rack_id">
                                <option value="">{{ __('site.select_rack') }}</option>
                                @foreach ($this->racks() as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="rack_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="subnet_id" value="{{ __('site.subnet_id') }}" />
                        <div id="parentSubnet" class="relative mt-1" wire:ignore x-data="{ subnet_id: @entangle('subnet_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#subnetId');
                                    let parent = $('#parentSubnet');
                                    let placeholder = '{{ __('site.select_subnet') }}';
                            
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
                                        subnet_id = $(this).val();
                                    });
                            
                                    $watch('subnet_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <x-select id="subnetId" class="mt-1 block w-full" wire:model="subnet_id">
                                <option value="">{{ __('site.select_subnet') }}</option>
                                @foreach ($this->subnets() as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="subnet_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="patch_id" value="{{ __('site.patch_id') }}" />
                        <div id="parentPatch" class="relative mt-1" wire:ignore x-data="{ patch_id: @entangle('patch_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#patchId');
                                    let parent = $('#parentPatch');
                                    let placeholder = '{{ __('site.select_patch') }}';
                            
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
                                        patch_id = $(this).val();
                                    });
                            
                                    $watch('patch_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <x-select id="patchId" class="mt-1 block w-full" wire:model="patch_id">
                                <option value="">{{ __('site.select_patch') }}</option>
                                @foreach ($this->patches() as $patch)
                                    <option value="{{ $patch->id }}">{{ $patch->port }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="patch_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="switch_id" value="{{ __('site.switch_id') }}" />
                        <div id="parentSwitch" class="relative mt-1" wire:ignore x-data="{ switch_id: @entangle('switch_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#switchId');
                                    let parent = $('#parentSwitch');
                                    let placeholder = '{{ __('site.select_switch') }}';
                            
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
                                        switch_id = $(this).val();
                                    });
                            
                                    $watch('switch_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <x-select id="switchId" class="mt-1 block w-full" wire:model="switch_id">
                                <option value="">{{ __('site.select_switch') }}</option>
                                @foreach ($this->switchs() as $switch)
                                    <option value="{{ $switch->id }}">
                                        {{ $switch->switchName?->name }} /
                                        {{ $switch->port }}
                                    </option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="switch_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="ip_id" value="{{ __('site.ip_id') }}" />
                        <div id="parentIp" class="relative mt-1" wire:ignore x-data="{ ip_id: @entangle('ip_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#ipId');
                                    let parent = $('#parentIp');
                                    let placeholder = '{{ __('site.select_ip') }}';
                            
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
                                        ip_id = $(this).val();
                                    });
                            
                                    $watch('ip_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <x-select id="ipId" class="mt-1 block w-full" wire:model="ip_id">
                                <option value="">{{ __('site.select_ip') }}</option>
                                @foreach ($this->ips() as $ip)
                                    <option value="{{ $ip->id }}">{{ $ip->number }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <x-input-error for="ip_id" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <x-label for="telephone_id" value="{{ __('site.telephone_id') }}" />
                        <div id="parentTelephone" class="relative mt-1" wire:ignore x-data="{ telephone_id: @entangle('telephone_id') }"
                            x-init="() => {
                                $nextTick(() => {
                                    let select = $('#telephoneId');
                                    let parent = $('#parentTelephone');
                                    let placeholder = '{{ __('site.select_telephone') }}';
                            
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
                                        telephone_id = $(this).val();
                                    });
                            
                                    $watch('telephone_id', (value) => {
                                        select.val(value).trigger('change');
                                    });
                                });
                            }">
                            <x-select id="telephoneId" class="mt-1 block w-full" wire:model="telephone_id">
                                <option value="">{{ __('site.select_telephone') }}</option>
                                @foreach ($this->telephones() as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </x-select>
                        </div>
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
                <x-secondary-button class="mx-2" wire:click="$set('create_modal',false)"
                    wire:loading.attr="disabled">
                    {{ __('site.cancel') }}
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif
</div>
