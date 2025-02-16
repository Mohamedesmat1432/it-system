<?php

namespace App\Livewire\Ticket;

use App\Traits\TicketTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteTicket extends Component
{
    use TicketTrait;

    #[Locked]
    public $id, $name;

    #[On('delete-modal')]
    public function confirmDelete($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delete_modal = true;
    }

    public function delete()
    {
        $this->deleteTicket($this->id);
    }

    public function render()
    {
        $this->authorize('delete-ticket');

        return view('livewire.ticket.delete-ticket');
    }
}
