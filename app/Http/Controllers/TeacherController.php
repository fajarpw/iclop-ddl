<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    public function dashboard()
    {
        return view('teacher.dashboard');
    }

    public function questions()
    {
        return view('teacher.questions');
    }

    public function questionsList()
    {
        $questions = Question::all();
        return DataTables::of($questions)
            ->addColumn('actions', function ($row) {
                return
            '<div class="btn-group" role="group">
            <button id="edit_exercise_btn" type="button" class="btn btn-default" data-id="' . $row['id'] . '">Edit</button>
            <button id="delete_exercise_btn"  type="button" class="btn btn-default" data-id="' . $row['id'] . '">Delete</button>
            </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function exercises()
    {
        return view('teacher.exercises');
    }
}
