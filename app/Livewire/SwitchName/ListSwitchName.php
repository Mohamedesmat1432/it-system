<?php

namespace App\Livewire\SwitchName;

use App\Models\SwitchName;
use App\Traits\SwitchNameTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListSwitchName extends Component
{
    use SwitchNameTrait;

    #[On('refresh-list-switch-name')]
    public function render()
    {
        $this->authorize('view-switch-name');

        $switch_names = SwitchName::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = SwitchName::pluck('id')->toArray();

        return view('livewire.switch-name.list-switch-name', [
            'switch_names' => $switch_names
        ]);

    }
}
