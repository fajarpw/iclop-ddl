<?php

namespace App\Http\Controllers;

use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
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
        <button id="editQuestion" type="button" class="btn btn-primary btn-block" data-id="' . $row['id'] . '">
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
}
