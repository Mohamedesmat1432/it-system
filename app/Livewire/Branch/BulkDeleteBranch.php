<?php

namespace App\Livewire\Branch;

use App\Traits\BranchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteBranch extends Component
{
    use BranchTrait;
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
        $this->bulkDeleteBranch($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-branch');

        return view('livewire.branch.bulk-delete-branch');
    }
}
