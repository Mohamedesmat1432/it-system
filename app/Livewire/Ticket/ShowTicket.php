<?php

namespace App\Livewire\Ticket;

use App\Traits\TicketTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowTicket extends Component
{
    use TicketTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setTicket($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-ticket');

        return view('livewire.ticket.show-ticket');
    }
}
