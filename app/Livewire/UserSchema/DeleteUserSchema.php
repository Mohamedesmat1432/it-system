<?php

namespace App\Livewire\UserSchema;

use App\Traits\UserSchemaTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class DeleteUserSchema extends Component
{
    use UserSchemaTrait;

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
        $this->deleteUserSchema($this->id);
    }

    public function render()
    {
        $this->authorize('delete-user-schema');

        return view('livewire.user-schema.delete-user-schema');
    }
}
