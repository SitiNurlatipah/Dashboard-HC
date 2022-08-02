<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $txtUsername = $request->input('txtUsername');
        $password = $request->input('txtPassword');
        if (Auth::attempt(['txtUsername' => $txtUsername, 'password' => $password])) {
            return redirect()->route('dashboard');
        }else {
            return Redirect()->back()->with('failed','Your Email or Password are incorrect!');
        }
    }
    public function getRegister()
    {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        $txtUsername = $request->input('txtUsername');
        $password = $request->input('txtPassword');
        return view('auth.register');
        
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
