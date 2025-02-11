<?php

namespace App\Traits;

use App\Enums\Floor;
use App\Models\Branch;
use App\Models\Ip;
use App\Models\Patch;
use App\Models\Rack;
use App\Models\Subnet;
use App\Models\SwitchData;
use App\Models\Telephone;
use App\Models\User;
use App\Models\UserSchema;
use Livewire\WithPagination;

trait UserSchemaTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?UserSchema $user_schema;

    public $user_schema_id, $user_id, $branch_id, $floor, $rack_id, $patch_id,
        $subnet_id, $ip_id, $telephone_id, $switch_id, $notes;

    protected function rules()
    {
        return [
            'user_id' => 'required|numeric|exists:users,id',
            'floor' => 'required|string',
            'branch_id' => 'nullable|string|exists:branches,id',
            'rack_id' => 'nullable|string|exists:racks,id',
            'patch_id' => 'nullable|string|exists:patches,id',
            'subnet_id' => 'nullable|string|exists:subnets,id',
            'ip_id' => 'nullable|string|exists:ips,id',
            'telephone_id' => 'nullable|string|exists:telephones,id',
            'switch_id' => 'nullable|string|exists:switch_data,id',
            'notes' => 'nullable|string',
        ];
    }

    public function users()
    {
        $userIds = ($this->user_schema_id)
            ? UserSchema::whereNot('user_id', $this->user_schema->user_id)->pluck('user_id')->toArray()
            : UserSchema::pluck('user_id')->toArray();

        return User::whereNotIn('id', $userIds)->get() ?? [];
    }

    public function branches()
    {
        return Branch::get() ?? [];
    }

    public function racks()
    {
        return Rack::get();
    }

    public function patches()
    {
        $patchIds = ($this->user_schema_id)
            ? UserSchema::whereNot('patch_id', $this->user_schema->patch_id)->pluck('patch_id')->toArray()
            : UserSchema::pluck('patch_id')->toArray();

        return Patch::whereNotIn('id', $patchIds)->get() ?? [];
    }

    public function subnets()
    {
        return Subnet::get();
    }

    public function ips()
    {
        $ipIds = ($this->user_schema_id)
            ? UserSchema::whereNot('ip_id', $this->user_schema->ip_id)->pluck('ip_id')->toArray()
            : UserSchema::pluck('ip_id')->toArray();

        return Ip::whereNotIn('id', $ipIds)->get();
    }

    public function telephones()
    {
        return Telephone::get();
    }

    public function switchs()
    {
        $switchIds = ($this->user_schema_id)
            ? UserSchema::whereNot('switch_id', $this->user_schema->switch_id)->pluck('switch_id')->toArray()
            : UserSchema::pluck('switch_id')->toArray();

        return SwitchData::whereNotIn('id', $switchIds)->get() ?? [];
    }

    public function floors()
    {
        return Floor::cases() ?? [];
    }

    public function setUserSchema($id)
    {
        $this->user_schema = UserSchema::findOrFail($id);
        $this->user_schema_id = $this->user_schema->id;
        $this->user_id = $this->user_schema->user_id;
        $this->branch_id = $this->user_schema->branch_id;
        $this->floor = $this->user_schema->floor;
        $this->rack_id = $this->user_schema->rack_id;
        $this->patch_id = $this->user_schema->patch_id;
        $this->subnet_id = $this->user_schema->subnet_id;
        $this->ip_id = $this->user_schema->ip_id;
        $this->telephone_id = $this->user_schema->telephone_id;
        $this->switch_id = $this->user_schema->switch_id;
        $this->notes = $this->user_schema->notes;
    }

    public function storeUserSchema()
    {
        $validated = $this->validate();
        UserSchema::create($validated);
        $this->dispatch('refresh-list-user-schema');
        $this->successNotify(__('site.user_schema_created'));
        // $this->create_modal = false;
        $this->reset([
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
        ]);
    }

    public function updateUserSchema()
    {
        $validated = $this->validate();
        $this->user_schema->update($validated);
        $this->dispatch('refresh-list-user-schema');
        $this->successNotify(__('site.user_schema_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteUserSchema($id)
    {
        $user_schema = UserSchema::findOrFail($id);
        $user_schema->delete();
        $this->dispatch('refresh-list-user-schema');
        $this->successNotify(__('site.user_schema_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteUserSchema($arr)
    {
        $user_schemas = UserSchema::whereIn('id', $arr);
        $user_schemas->delete();
        $this->dispatch('refresh-list-user-schema');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.user_schema_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
