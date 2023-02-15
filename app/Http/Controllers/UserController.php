<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;


class UserController extends Controller
{
    public function index(Request $request){
        if($request){
            $data=UserModel::where('txtEmployeeName','like','%'.$request->cari.'%')->get();
        }else{
        $data = UserModel::all();
        }
        return view('pages.management-user.index', compact('request'),[
            'users' => $data,
        ]);
     }
     public function store(Request $request)
    {
        // dd($request->all());
       
        $request->validate([
            
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
            'txtNik' => $request->txtNik,
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
            
        return redirect()->route('user')->with('message','User added successfully.');
       
    }
    // public function edit($id){
    //     $data = UserModel::find($id);
	//     return response()->json([
	//       'users' => $data
	//     ]);
    // }
    public function update(Request $request, $id){
        $data = UserModel::find($id);
        $data->txtNik = $request->txtNik;
        $data->txtEmployeeName = $request->txtEmployeeName;
        $data->txtJobTitle = $request->txtJobTitle;
        $data->txtDepartment = $request->txtDepartment;
        $data->txtEmail = $request->txtEmail;
        $data->txtStatus = $request->txtStatus;
        $data->txtType = $request->txtType;
        $data->dtmStartDate = $request->dtmStartDate;
        $data->txtGender = $request->txtGender;
        $data->save();
        return redirect()->route('user')->with('message','User updated successfully.');

       
    }
    public function destroy($id)
    {
        UserModel::find($id)->delete();
        // $data->delete();
        return redirect()->route('user')->with('message','User deleted successfully');
    }
}
