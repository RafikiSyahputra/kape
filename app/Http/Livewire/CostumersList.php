<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CostumersList extends Component
{
    public bool $all = true;

    public function render()
    {
        $customers = User::where("auth","Customer")->get() ?? [];
        $all = $this->all;
        return view('livewire.costumers-list',compact('all',"customers"));
    }

    public function setall()
    {

        $this->all = !$this->all;
    }
}
