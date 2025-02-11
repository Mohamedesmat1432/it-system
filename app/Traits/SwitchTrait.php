<?php

namespace App\Traits;

use App\Models\SwitchData;
use App\Models\SwitchName;
use Livewire\WithPagination;

trait SwitchTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?SwitchData $switch;

    public $switch_id, $port, $switch_name_id;

    protected function rules()
    {
        return [
            'port' => 'required|string',
            'switch_name_id' => 'required|string|exists:switch_names,id'
        ];
    }

    public function switchNames()
    {
        return SwitchName::get() ?? [];
    }

    public function setSwitch($id)
    {
        $this->switch = SwitchData::findOrFail($id);
        $this->switch_id = $this->switch->id;
        $this->port = $this->switch->port;
        $this->switch_name_id = $this->switch->switch_name_id;
    }

    public function storeSwitch()
    {
        $validated = $this->validate();
        SwitchData::create($validated);
        $this->dispatch('refresh-list-switch');
        $this->successNotify(__('site.switch_created'));
        $this->create_modal = false;
        // $this->create_modal = false;
        $this->reset(['port', 'switch_name_id']);
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
