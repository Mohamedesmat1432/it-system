<?php

namespace App\Livewire\Rack;

use App\Traits\RackTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteRack extends Component
{
    use RackTrait;
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
        $this->bulkDeleteRack($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-rack');

        return view('livewire.rack.bulk-delete-rack');
    }
}
