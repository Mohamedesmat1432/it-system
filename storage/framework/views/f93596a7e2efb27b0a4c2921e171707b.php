<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['data' => [], 'name' => '', 'placeholder' => '', 'search' => '', 'selectedValue' => null]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['data' => [], 'name' => '', 'placeholder' => '', 'search' => '', 'selectedValue' => null]); ?>
<?php foreach (array_filter((['data' => [], 'name' => '', 'placeholder' => '', 'search' => '', 'selectedValue' => null]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="relative w-full mt-1" x-data="{
    open: false,
    selected: <?php echo \Illuminate\Support\Js::from(array_key_exists($selectedValue, $data) ? $data[$selectedValue] : '')->toHtml() ?>,
    selectValue(value, key) {
        this.selected = value;
        this.open = false;
        $wire.set('<?php echo e($name); ?>', key);
    }
}">

    <!-- Select Box -->
    <div @click="open = !open"
        class="border border-gray-300 rounded-md px-3 py-2 w-full bg-white flex justify-between items-center cursor-pointer focus:border-blue-500 focus:ring-blue-500">
        <span x-text="selected ? selected : '<?php echo e($placeholder); ?>'" class="text-gray-700"></span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd" />
        </svg>
    </div>

    <!-- Dropdown List -->
    <ul x-show="open" aria-hidden="!open" @click.away="open = false" x-transition
        class="absolute z-10 bg-white border border-gray-300 w-full mt-1 rounded-md shadow-md max-h-48 overflow-auto">

        <!-- Search Input -->
        <input type="text" placeholder="<?php echo e(__('site.search')); ?>"
            class="w-full px-3 py-2 border-b focus:outline-none rounded"
            wire:model.live.debounce.300ms="<?php echo e($search); ?>" @click.stop @keydown.escape.window="open = false">

        <!-- Options -->
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li @click="selectValue('<?php echo e($val); ?>', '<?php echo e($key); ?>')"
                class="px-4 py-2 cursor-pointer hover:bg-blue-100 <?php echo e($selectedValue == (string) $key ? 'bg-blue-500 text-white' : ''); ?>">
                <span><?php echo e($val); ?></span>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
    </ul>
</div>
<?php /**PATH /var/www/resources/views/components/select-search.blade.php ENDPATH**/ ?>