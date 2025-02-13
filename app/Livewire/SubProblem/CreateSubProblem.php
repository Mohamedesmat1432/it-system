<?php

namespace App\Livewire\SubProblem;

use App\Traits\SubProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateSubProblem extends Component
{
    use SubProblemTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeSubProblem();
    }

    public function render()
    {
        $this->authorize('create-sub-problem');

        return view('livewire.sub-problem.create-sub-problem');
    }
}
