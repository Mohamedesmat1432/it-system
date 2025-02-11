<?php

namespace App\Livewire\UserSchema;

use App\Traits\UserSchemaTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class UpdateUserSchema extends Component
{
    use UserSchemaTrait;

    #[On('edit-modal')]
    public function confirmEdit($id)
    {
        $this->reset();
        $this->resetValidation();
        $this->setUserSchema($id);
        $this->edit_modal = true;
    }

    public function save()
    {
        $this->updateUserSchema();
    }

    public function render()
    {
        $this->authorize('edit-user-schema');

        return view('livewire.user-schema.update-user-schema');
    }
}
