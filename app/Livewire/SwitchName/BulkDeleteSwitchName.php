<?php

namespace App\Livewire\SwitchName;

use App\Traits\SwitchNameTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteSwitchName extends Component
{
    use SwitchNameTrait;
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
        $this->bulkDeleteSwitchName($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-switch-name');

        return view('livewire.switch-name.bulk-delete-switch-name');
    }
}
