<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'problems';

    protected $fillable = [
        'name',
    ];

    public function subProblems()
    {
        return $this->hasMany(SubProblem::class, 'sub_problem_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'problem_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('id', 'like', "%{$search}%");
        });
    }
}
