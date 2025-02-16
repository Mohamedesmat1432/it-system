<?php

namespace App\Livewire\SubProblem;

use App\Exports\SubProblemsExport;
use App\Traits\SubProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportSubProblem extends Component
{
    use SubProblemTrait;

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
            $this->dispatch('refresh-list-sub-problem');
            $this->successNotify(__('site.sub_problem_exported'));
            return (new SubProblemsExport($this->search))->download('sub-problems.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-sub-problem');
        
        return view('livewire.sub-problem.export-sub-problem');
    }
}
