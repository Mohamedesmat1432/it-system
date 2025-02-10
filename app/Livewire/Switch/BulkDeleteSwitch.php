<?php

namespace App\Livewire\Switch;

use App\Traits\SwitchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteSwitch extends Component
{
    use SwitchTrait;
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
        $this->bulkDeleteSwitch($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-switch');

        return view('livewire.switch.bulk-delete-switch');
    }
}
