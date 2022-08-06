<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExerciseQuestion extends Model
{
    protected $table = 'exercise_questions';

    protected $fillable = [
        'exercise_id', 'question_id',
    ];

    public function exercise()
    {
        return $this->belongsTo('App\Exercise', 'exercise_id');
    }

    public function questions()
    {
        return $this->belongsTo('App\Question', 'question_id');
    }

}
