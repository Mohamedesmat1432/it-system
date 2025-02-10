<?php

namespace App\Livewire\Switch;

use App\Traits\SwitchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteSwitch extends Component
{
    use SwitchTrait;

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
        $this->deleteSwitch($this->id);
    }

    public function render()
    {
        $this->authorize('delete-switch');

        return view('livewire.switch.delete-switch');
    }
}
