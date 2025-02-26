<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketForward extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'ticket_forwards';

    protected $fillable = [
        'ticket_id',
        'forward_by',
        'forward_to',
        'reason',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('reason', 'like', "%{$search}%");
        });
    }
}
