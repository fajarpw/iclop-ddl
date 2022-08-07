<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'submissions';

    protected $fillable = [
        'student_id', 'question_id', 'status', 'solution'
    ];

    public function questions()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }
}
