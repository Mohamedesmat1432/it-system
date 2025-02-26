@props(['status'])
<div>
    <label for="toggle" class="flex items-center cursor-pointer">
        <!-- The toggle switch -->
        <div class="relative">
            <input type="checkbox" id="toggle" wire:click="toggleStatus" class="sr-only" @checked($status)>
            <div class="block w-14 h-8 rounded-full {{ $status ? 'bg-green-400' : 'bg-gray-400' }}"></div>
            <div
                class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform duration-300 ease-in-out {{ $status ? 'transform translate-x-6' : '' }}">
            </div>
        </div>
        <!-- Status Text -->
        <span class="mx-2 text-sm {{ $status ? 'text-green-500' : 'text-red-500' }}">
            {{ $status ? __('site.active') : __('site.inactive') }}
        </span>
    </label>
</div>
