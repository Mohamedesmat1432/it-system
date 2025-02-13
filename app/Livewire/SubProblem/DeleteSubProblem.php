<?php

namespace App\Livewire\SubProblem;

use App\Traits\SubProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteSubProblem extends Component
{
    use SubProblemTrait;

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
        $this->deleteSubProblem($this->id);
    }

    public function render()
    {
        $this->authorize('delete-sub-problem');

        return view('livewire.sub-problem.delete-sub-problem');
    }
}
