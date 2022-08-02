<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return view('pages.management-employee.index');
     }
    public function cgJson()
     {
         $data = User::get(['users.*']);
         return Datatables::of($data)
             ->addIndexColumn()
             ->addColumn('action', function ($row) {
                 $btn =  '<button class="btn btn-danger btn-sm btn-icon-anim btn-circle"><i class="icon-trash"></i></button>';
                 $btn = $btn . '<button class="btn btn-success btn-sm btn-icon-anim btn-circle" style="margin-left: 5px"><i class="icon-settings"></i></button>';
             // $btn = '<button class="btn btn-inverse-success btn-icon mr-1" data-toggle="modal" data-target="#modal-edit"><i class="icon-file menu-icon"></i></button>';
             // $btn = $btn . '<button data-id="" class="btn btn-inverse-danger btn-icon member-hapus mr-1" data-toggle="modal" data-target="#modal-hapus"><i class="icon-trash"></i></button>';
                 return $btn;
             })
             ->addIndexColumn()
             ->rawColumns(['action'])
             ->make(true);
    }
    public function getUser(Request $request){
        $rules = [
			'intJumlahEmployee' => 'required|string|min:3|max:255',
			'intKaryawan' => 'required',
			'intContact' => 'required',
			'intOutsource' => 'required',
			'dateStartDate' => 'required',
			'dateEndDate' => 'required',
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('insert')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
			try{
				$employe = new employe;
                $employe->intJumlahEmployee = $data['intJumlahEmployee'];
                $employe->intKaryawan = $data['intKaryawan'];
				$employe->intContract = $data['intContract'];
				$employe->intOutsource = $data['intOutsource'];
				$employe->dateStartDate = $data['dateStartDate'];
				$employe->dateEndDate = $data['dateEndDate'];
				$employe->save();
				return redirect('insert')->with('status',"Insert successfully");
			}
			catch(Exception $e){
				return redirect('insert')->with('failed',"operation failed");
			}
		}
    }

}
