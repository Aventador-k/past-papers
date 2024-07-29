<?php

namespace App\Livewire;

use App\Models\PastPapers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AllPapers extends Component
{
    public $subject;
    public $grade;
    public $searchWord = "";
    protected $queryString = ['subject' , 'grade'];
    public function render()
    {
        $allpapers = DB::table('past_papers')
        ->join('subjects', 'past_papers.subjectId', '=', 'subjects.id')
        ->join('grade_classes', 'past_papers.classId', '=', 'grade_classes.id')
        ->where([
            ['past_papers.subjectId', '=', $this->subject],
            ['past_papers.classId', '=', $this->grade],
            ['past_papers.title', 'like', "%".$this->searchWord."%"],
        ])
        ->select('past_papers.*', 'subjects.*', 'grade_classes.*')
        ->get();
        // dd($allpapers);
        return view('livewire.all-papers' , ['papers' => $allpapers]);
    }
}
