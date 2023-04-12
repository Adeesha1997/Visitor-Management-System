<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use Illuminate\Http\Request;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }


    public function custom_login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credential = $request->only('email','password');
        if(Auth::attempt($credential))
        {
            return redirect()->intended('dashboard')->withSuccess('Login');
        }

        return redirect('login')->with('error', 'Login details are not valid');
    }


    public function dashboard()
    {
        if(Auth::check())
        {
            return view('pages.dashboard');
        }

        return redirect('login');

    }


    public function logout()
    {
        Session::fulsh();
        Auth::logout();
        return redirect('login');


    }



    public function registration()
    {
        return view('pages.auth.registration');
    }

    public function custom_registration(Request $request)
    {
        //Validation
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:4|confirmed'
            ]);

        //Data Save

        $data = $request->all();

        User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'type' => 'Admin'
        ]);

        //Redirect Back

        return redirect()->back()->with('success','Registration Complete  ');
    }





}
