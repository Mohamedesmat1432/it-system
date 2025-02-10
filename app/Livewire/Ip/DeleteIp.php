<?php

namespace App\Livewire\Ip;

use App\Traits\IpTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteIp extends Component
{
    use IpTrait;

    #[Locked]
    public $id, $name;

    #[On('delete-modal')]
    public function confirmDelete($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->delete_modal = true;
    }

    public function delete()
    {
        $this->deleteIp($this->id);
    }

    public function render()
    {
        $this->authorize('delete-ip');

        return view('livewire.ip.delete-ip');
    }
}
