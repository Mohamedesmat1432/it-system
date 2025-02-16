<?php

namespace App\Livewire\Ticket;

use App\Traits\TicketTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateTicket extends Component
{
    use TicketTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeTicket();
    }

    public function render()
    {
        $this->authorize('create-ticket');

        return view('livewire.ticket.create-ticket');
    }
}
