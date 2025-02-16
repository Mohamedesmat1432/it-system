<?php

namespace App\Traits;

use App\Enums\TicketStatus;
use App\Models\Department;
use App\Models\Problem;
use App\Models\SubProblem;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

trait TicketTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Ticket $ticket;

    public $ticket_id, $created_by, $send_to, $problem_id,
        $sub_problem_id, $description, $file, $old_file, $status;

    protected function rules()
    {
        return [
            'created_by' => 'required|string|exists:users,id',
            'send_to' => 'required|string|exists:users,id',
            'problem_id' => 'required|string|exists:problems,id',
            'sub_problem_id' => 'required|string|exists:sub_problems,id',
            'description' => 'nullable|string',
            'file' => 'nullable|mimes:pdf,jpeg,png,jpg,gif|max:10240',
            'status'  => 'required|string|in:' . TicketStatus::Open->value . ',' . TicketStatus::InProgress->value . ',' . TicketStatus::Closed->value,
        ];
    }

    public function itUsers()
    {
        $department = Department::where('name', 'نظم المعلومات')->first();
        
        return User::where('department_id', $department->id)
            ->pluck('name', 'id')->toArray();
    }

    public function problems()
    {
        return Problem::pluck('name', 'id')->toArray();
    }

    public function subProblems()
    {
        return SubProblem::where('problem_id', $this->problem_id)->pluck('name', 'id')->toArray();
    }

    public function setTicket($id)
    {
        $this->ticket = Ticket::findOrFail($id);
        $this->ticket_id = $this->ticket->id;
        $this->created_by = $this->ticket->created_by;
        $this->send_to = $this->ticket->send_to;
        $this->problem_id = $this->ticket->problem_id;
        $this->sub_problem_id = $this->ticket->sub_problem_id;
        $this->description = $this->ticket->description;
        $this->old_file = $this->ticket->file;
        $this->status = $this->ticket->status;
    }

    public function storeTicket()
    {
        $validated = $this->validate();
        $validated['created_by'] = auth()->user()->id;
        $validated['file'] = $this->file ? $this->file->store('tickets', 'public') : null;
        $validated['status'] = TicketStatus::Open->value;
        Ticket::create($validated);
        $this->dispatch('refresh-list-ticket');
        $this->successNotify(__('site.ticket_created'));
        // $this->create_modal = false;
        $this->reset([
            'created_by',
            'send_to',
            'problem_id',
            'sub_problem_id',
            'description',
            'file',
            'status'
        ]);
    }

    public function updateTicket()
    {
        $validated = $this->validate();
        $validated['created_by'] = auth()->user()->id;
        $filePath = $this->file ? $this->file->store('tickets', 'public') : $this->old_file;

        if ($this->file && $this->ticket->file) {
            Storage::disk('public')->delete($this->ticket->file);
        }

        $validated['file'] = $filePath;
        $validated['status'] = $this->status;
        $this->ticket->update($validated);
        $this->dispatch('refresh-list-ticket');
        $this->successNotify(__('site.ticket_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteTicket($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->file && Storage::disk('public')->delete($ticket->file);
        $ticket->delete();
        $this->dispatch('refresh-list-ticket');
        $this->successNotify(__('site.ticket_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteTicket($arr)
    {
        $tickets = Ticket::whereIn('id', $arr);
        $tickets->each(fn($ticket) => $ticket->file && Storage::disk('public')->delete($ticket->file));
        $tickets->delete();
        $this->dispatch('refresh-list-ticket');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.ticket_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
