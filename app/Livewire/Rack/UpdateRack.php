<?php

namespace App\Livewire\Rack;

use App\Traits\RackTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateRack extends Component
{
    use RackTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setRack($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateRack();
    }

    public function render()
    {
        $this->authorize('edit-rack');

        return view('livewire.rack.update-rack');
    }
}
