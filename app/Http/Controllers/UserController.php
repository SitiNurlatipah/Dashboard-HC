<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;


class UserController extends Controller
{
    public function index(){
        // $users = UserModel::latest()->paginate(5);
  
        // return view('pages.management-user.index',compact('users'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
        $data = UserModel::all();
        return view('pages.management-user.index', [
            'users' => $data
        ]);
     }
     public function store(Request $request)
    {
        // dd($request->all());
       
        $request->validate([
            'txtUsername' => 'required',
            'txtPassword' => 'required',
            'txtNik' => 'required',
            'txtEmployeeName' => 'required',
            'txtJobTitle' => 'required',
            'txtDepartment' => 'required',
            'txtEmail' => 'required',
            'txtStatus' => 'required',
            'txtType' => 'required',
            'dtmStartDate' => 'required',
            'txtGender' => 'required',
        ]);
    
        $validated = [
            'txtUsername' => $request->txtUsername,
            'txtNik' => $request->txtNik,
            'txtPassword' => bcrypt($request->txtPassword),
            'txtEmployeeName' => $request->txtEmployeeName,
            'txtJobTitle' => $request->txtJobTitle,
            'txtDepartment' => $request->txtDepartment,
            'txtEmail' => $request->txtEmail,
            'txtStatus' => $request->txtStatus,
            'txtType' => $request->txtType,
            'dtmStartDate' => $request->dtmStartDate,
            'dtmEndDate' => $request->dtmEndDate,
            'txtGender' => $request->txtGender,
        ];
       
        UserModel::create($validated);
            
        return redirect()->route('user')->with('success','Product created successfully.');
       
    }
    public function edit(UserModel $data){
        return view('pages.management-user.edit',compact('data'));    
    }
    public function update(UserModel $data){

    }
    public function destroy(UserModel $data)
    {
       
        $data->delete();
        return redirect()->route('user')->with('success','Product deleted successfully');
    }
}
