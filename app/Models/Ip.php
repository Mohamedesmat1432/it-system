<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'ips';

    protected $fillable = [
        'number',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('number', 'like', "%{$search}%");
        });
    }
}
