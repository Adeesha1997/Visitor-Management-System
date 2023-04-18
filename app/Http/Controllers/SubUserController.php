<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Hash;
use Illuminate\Support\Facades\Auth;



class SubUserController extends Controller
{
    public function construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('pages.sub_user.sub_user');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = User::where('type', '=', 'User')->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<center><a href="/sub_user/edit/'.$row->id.'" class="btn btn-success btn-sm btn-icon-split"> <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                    </span></a>&nbsp;<button type="button" class="btn btn-danger btn-sm btn-icon-split" data-id="'.$row->id.'"><span class="icon text-white-50">
                    <i class="fas fa-trash-alt"></i>
                </span></button></center>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }


    function add()
    {
        return view('pages.sub_user.add_sub_user');

    }

    function add_validation(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed'
        ]);

        $data = $request->all();

        User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'type' => 'User'

        ]);

        return redirect('subUser')->with('success','New User Added' );


    }


}
