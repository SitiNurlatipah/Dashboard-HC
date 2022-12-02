<?php

namespace App\Http\Controllers;
use App\SalesYtdModel;

use Illuminate\Http\Request;

class SalesYtdController extends Controller
{
    public function store(Request $request){
        $request->validate( [
            
            
            'tahun' => 'required',			
                        
        ]);
        
        $valid = [
            'salesInYtd' => $request->salesInYtd,
            'salesOutYtd' => $request->salesOutYtd,
            'hrCostYtd' => $request->hrCostYtd,
            'headCountYtd' => $request->headCountYtd,
            'tahun' => $request->tahun,
        ];
        SalesYtdModel::create($valid);
            
        return redirect()->route('sales')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idYtd){
        $ytd = SalesYtdModel::find($idYtd);
        $ytd->salesInYtd = $request->salesInYtd;
        $ytd->salesOutYtd = $request->salesOutYtd;
        $ytd->hrCostYtd = $request->hrCostYtd;
        $ytd->headCountYtd = $request->headCountYtd;
        $ytd->tahun = $request->tahun;
        $ytd->save();
        return redirect()->route('sales')->with('message','Data updated successfully.');
	}
    public function destroy($idYtd)
    {
        SalesYtdModel::find($idYtd)->delete();
        // $data->delete();
        return redirect()->route('sales')->with('message','Data deleted successfully');
    }
}
