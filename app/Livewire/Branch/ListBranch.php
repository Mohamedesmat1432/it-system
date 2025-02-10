<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use App\Traits\BranchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListBranch extends Component
{
    use BranchTrait;

    #[On('refresh-list-branch')]
    public function render()
    {
        $this->authorize('view-branch');

        $branchs = Branch::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Branch::pluck('id')->toArray();

        return view('livewire.branch.list-branch', [
            'branchs' => $branchs,
        ]);
    }
}
