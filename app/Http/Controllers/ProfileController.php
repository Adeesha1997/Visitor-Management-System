<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $data = User::findOrFail(Auth::user()->id);
        return view('pages.profile.profile', compact('data'));
    }

    function edit_validation(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed'
        ]);

        $data= $request->all();

        if(!empty($data['password']))
        {
            $form_data = array(
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            );
        }
        else
        {
            $form_data = array(
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
             );

        }

        User::whereId(Auth::user()->id)->update($form_data);

        return redirect('profile')->with('success','Profile data Updated');

    }
}
