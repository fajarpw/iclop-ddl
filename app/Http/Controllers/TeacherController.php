<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Question;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
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
            <button id="editQuestion" type="button" class="btn btn-primary btn-block" data-id="' . $row['id'] . '">
            <i class="fa fa-edit"></i>
            </button> 
            </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addQuestion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'topic' => 'required|string',
            'dbname' => 'required|string',
            'description' => 'required|string',
            'required_table' => 'string',
            'test_code' => 'required|string',
            'guidance' => 'required|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $path = 'ddl_guidance/';
            $file = $request->file('guidance');
            $file_name = $file->getClientOriginalName();

            $upload = $file->storeAs($path, $file_name, 'public');

            if ($upload) {
                Question::insert([
                    'title' => $request->title,
                    'topic' => $request->topic,
                    'dbname' => $request->dbname,
                    'description' => $request->description,
                    'required_table' => $request->required_table,
                    'test_code' => $request->test_code,
                    'guide' => $file_name,
                ]);
                return response()->json(['code' => 1, 'msg' => 'BERHASIL menambahkan soal baru.']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'GAGAL menambahkan soal baru.']);
            }
        }
    }

    public function detailQuestion(Request $request)
    {
        $questionDetail = Question::find($request->question_id);
        return response()->json(['code' => 1, 'details' => $questionDetail]);
    }

    public function updateQuestion(Request $request)
    {
        $question_id = $request->qid;
        $task = Question::find($question_id);
        $path = 'ddl_guidance/';

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'topic' => 'required|string',
            'dbname' => 'required|string',
            'description' => 'required|string',
            'test_code' => 'required|string',
            'guidance_update' => 'mimes:pdf|max:2048|unique:questions,guide',
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if ($request->hasFile('guidance_update')) {
                $file_path = $path . $task->guidance;
                if ($task->guidance != null && Storage::disk('public')->exists($file_path)) {
                    Storage::disk('public')->delete($file_path);
                }
                $file = $request->file('guidance_update');
                $file_name = $file->getClientOriginalName();
                $upload = $file->storeAs($path, $file_name, 'public');

                if ($upload) {
                    $task->update([
                        'title' => $request->title,
                        'topic' => $request->topic,
                        'dbname' => $request->dbname,
                        'description' => $request->description,
                        'required_table' => $request->required_table,
                        'test_code' => $request->test_code,
                        'guide' => $file_name,
                    ]);
                    return response()->json(['code' => 1, 'msg' => 'BERHASIL memperbarui data soal.']);
                }
            } else {
                $task->update([
                    'title' => $request->title,
                    'topic' => $request->topic,
                    'dbname' => $request->dbname,
                    'description' => $request->description,
                    'required_table' => $request->required_table,
                    'test_code' => $request->test_code,
                ]);
                return response()->json(['code' => 1, 'msg' => 'BERHASIL memperbarui data soal.']);
            }
        }
    }

    public function exercises()
    {
        $years = Year::all();
        // dd($years);
        return view('teacher.exercises', compact('years'));
    }

    public function exercisesList()
    {
        $exercises = Exercise::all();
        return DataTables::of($exercises)
            ->addColumn('actions', function ($row) {
                return
                    '<div class="btn-group" role="group">
                <button id="edit_topic_btn" type="button" class="btn btn-default" data-id="' . $row['id'] . '">Edit</button>
                <button id="delete_topic_btn"  type="button" class="btn btn-default" data-id="' . $row['id'] . '">Delete</button>
              </div>';
            })
            ->addColumn('year_name', function (Exercise $exercise) {
                return $exercise->year->name;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function exercisesAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'year_id' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $exercise = new Exercise();
            $exercise->name = $request->name;
            $exercise->year_id = $request->year_id;
            $exercise->description = $request->description;
            $query = $exercise->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Latihan baru berhasil ditambahkan']);
            }
        }
    }
}
