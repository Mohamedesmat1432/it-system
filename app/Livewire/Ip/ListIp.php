<?php

namespace App\Livewire\Ip;

use App\Models\Ip;
use App\Traits\IpTrait;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.app')]
class ListIp extends Component
{
    use IpTrait;

    #[On('refresh-list-ip')]
    public function render()
    {
        $this->authorize('view-ip');

        $ips = Ip::search($this->search)
            ->orderBy($this->sort_by, $this->sort_asc ? 'ASC' : 'DESC')
            ->paginate($this->page_element);

        $this->checkbox_all = Ip::pluck('id')->toArray();

        return view('livewire.ip.list-ip', [
            'ips' => $ips,
        ]);
    }
}
