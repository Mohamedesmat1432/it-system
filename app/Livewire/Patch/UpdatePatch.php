<?php

namespace App\Livewire\Patch;

use App\Traits\PatchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdatePatch extends Component
{
    use PatchTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setPatch($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updatePatch();
    }

    public function render()
    {
        $this->authorize('edit-patch');

        return view('livewire.patch.update-patch');
    }
}
