<?php

namespace App\Livewire\Rack;

use App\Traits\RackTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateRack extends Component
{
    use RackTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeRack();
    }

    public function render()
    {
        $this->authorize('create-rack');

        return view('livewire.rack.create-rack');
    }
}
