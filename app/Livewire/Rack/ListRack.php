<?php

namespace App\Livewire\Rack;

use App\Models\Rack;
use App\Traits\RackTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListRack extends Component
{
    use RackTrait;

    #[On('refresh-list-rack')]
    public function render()
    {
        $this->authorize('view-rack');

        $racks = Rack::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Rack::pluck('id')->toArray();

        return view('livewire.rack.list-rack', [
            'racks' => $racks,
        ]);
    }
}
