<?php

namespace App\Livewire\Subnet;

use App\Traits\SubnetTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowSubnet extends Component
{
    use SubnetTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setSubnet($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-subnet');

        return view('livewire.subnet.show-subnet');
    }
}
