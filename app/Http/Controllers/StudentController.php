<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\ExerciseQuestion;
use App\Question;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard');
    }

    public function exercise()
    {
        $exercises = Exercise::all();
        return view('student.exercise.exercise-list', compact('exercises'));
    }

    public function exercise_question(Request $request)
    {
        $exercise_questions = ExerciseQuestion::where('exercise_id', '=', $request->id)->get();
        return view('student.exercise.exercise-question', compact('exercise_questions'));
    }

    public function exercise_question_detail(Request $request){
        $questions = Question::where('id', '=', $request->id)->get();
        return view('student.question', compact('questions'));
    }

}
