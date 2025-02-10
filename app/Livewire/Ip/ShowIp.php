<?php

namespace App\Livewire\Ip;

use App\Traits\IpTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowIp extends Component
{
    use IpTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setIp($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-ip');

        return view('livewire.ip.show-ip');
    }
}
