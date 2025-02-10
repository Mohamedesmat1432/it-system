<?php

namespace App\Livewire\Subnet;

use App\Traits\SubnetTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteSubnet extends Component
{
    use SubnetTrait;
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
        $this->bulkDeleteSubnet($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-subnet');

        return view('livewire.subnet.bulk-delete-subnet');
    }
}
