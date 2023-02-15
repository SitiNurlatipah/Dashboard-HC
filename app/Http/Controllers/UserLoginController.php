<?php

namespace App\Http\Controllers;
use App\LoginModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function index()
    {
        $pengguna=LoginModel::all();
        return view('pages.users.index',compact('pengguna'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'namalengkap' => 'required',
            'role' => 'required',
            // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($request);
        $imageName = time() . '.' . $request->foto->extension();
        
        $request->foto->move(public_path('img/userimgs'), $imageName);
        // $request->foto->storeAs('public/img/userimgs', $imageName);
        $validated = [
            'username' => $request->username,
            'namalengkap' => $request->namalengkap,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'foto' => $imageName,
            
        ];
        $succes=LoginModel::create($validated);
        if($succes){
            return redirect()->route('pengguna')->with('message','Anda berhasil login.');
        }
        else{
            return Redirect()->back()->with('fail','Registrasi Gagal');
        }
        
    }
    public function update(Request $request, $id){
        $user = LoginModel::find($id);
        $user->username = $request->username;
        $user->namalengkap = $request->namalengkap;
        // $user->password = bcrypt($request->password);
        $user->role = $request->role;
        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/userimgs'), $imageName);
            $user->foto = $imageName;
        }
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('pengguna')->with('message','Data updated successfully.');
	}
    public function destroy($id)
    {
        LoginModel::find($id)->delete();
        // $data->delete();
        return redirect()->route('pengguna')->with('message','Data deleted successfully');
    }
}
