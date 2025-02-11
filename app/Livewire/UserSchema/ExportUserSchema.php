<?php
namespace App\Livewire\UserSchema;

use App\Exports\UserSchemasExport;
use App\Traits\UserSchemaTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ExportUserSchema extends Component
{
    use UserSchemaTrait;

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
            $this->dispatch('refresh-list-user-schema');
            $this->successNotify(__('site.user_schema_exported'));
            return (new UserSchemasExport($this->search))->download('user-schema.' . $this->extension);
        } catch (\Throwable $e) {
            $this->errorNotify($e->getMessage());
        }
    }
    
    public function render()
    {
        $this->authorize('export-user-schema');
        
        return view('livewire.user-schema.export-user-schema');
    }
}
