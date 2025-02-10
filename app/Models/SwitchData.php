<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SwitchData extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'switch_data';

    protected $fillable = [
        'name',
        'port'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('port', 'like', "%{$search}%");
        });
    }
}
