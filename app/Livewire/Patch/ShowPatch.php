<?php

namespace App\Livewire\Patch;

use App\Traits\PatchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowPatch extends Component
{
    use PatchTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setPatch($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-patch');

        return view('livewire.patch.show-patch');
    }
}
