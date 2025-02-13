<?php

namespace App\Livewire\Problem;

use App\Traits\ProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteProblem extends Component
{
    use ProblemTrait;
    public $count;

    #[On('bulk-delete-modal')]
    public function confirmDelete($arr)
    {
        $this->checkbox_arr = json_decode($arr);
        $this->count = count($this->checkbox_arr);
        $this->bulk_delete_modal = true;
    }

    public function delete()
    {
        $this->bulkDeleteProblem($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-problem');

        return view('livewire.problem.bulk-delete-problem');
    }
}
