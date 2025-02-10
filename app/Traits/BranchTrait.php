<?php

namespace App\Traits;

use App\Models\Branch;
use Livewire\WithPagination;

trait BranchTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Branch $branch;

    public $branch_id, $name;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:branchs,name,' . $this->branch_id,
        ];
    }

    public function setBranch($id)
    {
        $this->branch = Branch::findOrFail($id);
        $this->branch_id = $this->branch->id;
        $this->name = $this->branch->name;
    }

    public function storeBranch()
    {
        $validated = $this->validate();
        Branch::create($validated);
        $this->dispatch('refresh-list-branch');
        $this->successNotify(__('site.branch_created'));
        $this->create_modal = false;
        $this->reset();
    }

    public function updateBranch()
    {
        $validated = $this->validate();
        $this->branch->update($validated);
        $this->dispatch('refresh-list-branch');
        $this->successNotify(__('site.branch_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteBranch($id)
    {
        $branch = Branch::findOrFail($id);
        $branch->delete();
        $this->dispatch('refresh-list-branch');
        $this->successNotify(__('site.branch_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteBranch($arr)
    {
        $branchs = Branch::whereIn('id', $arr);
        $branchs->delete();
        $this->dispatch('refresh-list-branch');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.branch_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
