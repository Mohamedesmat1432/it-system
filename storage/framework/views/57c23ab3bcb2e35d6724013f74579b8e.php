<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['status']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['status']); ?>
<?php foreach (array_filter((['status']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<div>
    <label for="toggle" class="flex items-center cursor-pointer">
        <!-- The toggle switch -->
        <div class="relative">
            <input type="checkbox" id="toggle" wire:click="toggleStatus" class="sr-only" <?php if($status): echo 'checked'; endif; ?>>
            <div class="block w-14 h-8 rounded-full <?php echo e($status ? 'bg-green-400' : 'bg-gray-400'); ?>"></div>
            <div
                class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform duration-300 ease-in-out <?php echo e($status ? 'transform translate-x-6' : ''); ?>">
            </div>
        </div>
        <!-- Status Text -->
        <span class="mx-2 text-sm <?php echo e($status ? 'text-green-500' : 'text-red-500'); ?>">
            <?php echo e($status ? __('site.active') : __('site.inactive')); ?>

        </span>
    </label>
</div>
<?php /**PATH /var/www/resources/views/components/toggle-status.blade.php ENDPATH**/ ?>