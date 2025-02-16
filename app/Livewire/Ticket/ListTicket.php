<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use App\Traits\TicketTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListTicket extends Component
{
    use TicketTrait;

    #[On('refresh-list-ticket')]
    public function render()
    {
        $this->authorize('view-ticket');

        $tickets = Ticket::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Ticket::pluck('id')->toArray();

        return view('livewire.ticket.list-ticket', [
            'tickets' => $tickets,
        ]);
    }
}
