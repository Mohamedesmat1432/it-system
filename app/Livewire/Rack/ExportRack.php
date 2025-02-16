<?php

namespace App\Livewire\Rack;

use App\Exports\RacksExport;
use App\Traits\RackTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportRack extends Component
{
    use RackTrait;

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
            $this->dispatch('refresh-list-rack');
            $this->successNotify(__('site.rack_exported'));
            return (new RacksExport($this->search))->download('racks.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-rack');
        
        return view('livewire.rack.export-rack');
    }
}
