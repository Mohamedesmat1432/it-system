<?php

namespace App\Livewire\Telephone;

use App\Traits\TelephoneTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteTelephone extends Component
{
    use TelephoneTrait;

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
        $this->deleteTelephone($this->id);
    }

    public function render()
    {
        $this->authorize('delete-telephone');

        return view('livewire.telephone.delete-telephone');
    }
}
