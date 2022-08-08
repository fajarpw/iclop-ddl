<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $table = 'exam_questions';

    protected $fillable = [
        'exam_id', 'question_id', 'no'
    ];

    public function exam()
    {
        return $this->belongsTo('App\Task', 'exam_id');
    }

    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }
}
