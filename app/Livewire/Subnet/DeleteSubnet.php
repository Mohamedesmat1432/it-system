<?php

namespace App\Livewire\Subnet;

use App\Traits\SubnetTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteSubnet extends Component
{
    use SubnetTrait;

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
        $this->deleteSubnet($this->id);
    }

    public function render()
    {
        $this->authorize('delete-subnet');

        return view('livewire.subnet.delete-subnet');
    }
}
