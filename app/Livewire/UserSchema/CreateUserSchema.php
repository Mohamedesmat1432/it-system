<?php

namespace App\Livewire\UserSchema;

use App\Traits\UserSchemaTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class CreateUserSchema extends Component
{
    use UserSchemaTrait;

    #[On('create-modal')]
    public function createModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->create_modal = true;
    }

    public function save()
    {
        $this->storeUserSchema();
    }

    public function render()
    {
        $this->authorize('create-user-schema');

        return view('livewire.user-schema.create-user-schema');
    }
}
