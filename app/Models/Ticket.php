<?php

namespace App\Models;

use App\Enums\TicketStatus;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'tickets';

    protected $fillable = [
        'created_by',
        'assigned_to',
        'problem_id',
        'sub_problem_id',
        'description',
        'file',
        'ticket_status',
        'notes',
    ];

    protected $casts = [
        'ticket_status' => TicketStatus::class,
    ];

    public function problem()
    {
        return $this->belongsTo(Problem::class, 'problem_id');
    }

    public function subProblem()
    {
        return $this->belongsTo(SubProblem::class, 'sub_problem_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('description', 'like', "%{$search}%")
                ->orWhereHas('problem', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })->orWhereHas('subProblem', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        });
    }
}
