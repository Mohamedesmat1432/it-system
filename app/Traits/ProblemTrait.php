<?php

namespace App\Traits;

use App\Models\Problem;
use Livewire\WithPagination;

trait ProblemTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Problem $problem;

    public $name, $problem_id;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:problems,name,' . $this->problem_id,
        ];
    }

    public function setProblem($id)
    {
        $this->problem = Problem::findOrFail($id);
        $this->problem_id = $this->problem->id;
        $this->name = $this->problem->name;
    }

    public function storeProblem()
    {
        $validated = $this->validate();
        Problem::create($validated);
        $this->dispatch('refresh-list-problem');
        $this->successNotify(__('site.problem_created'));
       // $this->create_modal = false;
       $this->reset(['name']);
    }

    public function updateProblem()
    {
        $validated = $this->validate();
        $this->problem->update($validated);
        $this->dispatch('refresh-list-problem');
        $this->successNotify(__('site.problem_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteProblem($id)
    {
        $problem = Problem::findOrFail($id);
        $problem->delete();
        $this->dispatch('refresh-list-problem');
        $this->successNotify(__('site.problem_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteProblem($arr)
    {
        $problems = Problem::whereIn('id', $arr);
        $problems->delete();
        $this->dispatch('refresh-list-problem');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.problem_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
