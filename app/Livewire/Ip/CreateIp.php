<?php

namespace App\Livewire\Ip;

use App\Traits\IpTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateIp extends Component
{
    use IpTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeIp();
    }

    public function render()
    {
        $this->authorize('create-ip');

        return view('livewire.ip.create-ip');
    }
}
