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
        $allpapers = PastPapers::with(['subject', 'grade'])
        ->where('title', 'like', '%' . $this->search . '%')
        ->orWhereHas('subject', function($query) {
            $query->where('name', 'like', '%' . $this->search . '%');
        })
        ->orWhere('year', 'like', '%' . $this->search . '%')
        ->orWhereHas('grade', function($query) {
            $query->where('name', 'like', '%' . $this->search. '%');
        })
        ->get();
        Log::debug($allpapers);
        return view('livewire.all-papers' , ['papers' =>$allpapers]);
    }
}
