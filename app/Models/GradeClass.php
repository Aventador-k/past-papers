<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function past_paper()
    {
        return $this->hasMany(GradeClass::class);
    }

    public function subject()
    {
        return $this->belongsToMany(Subject::class , "subject_grades" , "subjectId" , "gradeId");
    }
}
