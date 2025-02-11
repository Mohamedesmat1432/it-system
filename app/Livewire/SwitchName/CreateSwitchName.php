<?php

namespace App\Livewire\SwitchName;

use App\Traits\SwitchNameTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateSwitchName extends Component
{
    use SwitchNameTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeSwitchName();
    }

    public function render()
    {
        $this->authorize('create-switch-name');

        return view('livewire.switch-name.create-switch-name');
    }
}
