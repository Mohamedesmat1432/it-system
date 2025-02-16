<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patch extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'patches';

    protected $fillable = [
        'port',
    ];

    public function userSchema()
    {
        return $this->hasMany(UserSchema::class, 'patch_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('port', 'like', "%{$search}%");
        });
    }
}
