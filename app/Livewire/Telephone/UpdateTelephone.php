<?php

namespace App\Livewire\Telephone;

use App\Traits\TelephoneTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateTelephone extends Component
{
    use TelephoneTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setTelephone($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateTelephone();
    }

    public function render()
    {
        $this->authorize('edit-telephone');

        return view('livewire.telephone.update-telephone');
    }
}
