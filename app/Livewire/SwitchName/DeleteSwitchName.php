<?php

namespace App\Livewire\SwitchName;

use App\Traits\SwitchNameTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteSwitchName extends Component
{
    use SwitchNameTrait;

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
        $this->deleteSwitchName($this->id);
    }

    public function render()
    {
        $this->authorize('delete-switch-name');

        return view('livewire.switch-name.delete-switch-name');
    }
}
