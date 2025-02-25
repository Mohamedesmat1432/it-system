@props(['data' => [], 'name' => '', 'placeholder' => '', 'search' => '', 'selectedValue' => null])

<div class="relative w-full" x-data="{
    open: false,
    selected: @js(array_key_exists($selectedValue, $data) ? $data[$selectedValue] : ''),
    selectValue(value, key) {
        this.selected = value;
        this.open = false;
        $wire.set('{{ $name }}', key);
    }
}">

    <!-- Select Box -->
    <div @click="open = !open"
        class="border border-gray-300 rounded-md px-3 py-2 w-full bg-white flex justify-between items-center cursor-pointer focus:border-blue-500 focus:ring-blue-500">
        <span x-text="selected ? selected : '{{ $placeholder }}'" class="text-gray-700"></span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </div>

    <!-- Dropdown List -->
    <div x-show="open" @click.away="open = false" x-transition
        class="absolute z-10 bg-white border border-gray-300 w-full mt-1 rounded-md shadow-md max-h-48 overflow-auto">

        <!-- Search Input -->
        <input type="text" placeholder="{{ __('site.search') }}" class="w-full px-3 py-2 border-b focus:outline-none"
            wire:model.live="{{ $search }}" @click.stop
            @keydown.escape.window="open = false">

        <!-- Options -->
        @foreach ($data as $key => $val)
            <div @click="selectValue('{{ $val }}', '{{ $key }}')"
                class="px-4 py-2 cursor-pointer hover:bg-blue-100 {{ $selectedValue == (string) $key ? 'bg-blue-500 text-white' : '' }}">
                <span>{{ $val }}</span>
            </div>
        @endforeach
    </div>
</div>
