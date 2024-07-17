<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function past_paper()
    {
        return $this->hasMany(PastPapers::class);
    }

    public function grade ()
    {
        return $this->belongsToMany(GradeClass::class , "subject_grades" , "subjectId" , "gradeId");
    }
}
