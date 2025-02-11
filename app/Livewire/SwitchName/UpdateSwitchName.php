<?php

namespace App\Livewire\SwitchName;

use App\Traits\SwitchNameTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateSwitchName extends Component
{
    use SwitchNameTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setSwitchName($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateSwitchName();
    }

    public function render()
    {
        $this->authorize('edit-switch-name');

        return view('livewire.switch-name.update-switch-name');
    }
}
