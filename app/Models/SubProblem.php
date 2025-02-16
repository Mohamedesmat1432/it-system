<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProblem extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'sub_problems';

    protected $fillable = [
        'name',
        'problem_id',
    ];

    public function problem()
    {
        return $this->belongsTo(Problem::class, 'problem_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'sub_problem_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%")
                ->whereHas('problem', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        });
    }
}
