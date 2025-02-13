<?php

namespace App\Livewire\SubProblem;

use App\Traits\SubProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteSubProblem extends Component
{
    use SubProblemTrait;
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
        $this->bulkDeleteSubProblem($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-sub-problem');

        return view('livewire.sub-problem.bulk-delete-sub-problem');
    }
}
