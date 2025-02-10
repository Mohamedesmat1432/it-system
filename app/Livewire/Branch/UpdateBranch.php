<?php

namespace App\Livewire\Branch;

use App\Traits\BranchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateBranch extends Component
{
    use BranchTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setBranch($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateBranch();
    }

    public function render()
    {
        $this->authorize('edit-branch');

        return view('livewire.branch.update-branch');
    }
}
