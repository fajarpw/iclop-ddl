<?php

namespace App\Http\Controllers;

use App\DDLClass;
use App\DDLStudent;
use App\User;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function dashboard()
    {
        $mahasiswa = User::where('role', '=', 'student')->get()->count();
        $dosen = User::where('role', '=', 'teacher')->get()->count();
        $year = Year::where('status', '=', 'aktif')->get();
        $class = DDLClass::all()->count();
        return view('admin.dashboard', compact('mahasiswa', 'dosen', 'year', 'class'));
    }

    public function year()
    {
        return view('admin.year');
    }

    public function yearList()
    {
        $years = Year::all();
        return DataTables::of($years)
            ->addColumn('actions', function ($row) {
                return
                    '<div class="btn-group" role="group">
        <button id="editYear" type="button" class="btn btn-primary btn-block" data-id="' . $row['id'] . '">
        <i class="fa fa-edit"></i>
        </button> 
        </div>';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function yearAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            //'status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $currentDate = date('Y-m-d');
            $currentDate = date('Y-m-d', strtotime($currentDate));

            $startDate = date('Y-m-d', strtotime($request->end_date));
            $endDate = date('Y-m-d', strtotime($request->start_date));

            if (($currentDate >= $startDate) && ($currentDate <= $endDate)) {
                $status = "Aktif";
            } else {
                $status = "Nonaktif";
            }

            $year = new Year();
            $year->name = $request->name;
            $year->start_date = $request->start_date;
            $year->end_date = $request->end_date;
            $year->status = $status;
            $query = $year->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Tahun Ajaran baru berhasil ditambahkan']);
            }
        }
    }

    public function yearDetail(Request $request)
    {
        $yearDetail = Year::find($request->year_id);
        return response()->json(['code' => 1, 'details' => $yearDetail]);
    }

    public function yearUpdate(Request $request)
    {
        $year_id = $request->yid;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'status' => 'required|string',
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $year = Year::find($year_id);
            $year->name = $request->name;
            $year->status = $request->status;
            $year->start_date = $request->start_date;
            $year->end_date = $request->end_date;
            $query = $year->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Terjadi kesalahan']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Tahun Ajaran berhasil diperbarui']);
            }
        }
    }

    public function class()
    {
        $classes = DDLClass::all();
        return view('admin.class', compact('classes'));
    }

    public function classDetail(Request $request)
    {
        //$students = DDLStudent::where('class_id', '=', $request->id)->get();
        $students = DB::table('students')
            ->where('class_id', '=', $request->id)
            ->join('users', 'students.student_id', '=', 'users.id')
            ->join('class', 'students.class_id', '=', 'class.id')
            ->select('users.name', 'class.name as className')
            ->get();
        return view('admin.student-class', compact('students'));
    }

    public function classStudent(Request $request)
    {
        
        $students = DDLStudent::where('class_id', 1)
        ->get();   
        return DataTables::of($students)
            ->addColumn('student_name', function (DDLStudent $ddlStudent) {
                return $ddlStudent->user->name;
            })
            ->addColumn('class_name', function (DDLStudent $ddlClass) {
                return $ddlClass->class->name;
            })
            ->rawColumns(['student_name', 'class_name'])
            ->make(true);
    }
}
