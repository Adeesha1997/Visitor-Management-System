<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;

use DataTables;

use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

public function index()
{
   return view('pages.department.department');
}

function fetchall(Request $request)
{
    if($request->ajax())
    {
        $data = Department::latest()->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                return '<center><a href="/department-edit'.$row->id.'" class="btn btn-success btn-sm btn-icon-split"> <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
            </span></a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete btn-icon-split"" data-id="'.$row->id.'"><span class="icon text-white-50"> <i class="fas fa-trash-alt"></i></span></button></center>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}



}
