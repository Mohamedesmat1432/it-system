<?php

namespace App\Traits;

trait WithNotify
{
    public function successNotify($message, $style = '#3182ce')
    {
        $this->dispatch('notify', message: $message, style: $style);
    }

    public function errorNotify($message, $style = '#f94449')
    {
        $this->dispatch('notify', message: $message, style: $style);
    }
}
