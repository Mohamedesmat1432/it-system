<?php

namespace App\Livewire\Branch;

use App\Exports\BranchsExport;
use App\Traits\BranchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportBranch extends Component
{
    use BranchTrait;

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
            $this->dispatch('refresh-list-branch');
            $this->successNotify(__('site.branch_exported'));
            return (new BranchsExport($this->search))->download('branches.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-branch');
        
        return view('livewire.branch.export-branch');
    }
}
