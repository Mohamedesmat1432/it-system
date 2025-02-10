<?php

namespace App\Livewire\Patch;

use App\Exports\PatchsExport;
use App\Traits\PatchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportPatch extends Component
{
    use PatchTrait;

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
            $this->dispatch('refresh-list-patch');
            $this->successNotify(__('site.patch_exported'));
            return (new PatchsExport($this->search))->download('patch.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-patch');
        
        return view('livewire.patch.export-patch');
    }
}
