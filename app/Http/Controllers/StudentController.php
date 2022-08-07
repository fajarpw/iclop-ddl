<?php

namespace App\Http\Controllers;

use App\DDLClass;
use App\DDLStudent;
use App\Exercise;
use App\ExerciseQuestion;
use App\Question;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
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
        ->join('exercise_questions', 'questions.id', 'exercise_questions.id')
        ->where('exercise_questions.exercise_id', '=', $request->exercise_id)
        ->select('questions.id','questions.title', 'questions.topic','questions.dbname','questions.description','questions.required_table','questions.test_code','questions.guide','questions.no', 'exercise_questions.exercise_id')
        ->get();
        $question_count = count($questions);
        // dd($question_count);
        return view('student.question', compact('questions', 'question_count'));
    }

    public function enroll(Request $request)
    {
        $user_id = $request->user_id;
        $class_id = $request->class_id;
        //$user = User::find($user_id);
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string',
            'class_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $student = DDLStudent::updateOrCreate(
                ['student_id' => $user_id,],
                ['student_id' => $user_id, 'class_id' => $class_id]
            );
            if ($student) {
                return response()->json(['code' => 1, 'msg' => 'Berhasil enroll kelas ' . $class_id]);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            }
        }
    }
}
