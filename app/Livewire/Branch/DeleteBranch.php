<?php

namespace App\Livewire\Branch;

use App\Traits\BranchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteBranch extends Component
{
    use BranchTrait;

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
        $this->deleteBranch($this->id);
    }

    public function render()
    {
        $this->authorize('delete-branch');

        return view('livewire.branch.delete-branch');
    }
}
