<?php

namespace App\Livewire\Ticket;

use App\Exports\TicketsExport;
use App\Traits\TicketTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportTicket extends Component
{
    use TicketTrait;

    #[On('export-modal')]
    public function exportModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->export_modal = true;
    }

    public function export()
    {
        try {
            $this->export_modal = false;
            $this->dispatch('refresh-list-ticket');
            $this->successNotify(__('site.ticket_exported'));
            return (new TicketsExport($this->search))->download('tickets.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-ticket');
        
        return view('livewire.ticket.export-ticket');
    }
}
