<?php

namespace App\Http\Livewire;

use App\Models\House;
use Livewire\Component;
use App\Models\Role;

class Search extends Component
{
    public $search='';

    public function render()
    {
        $datalist = House::where('title','like','%'.$this->search.'%')->get();

        return view('livewire.search',['datalist'=>$datalist,'query'=>$this->search]);
    }
}
