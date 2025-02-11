<?php

namespace App\Livewire\SwitchName;

use App\Exports\SwitchNamesExport;
use App\Traits\SwitchNameTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportSwitchName extends Component
{
    use SwitchNameTrait;

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
            $this->dispatch('refresh-list-switch-name');
            $this->successNotify(__('site.switch_name_exported'));
            return (new SwitchNamesExport($this->search))->download('switch-name.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-switch-name');
        
        return view('livewire.switch-name.export-switch-name');
    }
}
