<?php

namespace App\Livewire\Problem;

use App\Models\Problem;
use App\Traits\ProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListProblem extends Component
{
    use ProblemTrait;

    #[On('refresh-list-problem')]
    public function render()
    {
        $this->authorize('view-problem');

        $problems = Problem::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Problem::pluck('id')->toArray();

        return view('livewire.problem.list-problem', [
            'problems' => $problems,
        ]);
    }
}
