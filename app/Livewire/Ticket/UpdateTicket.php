<?php

namespace App\Livewire\Ticket;

use App\Traits\TicketTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateTicket extends Component
{
    use TicketTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setTicket($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateTicket();
    }

    public function render()
    {
        $this->authorize('edit-ticket');

        return view('livewire.ticket.update-ticket');
    }
}
