<?php

namespace App\Livewire\Problem;

use App\Traits\ProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowProblem extends Component
{
    use ProblemTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setProblem($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-problem');

        return view('livewire.problem.show-problem');
    }
}
