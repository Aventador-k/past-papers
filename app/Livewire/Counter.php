<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function inc(){
        $this->count+=1;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
