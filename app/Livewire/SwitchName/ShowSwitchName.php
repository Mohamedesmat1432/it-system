<?php

namespace App\Livewire\SwitchName;

use App\Traits\SwitchNameTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowSwitchName extends Component
{
    use SwitchNameTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setSwitchName($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-switch-name');

        return view('livewire.switch-name.show-switch-name');
    }
}
