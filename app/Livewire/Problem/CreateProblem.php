<?php

namespace App\Livewire\Problem;

use App\Traits\ProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateProblem extends Component
{
    use ProblemTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeProblem();
    }

    public function render()
    {
        $this->authorize('create-problem');

        return view('livewire.problem.create-problem');
    }
}
