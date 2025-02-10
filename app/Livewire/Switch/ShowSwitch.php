<?php

namespace App\Livewire\Switch;

use App\Traits\SwitchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowSwitch extends Component
{
    use SwitchTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setSwitch($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-switch');

        return view('livewire.switch.show-switch');
    }
}
