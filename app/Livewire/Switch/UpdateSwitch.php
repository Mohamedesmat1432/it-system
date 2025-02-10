<?php

namespace App\Livewire\Switch;

use App\Traits\SwitchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateSwitch extends Component
{
    use SwitchTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setSwitch($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateSwitch();
    }

    public function render()
    {
        $this->authorize('edit-switch');

        return view('livewire.switch.update-switch');
    }
}
