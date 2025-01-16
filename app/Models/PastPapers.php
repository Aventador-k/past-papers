<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastPapers extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'paper_url',
        'year',
        'subjectId',
        'classId',
        'price',
    ];

    public function grade()
    {
        return $this->belongsTo(GradeClass::class ,'classId');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subjectId');
    }

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
}
