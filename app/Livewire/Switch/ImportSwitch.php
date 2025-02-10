<?php

namespace App\Livewire\Switch;

use App\Imports\SwitchsImport;
use App\Traits\SwitchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]
class ImportSwitch extends Component
{
    use SwitchTrait, WithFileUploads;

    public $file;

    #[On('import-modal')]
    public function importModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->import_modal = true;
    }


    public function import(SwitchsImport $import)
    {
        $this->validate(['file' => 'required|file|mimes:xlsx,xls,csv|max:1024']);
        try {
            $this->import_modal = false;
            $import->import($this->file->getRealPath());
            $this->dispatch('refresh-list-switch');
            $this->successNotify(__('site.switch_imported'));
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
        $this->authorize('import-switch');

        return view('livewire.switch.import-switch');
    }
}
