<?php

namespace App\Livewire\UserSchema;

use App\Traits\UserSchemaTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class BulkDeleteUserSchema extends Component
{
    use UserSchemaTrait;
    public $count;

    #[On('bulk-delete-modal')]
    public function confirmDelete($arr)
    {
        $this->checkbox_arr = json_decode($arr);
        $this->count = count($this->checkbox_arr);
        $this->bulk_delete_modal = true;
    }

    public function delete()
    {
        $this->bulkDeleteUserSchema($this->checkbox_arr);
    }

    public function render()
    {
        $this->authorize('bulk-delete-user-schema');

        return view('livewire.user-schema.bulk-delete-user-schema');
    }
}
