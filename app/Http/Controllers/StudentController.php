<?php

namespace App\Http\Controllers;

use App\DDLClass;
use App\DDLStudent;
use App\Exercise;
use App\ExerciseQuestion;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function dashboard()
    {
        $classes = DDLClass::all();
        return view('student.dashboard', compact('classes'));
    }

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
        $questions = Question::where('id', '=', $request->id)->get();
        $question_count = count($questions);
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
