<?php

namespace App\Livewire\Problem;

use App\Traits\ProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteProblem extends Component
{
    use ProblemTrait;

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
        $this->deleteProblem($this->id);
    }

    public function render()
    {
        $this->authorize('delete-problem');

        return view('livewire.problem.delete-problem');
    }
}
