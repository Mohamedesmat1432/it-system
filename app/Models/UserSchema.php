<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSchema extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'user_schemas';

    protected $fillable = [
        'user_id',
        'floor',
        'branch_id',
        'rack_id',
        'patch_id',
        'subnet_id',
        'ip_id',
        'telephone_id',
        'switch_id',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function rack()
    {
        return $this->belongsTo(Rack::class, 'rack_id');
    }

    public function patch()
    {
        return $this->belongsTo(Patch::class, 'patch_id');
    }

    public function subnet()
    {
        return $this->belongsTo(Subnet::class, 'subnet_id');
    }

    public function ip()
    {
        return $this->belongsTo(Ip::class, 'ip_id');
    }

    public function telephone()
    {
        return $this->belongsTo(Telephone::class, 'telephone_id');
    }

    public function switch()
    {
        return $this->belongsTo(SwitchData::class, 'switch_id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->when($search, function ($query) use ($search) {
            $query
                ->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                })
                ->orWhereHas('branch', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('user.department', function ($query) use ($search) {
                    $query->where('name_ar', 'like', "%{$search}%")
                        ->orWhere('name_en', 'like', "%{$search}%");
                })
                ->orWhereHas('switch', function ($query) use ($search) {
                    $query->where('port', 'like', "%{$search}%");
                })
                ->orWhereHas('switch.switchName', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('patch', function ($query) use ($search) {
                    $query->where('port', 'like', "%{$search}%");
                })
                ->orWhereHas('ip', function ($query) use ($search) {
                    $query->where('number', 'like', "%{$search}%");
                })
                ->orWhereHas('subnet', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->orWhereHas('telephone', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
        });
    }
}
