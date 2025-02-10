<?php

namespace App\Livewire\Ip;

use App\Traits\IpTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateIp extends Component
{
    use IpTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setIp($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateIp();
    }

    public function render()
    {
        $this->authorize('edit-ip');

        return view('livewire.ip.update-ip');
    }
}
