<?php

namespace App\Livewire\Subnet;

use App\Models\Subnet;
use App\Traits\SubnetTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListSubnet extends Component
{
    use SubnetTrait;

    #[On('refresh-list-subnet')]
    public function render()
    {
        $this->authorize('view-subnet');

        $subnets = Subnet::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Subnet::pluck('id')->toArray();

        return view('livewire.subnet.list-subnet', [
            'subnets' => $subnets,
        ]);
    }
}
