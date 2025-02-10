<?php

namespace App\Livewire\Ip;

use App\Traits\IpTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteIp extends Component
{
    use IpTrait;
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
        $this->bulkDeleteIp($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-ip');

        return view('livewire.ip.bulk-delete-ip');
    }
}
