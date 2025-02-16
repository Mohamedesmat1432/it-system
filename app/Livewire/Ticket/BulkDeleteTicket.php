<?php

namespace App\Livewire\Ticket;

use App\Traits\TicketTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteTicket extends Component
{
    use TicketTrait;
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
        $this->bulkDeleteTicket($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-ticket');

        return view('livewire.ticket.bulk-delete-ticket');
    }
}
