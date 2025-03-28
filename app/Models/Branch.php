<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'branches';

    protected $fillable = [
        'name',
    ];

    public function userSchema()
    {
        return $this->hasMany(UserSchema::class, 'branch_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");
        });
    }
}
