<?php

namespace App\Livewire\Problem;

use App\Traits\ProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateProblem extends Component
{
    use ProblemTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setProblem($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateProblem();
    }

    public function render()
    {
        $this->authorize('edit-problem');

        return view('livewire.problem.update-problem');
    }
}
