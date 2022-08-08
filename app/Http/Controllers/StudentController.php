<?php

namespace App\Http\Controllers;

use App\DDLClass;
use App\DDLStudent;
use App\Exercise;
use App\ExerciseQuestion;
use App\Question;
use App\Submission;
use App\Task;
use App\TaskQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //Home
    public function dashboard()
    {
        return view('student.dashboard');
    }
    // Nilai
    public function resultList()
    {
        $exercises = Exercise::all();
        return view('student.result.result-list', compact('exercises'));
    }

    public function exerciseResult(Request $request)
    {
        // $submissons = Submission::where('student_id', '=', Auth::user()->id)->get();
        $submissons = DB::table('submissions')
            ->where('student_id', '=', Auth::user()->id)
            ->join('questions', 'submissions.question_id', 'questions.id')
            ->join('exercise_questions', 'questions.id', 'exercise_questions.question_id')
            ->where('exercise_questions.exercise_id', '=', $request->id)
            ->select('questions.title', 'submissions.status', 'submissions.solution')
            ->get();
        return view('student.result.exercise-result', compact('submissons'));
    }

    // Latihan
    public function exercise()
    {
        $exercises = Exercise::all();
        return view('student.exercise.exercise-list', compact('exercises'));
    }

    public function exercise_question(Request $request)
    {
        $exercise_questions = ExerciseQuestion::where('exercise_id', '=', $request->id)->orderBy('id')->get();
        return view('student.exercise.exercise-question', compact('exercise_questions'));
    }

    public function exercise_question_detail(Request $request)
    {
        //$questions = Question::where('id', '=', $request->id)->get();
        $questions = DB::table('questions')
            ->where('questions.id', '=', $request->question_id)
            ->join('exercise_questions', 'questions.id','=', 'exercise_questions.question_id')
            ->where('exercise_questions.exercise_id', '=', $request->exercise_id)
            ->select('questions.id', 'questions.title', 'questions.topic', 'questions.dbname', 'questions.description', 'questions.required_table', 'questions.test_code', 'questions.guide', 'exercise_questions.no', 'exercise_questions.exercise_id')
            ->get();
        $question_count = count($questions);
        // dd($question_count);
        return view('student.question', compact('questions', 'question_count'));
    }

    //Tugas
    public function task()
    {
        $tasks = Task::all();
        return view('student.task.task-list', compact('tasks'));
    }

    public function task_question(Request $request)
    {
        $task_questions = TaskQuestion::where('task_id', '=', $request->id)->orderBy('id')->get();
        return view('student.task.task-question', compact('task_questions'));
    }

    public function task_question_detail(Request $request)
    {
        //$questions = Question::where('id', '=', $request->id)->get();
        $questions = DB::table('questions')
            ->where('questions.id', '=', $request->question_id)
            ->join('task_questions', 'questions.id','=', 'task_questions.question_id')
            ->where('task_questions.task_id', '=', $request->task_id)
            ->select('questions.id', 'questions.title', 'questions.topic', 'questions.dbname', 'questions.description', 'questions.required_table', 'questions.test_code', 'questions.guide', 'task_questions.no', 'task_questions.task_id')
            ->get();
        $question_count = count($questions);
        // dd($question_count);
        return view('student.question', compact('questions', 'question_count'));
    }
}
