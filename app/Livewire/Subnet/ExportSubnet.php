<?php

namespace App\Livewire\Subnet;

use App\Exports\SubnetsExport;
use App\Traits\SubnetTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportSubnet extends Component
{
    use SubnetTrait;

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
            $this->dispatch('refresh-list-subnet');
            $this->successNotify(__('site.subnet_exported'));
            return (new SubnetsExport($this->search))->download('subnets.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-subnet');
        
        return view('livewire.subnet.export-subnet');
    }
}
