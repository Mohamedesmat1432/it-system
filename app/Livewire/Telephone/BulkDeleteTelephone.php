<?php

namespace App\Livewire\Telephone;

use App\Traits\TelephoneTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteTelephone extends Component
{
    use TelephoneTrait;
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
        $this->bulkDeleteTelephone($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-telephone');

        return view('livewire.telephone.bulk-delete-telephone');
    }
}
