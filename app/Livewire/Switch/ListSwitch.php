<?php

namespace App\Livewire\Switch;

use App\Models\SwitchData;
use App\Traits\SwitchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListSwitch extends Component
{
    use SwitchTrait;

    #[On('refresh-list-switch')]
    public function render()
    {
        $this->authorize('view-switch');

        $switchs = SwitchData::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = SwitchData::pluck('id')->toArray();

        return view('livewire.switch.list-switch', [
            'switchs' => $switchs,
        ]);
    }
}
