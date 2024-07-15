<?php

namespace App\Livewire;

use App\Models\PastPapers;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AllPapers extends Component
{
    public $search;
    public function render()
    {

        $allpapers = PastPapers::all();
        return view('livewire.all-papers' , ['papers' =>$allpapers]);
    }
}
