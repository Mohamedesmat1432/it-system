<?php

namespace App\Livewire\Ip;

use App\Exports\IpsExport;
use App\Traits\IpTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportIp extends Component
{
    use IpTrait;

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
            $this->dispatch('refresh-list-ip');
            $this->successNotify(__('site.ip_exported'));
            return (new IpsExport($this->search))->download('ips.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-ip');
        
        return view('livewire.ip.export-ip');
    }
}
