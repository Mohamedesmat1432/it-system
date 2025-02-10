<?php

namespace App\Livewire\Telephone;

use App\Traits\TelephoneTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateTelephone extends Component
{
    use TelephoneTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeTelephone();
    }

    public function render()
    {
        $this->authorize('create-telephone');

        return view('livewire.telephone.create-telephone');
    }
}
