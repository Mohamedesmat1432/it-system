<?php

namespace App\Livewire\Switch;

use App\Traits\SwitchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateSwitch extends Component
{
    use SwitchTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeSwitch();
    }

    public function render()
    {
        $this->authorize('create-switch');

        return view('livewire.switch.create-switch');
    }
}
