<?php

namespace App\Livewire\SubProblem;

use App\Traits\SubProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateSubProblem extends Component
{
    use SubProblemTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setSubProblem($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateSubProblem();
    }

    public function render()
    {
        $this->authorize('edit-sub-problem');

        return view('livewire.sub-problem.update-sub-problem');
    }
}
