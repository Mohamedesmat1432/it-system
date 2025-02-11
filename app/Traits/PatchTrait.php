<?php
namespace App\Traits;

use App\Models\Patch;
use Livewire\WithPagination;

trait PatchTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Patch $patch;

    public $patch_id, $port;

    protected function rules()
    {
        return [
            'port' => 'required|string|unique:patches,port,' . $this->patch_id,
        ];
    }

    public function setPatch($id)
    {
        $this->patch = Patch::findOrFail($id);
        $this->patch_id = $this->patch->id;
        $this->port = $this->patch->port;
    }

    public function storePatch()
    {
        $validated = $this->validate();
        Patch::create($validated);
        $this->dispatch('refresh-list-patch');
        $this->successNotify(__('site.patch_created'));
        // $this->create_modal = false;
        $this->reset('port');
    }

    public function updatePatch()
    {
        $validated = $this->validate();
        $this->patch->update($validated);
        $this->dispatch('refresh-list-patch');
        $this->successNotify(__('site.patch_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deletePatch($id)
    {
        $patch = Patch::findOrFail($id);
        $patch->delete();
        $this->dispatch('refresh-list-patch');
        $this->successNotify(__('site.patch_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeletePatch($arr)
    {
        $patchs = Patch::whereIn('id', $arr);
        $patchs->delete();
        $this->dispatch('refresh-list-patch');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.patch_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
