<?php

namespace App\Traits;

use App\Models\Ip;
use Livewire\WithPagination;

trait IpTrait
{
    use WithNotify, SortSearchTrait, WithPagination, ModalTrait;

    public ?Ip $ip;

    public $ip_id, $number;

    protected function rules()
    {
        return [
            'number' => 'required|string|unique:ips,number,' . $this->ip_id,
        ];
    }

    public function setIp($id)
    {
        $this->ip = Ip::findOrFail($id);
        $this->ip_id = $this->ip->id;
        $this->number = $this->ip->number;
    }

    public function storeIp()
    {
        $validated = $this->validate();
        Ip::create($validated);
        $this->dispatch('refresh-list-ip');
        $this->successNotify(__('site.ip_created'));
        // $this->create_modal = false;
        $this->reset('number');
    }

    public function updateIp()
    {
        $validated = $this->validate();
        $this->ip->update($validated);
        $this->dispatch('refresh-list-ip');
        $this->successNotify(__('site.ip_updated'));
        $this->edit_modal = false;
        $this->reset();
    }

    public function deleteIp($id)
    {
        $ip = Ip::findOrFail($id);
        $ip->delete();
        $this->dispatch('refresh-list-ip');
        $this->successNotify(__('site.ip_deleted'));
        $this->delete_modal = false;
        $this->reset();
    }

    public function bulkDeleteIp($arr)
    {
        $ips = Ip::whereIn('id', $arr);
        $ips->delete();
        $this->dispatch('refresh-list-ip');
        $this->dispatch('checkbox-clear');
        $this->successNotify(__('site.ip_delete_all'));
        $this->bulk_delete_modal = false;
        $this->reset();
    }
}
