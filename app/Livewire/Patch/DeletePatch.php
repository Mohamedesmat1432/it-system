<?php

namespace App\Livewire\Patch;

use App\Traits\PatchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeletePatch extends Component
{
    use PatchTrait;

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
        $this->deletePatch($this->id);
    }

    public function render()
    {
        $this->authorize('delete-patch');

        return view('livewire.patch.delete-patch');
    }
}
