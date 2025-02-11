<?php
namespace App\Traits;

use App\Models\Rack;
use Livewire\WithPagination;

trait RackTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Rack $rack;

    public $rack_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:racks,name,' . $this->rack_id,
        ];
    }

    public function setRack($id)
    {
        $this->rack = Rack::findOrFail($id);
        $this->rack_id = $this->rack->id;
        $this->name = $this->rack->name;
    }

    public function storeRack()
    {
        $validated = $this->validate();
        Rack::create($validated);
        $this->dispatch('refresh-list-rack');
        $this->successNotify(__('site.rack_created'));
        // $this->create_modal = false;
        $this->reset('name');
    }

    public function updateRack()
    {
        $validated = $this->validate();
        $this->rack->update($validated);
        $this->dispatch('refresh-list-rack');
        $this->successNotify(__('site.rack_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteRack($id)
    {
        $rack = Rack::findOrFail($id);
        $rack->delete();
        $this->dispatch('refresh-list-rack');
        $this->successNotify(__('site.rack_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteRack($arr)
    {
        $racks = Rack::whereIn('id', $arr);
        $racks->delete();
        $this->dispatch('refresh-list-rack');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.rack_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
