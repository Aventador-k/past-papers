<?php

namespace App\Livewire;

use Livewire\Component;

class GradeComponent extends Component
{
    public $grade_name;
    public $gradeId = 1;
    public function render()
    {
        return view('livewire.grade-component');
    }
}
