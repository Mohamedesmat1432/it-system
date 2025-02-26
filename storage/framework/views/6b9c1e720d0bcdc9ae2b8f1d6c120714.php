<div x-data="{ open: false }" x-show="open"
    x-on:notify.window="Toastify({
    text: $event.detail.message,
    duration: 3000,
    newWindow: true,
    close: true,
    gravity: 'top', 
    position: 'right', 
    stopOnFocus: true,
    style: {
      background: $event.detail.style,
      borderRaduis:'5px',
    },
  }).showToast();">

</div>
<?php /**PATH /var/www/resources/views/components/notify.blade.php ENDPATH**/ ?>