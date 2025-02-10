<?php

namespace App\Livewire\Telephone;

use App\Exports\TelephonesExport;
use App\Traits\TelephoneTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportTelephone extends Component
{
    use TelephoneTrait;

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
            $this->dispatch('refresh-list-telephone');
            $this->successNotify(__('site.telephone_exported'));
            return (new TelephonesExport($this->search))->download('telephone.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-telephone');
        
        return view('livewire.telephone.export-telephone');
    }
}
