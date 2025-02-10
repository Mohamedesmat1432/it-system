<?php
namespace App\Traits;

use App\Models\Subnet;
use Livewire\WithPagination;

trait SubnetTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Subnet $subnet;

    public $subnet_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:subnets,name,' . $this->subnet_id,
        ];
    }

    public function setSubnet($id)
    {
        $this->subnet = Subnet::findOrFail($id);
        $this->subnet_id = $this->subnet->id;
        $this->name = $this->subnet->name;
    }

    public function storeSubnet()
    {
        $validated = $this->validate();
        Subnet::create($validated);
        $this->dispatch('refresh-list-subnet');
        $this->successNotify(__('site.subnet_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateSubnet()
    {
        $validated = $this->validate();
        $this->subnet->update($validated);
        $this->dispatch('refresh-list-subnet');
        $this->successNotify(__('site.subnet_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteSubnet($id)
    {
        $subnet = Subnet::findOrFail($id);
        $subnet->delete();
        $this->dispatch('refresh-list-subnet');
        $this->successNotify(__('site.subnet_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteSubnet($arr)
    {
        $subnets = Subnet::whereIn('id', $arr);
        $subnets->delete();
        $this->dispatch('refresh-list-subnet');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.subnet_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
