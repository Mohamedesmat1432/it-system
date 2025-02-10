<?php

namespace App\Livewire\Switch;

use App\Exports\SwitchsExport;
use App\Traits\SwitchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportSwitch extends Component
{
    use SwitchTrait;

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
            $this->dispatch('refresh-list-switch');
            $this->successNotify(__('site.switch_exported'));
            return (new SwitchsExport($this->search))->download('switch.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-switch');
        
        return view('livewire.switch.export-switch');
    }
}
