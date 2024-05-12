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
        'subjectId'
    ];
}
