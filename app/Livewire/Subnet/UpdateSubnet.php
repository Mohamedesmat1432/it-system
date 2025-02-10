<?php

namespace App\Livewire\Subnet;

use App\Traits\SubnetTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateSubnet extends Component
{
    use SubnetTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setSubnet($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateSubnet();
    }

    public function render()
    {
        $this->authorize('edit-subnet');

        return view('livewire.subnet.update-subnet');
    }
}
