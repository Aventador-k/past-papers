<?php

namespace App\Livewire;

use App\Models\PastPapers;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AllPapers extends Component
{
    public $subject;
    protected $queryString = ['subject'];
    public function render()
    {
        // dd($this->subject);
        $allpapers = PastPapers::where('subjectId' , '=' , $this->subject)->get();
        return view('livewire.all-papers' , ['papers' =>$allpapers]);
    }
}
