<?php

namespace App\Livewire\Problem;

use App\Exports\ProblemsExport;
use App\Traits\ProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportProblem extends Component
{
    use ProblemTrait;

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
            $this->dispatch('refresh-list-problem');
            $this->successNotify(__('site.problem_exported'));
            return (new ProblemsExport($this->search))->download('problems.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-problem');
        
        return view('livewire.problem.export-problem');
    }
}
