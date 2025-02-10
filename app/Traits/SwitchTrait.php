<?php
namespace App\Traits;

use App\Models\SwitchData;
use Livewire\WithPagination;

trait SwitchTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?SwitchData $switch;

    public $switch_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:switch_date,name,' . $this->switch_id,
            'port' => 'required|string',
        ];
    }

    public function setSwitch($id)
    {
        $this->switch = SwitchData::findOrFail($id);
        $this->switch_id = $this->switch->id;
        $this->name = $this->switch->name;
        $this->port = $this->switch->port;
    }

    public function storeSwitch()
    {
        $validated = $this->validate();
        SwitchData::create($validated);
        $this->dispatch('refresh-list-switch');
        $this->successNotify(__('site.switch_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateSwitch()
    {
        $validated = $this->validate();
        $this->switch->update($validated);
        $this->dispatch('refresh-list-switch');
        $this->successNotify(__('site.switch_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteSwitch($id)
    {
        $switch = SwitchData::findOrFail($id);
        $switch->delete();
        $this->dispatch('refresh-list-switch');
        $this->successNotify(__('site.switch_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteSwitch($arr)
    {
        $switchs = SwitchData::whereIn('id', $arr);
        $switchs->delete();
        $this->dispatch('refresh-list-switch');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.switch_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
