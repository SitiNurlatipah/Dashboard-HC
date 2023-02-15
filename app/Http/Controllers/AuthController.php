<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function getLogin()
    {
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        // $password = \Hash::make($request['txtPassword']);
        // dd($password);
        $username = $request->input('txtUsername');
        $password = $request->input('txtPassword');
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            return redirect()->route('dashboard');
        }else {
            return Redirect()->back()->with('gagal','Your Email or Password are incorrect!');
        }
        
    }
    public function getRegister()
    {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'namalengkap' => 'required',
            'role' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);
        dd($request);
        $imageName = time() . '.' . $request->foto->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->foto->storeAs('public/img/userimgs', $imageName);
        $validated = [
            'username' => $request->username,
            'namalengkap' => $request->namalengkap,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'foto' => $imageName,
            
        ];
        $succes=User::create($validated);
        if($succes){
            return redirect()->route('login')->with('message','Anda berhasil login.');
        }
        else{
            return Redirect()->back()->with('message','Registrasi Gagal');
        }
        
    }
    public function getLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('logout','Anda Berhasil Logout!');
    }
}
