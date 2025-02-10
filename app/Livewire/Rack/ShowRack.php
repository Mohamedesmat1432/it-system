<?php

namespace App\Livewire\Rack;

use App\Traits\RackTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowRack extends Component
{
    use RackTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setRack($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-rack');

        return view('livewire.rack.show-rack');
    }
}
