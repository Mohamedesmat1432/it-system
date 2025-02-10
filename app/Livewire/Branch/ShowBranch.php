<?php

namespace App\Livewire\Branch;

use App\Traits\BranchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowBranch extends Component
{
    use BranchTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setBranch($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-branch');

        return view('livewire.branch.show-branch');
    }
}
