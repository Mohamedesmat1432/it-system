<?php

namespace App\Livewire\SubProblem;

use App\Models\SubProblem;
use App\Traits\SubProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListSubProblem extends Component
{
    use SubProblemTrait;

    #[On('refresh-list-sub-problem')]
    public function render()
    {
        $this->authorize('view-sub-problem');

        $sub_problems = SubProblem::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = SubProblem::pluck('id')->toArray();

        return view('livewire.sub-problem.list-sub-problem', [
            'sub_problems' => $sub_problems,
        ]);
    }
}
