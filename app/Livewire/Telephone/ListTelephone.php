<?php

namespace App\Livewire\Telephone;

use App\Models\Telephone;
use App\Traits\TelephoneTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListTelephone extends Component
{
    use TelephoneTrait;

    #[On('refresh-list-telephone')]
    public function render()
    {
        $this->authorize('view-telephone');

        $telephones = Telephone::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Telephone::pluck('id')->toArray();

        return view('livewire.telephone.list-telephone', [
            'telephones' => $telephones,
        ]);
    }
}
