<?php

namespace App\Traits;

use App\Models\Problem;
use App\Models\SubProblem;
use Livewire\WithPagination;

trait SubProblemTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?SubProblem $sub_problem;

    public $name, $problem_id, $sub_problem_id;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:sub_problems,name,' . $this->sub_problem_id,
            'problem_id' => 'required|string|exists:problems,id'
        ];
    }

    public function problems()
    {
        return Problem::search($this->search)->pluck('name','id')->toArray() ?? [];
    }

    public function setSubProblem($id)
    {
        $this->sub_problem = SubProblem::findOrFail($id);
        $this->sub_problem_id = $this->sub_problem->id;
        $this->name = $this->sub_problem->name;
        $this->problem_id = $this->sub_problem->problem_id;
    }

    public function storeSubProblem()
    {
        $validated = $this->validate();
        SubProblem::create($validated);
        $this->dispatch('refresh-list-sub-problem');
        $this->successNotify(__('site.sub_problem_created'));
        // $this->create_modal = false;
        $this->reset(['name', 'problem_id']);
    }

    public function updateSubProblem()
    {
        $validated = $this->validate();
        $this->sub_problem->update($validated);
        $this->dispatch('refresh-list-sub-problem');
        $this->successNotify(__('site.sub_problem_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteSubProblem($id)
    {
        $sub_problem = SubProblem::findOrFail($id);
        $sub_problem->delete();
        $this->dispatch('refresh-list-sub-problem');
        $this->successNotify(__('site.sub_problem_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteSubProblem($arr)
    {
        $sub_problems = SubProblem::whereIn('id', $arr);
        $sub_problems->delete();
        $this->dispatch('refresh-list-sub-problem');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.sub_problem_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
