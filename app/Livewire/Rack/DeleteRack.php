<?php

namespace App\Livewire\Rack;

use App\Traits\RackTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteRack extends Component
{
    use RackTrait;

    #[Locked]
    public $id, $name;

    #[On('delete-modal')]
    public function confirmDelete($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delete_modal = true;
    }

    public function delete()
    {
        $this->deleteRack($this->id);
    }

    public function render()
    {
        $this->authorize('delete-rack');

        return view('livewire.rack.delete-rack');
    }
}
