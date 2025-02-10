<?php

namespace App\Livewire\Patch;

use App\Traits\PatchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeletePatch extends Component
{
    use PatchTrait;
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
        $this->bulkDeletePatch($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-patch');

        return view('livewire.patch.bulk-delete-patch');
    }
}
