<?php

namespace App\Livewire\SubProblem;

use App\Traits\SubProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowSubProblem extends Component
{
    use SubProblemTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setSubProblem($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-sub-problem');

        return view('livewire.sub-problem.show-sub-problem');
    }
}
