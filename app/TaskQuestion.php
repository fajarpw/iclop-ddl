<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskQuestion extends Model
{
    protected $table = 'task_questions';

    protected $fillable = [
        'task_id', 'question_id', 'no'
    ];

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }

    public function question()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }
}
