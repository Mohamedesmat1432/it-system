<?php

namespace App\Livewire\Patch;

use App\Models\Patch;
use App\Traits\PatchTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListPatch extends Component
{
    use PatchTrait;

    #[On('refresh-list-patch')]
    public function render()
    {
        $this->authorize('view-patch');

        $patchs = Patch::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Patch::pluck('id')->toArray();

        return view('livewire.patch.list-patch', [
            'patchs' => $patchs,
        ]);
    }
}
