<?php

namespace App\Livewire\UserSchema;

use App\Traits\UserSchemaTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ShowUserSchema extends Component
{
    use UserSchemaTrait;

    #[On('show-modal')]
    public function show($id)
    {
        $this->reset();
        $this->setUserSchema($id);
        $this->show_modal = true;
    }

    public function render()
    {
        $this->authorize('show-user-schema');

        return view('livewire.user-schema.show-user-schema');
    }
}
