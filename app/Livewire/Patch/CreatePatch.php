<?php

namespace App\Livewire\Patch;

use App\Traits\PatchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreatePatch extends Component
{
    use PatchTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storePatch();
    }

    public function render()
    {
        $this->authorize('create-patch');

        return view('livewire.patch.create-patch');
    }
}
