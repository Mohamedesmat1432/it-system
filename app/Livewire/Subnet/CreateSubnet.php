<?php

namespace App\Livewire\Subnet;

use App\Traits\SubnetTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateSubnet extends Component
{
    use SubnetTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeSubnet();
    }

    public function render()
    {
        $this->authorize('create-subnet');

        return view('livewire.subnet.create-subnet');
    }
}
