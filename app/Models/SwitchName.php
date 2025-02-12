<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwitchName extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'switch_names';

    protected $fillable = [
        'name',
        'ip',
        'password',
        'password_enable',
    ];

    public function switchData()
    {
        return $this->hasMany(SwitchData::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('ip', 'like', "%{$search}%")
                ->orWhere('password', 'like', "%{$search}%")
                ->orWhere('password_enable', 'like', "%{$search}%");
        });
    }
}
