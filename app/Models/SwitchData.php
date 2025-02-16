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
        'port',
        'switch_name_id'
    ];

    public function userSchema()
    {
        return $this->hasMany(UserSchema::class, 'user_id');
    }

    public function switchName()
    {
        return $this->belongsTo(SwitchName::class, 'switch_name_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query->where('port', 'like', "%{$search}%")
                ->whereHas('switchName', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        });
    }
}
