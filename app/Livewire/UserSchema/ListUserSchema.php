<?php

namespace App\Livewire\UserSchema;

use App\Models\UserSchema;
use App\Traits\UserSchemaTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListUserSchema extends Component
{
    use UserSchemaTrait;

    #[On('refresh-list-user-schema')]
    public function render()
    {
        $this->authorize('view-user-schema');

        $user_schemas = UserSchema::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = UserSchema::pluck('id')->toArray();

        return view('livewire.user-schema.list-user-schema', [
            'user_schemas' => $user_schemas,
        ]);
    }
}
