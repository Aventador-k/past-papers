<?php

namespace App\Livewire;

use App\Models\GradeClass;
use App\Models\PastPapers;
use Livewire\WithFileUploads;
use App\Models\Subject;
use Carbon\Carbon;
use Livewire\Component;

class UploadPapers extends Component
{
    use WithFileUploads;

    public $title = "";
    public $year = "";
    public $subjectId;
    public $price;
    public $paper;
    public $classId;
    public $uploading = false;


    public function save()
    {

        if ($this->uploading) {
            $this->addError('paper', 'Please wait until the file is uploaded.');
            return;
        }

        $this->uploading = false;

        $validatedData = $this->validate([
            'title' => 'required|string',
            'year' => 'required|integer',
            'paper' => 'required|file|mimes:pdf',
            'price' => 'required',
            'classId' => 'required'
        ], [
            'paper.required' => 'Please select a paper file.',
            'paper.mimes' => 'The paper must be a PDF file.',
        ]);
        $paper_file_name = Carbon::now()->format('YmdHis') . '-' . $this->paper->getClientOriginalName();
        $paper_path = $this->paper->storeAs('public/papers', $paper_file_name);

        $all_data = [
            'title' =>$this->title,
            'year' => $this->year,
            'classId' => $this->classId,
            'subjectId' => $this->subjectId,
            'paper_url' => $paper_path,
            'price' => $this->price,
            'classId' => $this->classId
        ];

        $video = PastPapers::create($all_data);

        session()->flash('message', 'Paper uploaded successfully!');

        return redirect("/");
    }

    public function updatedPaper($val)
    {
        $this->uploading = true;
        $this->uploading = false;
    }
    public function render()
    {
        $subjects = Subject::all();
        $classes = GradeClass::all();

        if (empty($this->subjectId) && $subjects->isNotEmpty()) {
            $this->subjectId = $subjects->first()->id;
        }

        if (empty($this->classId) && $classes->isNotEmpty()) {
            $this->classId = $classes->first()->id;
        }

        $currentYear = date('Y');
        $this->year = $currentYear;
        // $this->subjectId = $subjects[0]->id;
        // $this->classId = $classes[0]->id;
        // $this->year = Carbon::now()->year;
        return view('livewire.upload-papers', ['subjects' => $subjects , 'classes' => $classes]);
    }
}
