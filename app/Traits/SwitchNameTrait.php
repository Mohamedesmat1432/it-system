<?php
namespace App\Traits;

use App\Models\SwitchName;
use Livewire\WithPagination;

trait SwitchNameTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?SwitchName $switch_name;

    public $switch_name_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:switch_names,name,' . $this->switch_name_id,
        ];
    }

    public function setSwitchName($id)
    {
        $this->switch_name = SwitchName::findOrFail($id);
        $this->switch_name_id = $this->switch_name->id;
        $this->name = $this->switch_name->name;
    }

    public function storeSwitchName()
    {
        $validated = $this->validate();
        SwitchName::create($validated);
        $this->dispatch('refresh-list-switch-name');
        $this->successNotify(__('site.switch_name_created'));
        // $this->create_modal = false;
        $this->reset('name');
    }

    public function updateSwitchName()
    {
        $validated = $this->validate();
        $this->switch_name->update($validated);
        $this->dispatch('refresh-list-switch-name');
        $this->successNotify(__('site.switch_name_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteSwitchName($id)
    {
        $switch_name = SwitchName::findOrFail($id);
        $switch_name->delete();
        $this->dispatch('refresh-list-switch-name');
        $this->successNotify(__('site.switch_name_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteSwitchName($arr)
    {
        $switch_names = SwitchName::whereIn('id', $arr);
        $switch_names->delete();
        $this->dispatch('refresh-list-switch-name');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.switch_name_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
