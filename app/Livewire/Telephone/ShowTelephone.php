<?php

namespace App\Livewire\Telephone;

use App\Traits\TelephoneTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowTelephone extends Component
{
    use TelephoneTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setTelephone($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-telephone');

        return view('livewire.telephone.show-telephone');
    }
}
