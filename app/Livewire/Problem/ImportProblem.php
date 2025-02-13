<?php

namespace App\Livewire\Problem;

use App\Imports\ProblemsImport;
use App\Traits\ProblemTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class ImportProblem extends Component
{
    use ProblemTrait, WithFileUploads;

    public $file;

    #[On('import-modal')]
    public function importModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->import_modal = true;
    }


    public function import(ProblemsImport $import)
    {
        $this->validate(['file' => 'required|file|mimes:xlsx,xls,csv|max:1024']);
        try {
            $this->import_modal = false;
            $import->import($this->file->getRealPath());
            $this->dispatch('refresh-list-problem');
            $this->successNotify(__('site.problem_imported'));
            if(!empty($import->skippedRows)) {
                $this->errorNotify(json_encode($import->skippedRows));
            }
            return;
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }

    public function render()
    {
        $this->authorize('import-problem');

        return view('livewire.problem.import-problem');
    }
}
