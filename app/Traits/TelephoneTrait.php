<?php
namespace App\Traits;

use App\Models\Telephone;
use Livewire\WithPagination;

trait TelephoneTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Telephone $telephone;

    public $telephone_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:telephones,name,' . $this->telephone_id,
        ];
    }

    public function setTelephone($id)
    {
        $this->telephone = Telephone::findOrFail($id);
        $this->telephone_id = $this->telephone->id;
        $this->name = $this->telephone->name;
    }

    public function storeTelephone()
    {
        $validated = $this->validate();
        Telephone::create($validated);
        $this->dispatch('refresh-list-telephone');
        $this->successNotify(__('site.telephone_created'));
        // $this->create_modal = false;
        $this->reset('name');
    }

    public function updateTelephone()
    {
        $validated = $this->validate();
        $this->telephone->update($validated);
        $this->dispatch('refresh-list-telephone');
        $this->successNotify(__('site.telephone_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteTelephone($id)
    {
        $telephone = Telephone::findOrFail($id);
        $telephone->delete();
        $this->dispatch('refresh-list-telephone');
        $this->successNotify(__('site.telephone_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteTelephone($arr)
    {
        $telephones = Telephone::whereIn('id', $arr);
        $telephones->delete();
        $this->dispatch('refresh-list-telephone');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.telephone_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
