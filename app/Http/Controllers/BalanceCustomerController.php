<?php

namespace App\Http\Controllers;
use App\BSCCustomerModel;

use Illuminate\Http\Request;

class BalanceCustomerController extends Controller
{
    public function store(Request $request){
        $request->validate( [		
            'c_bulan' => 'required',			
            'c_kpitype1' => 'required',			
            'c_kpitype2' => 'required',			
            'c_kpitype3' => 'required',			
                        
        ]);
        
        $valid = [
            'c_mtdactual1' => $request->c_mtdactual1,
            'c_mtdtarget1' => $request->c_mtdtarget1,
            'c_mtdach1' => $request->c_mtdach1,
            'c_mtdactual2' => $request->c_mtdactual2,
            'c_mtdtarget2' => $request->c_mtdtarget2,
            'c_mtdach2' => $request->c_mtdach2,
            'c_mtdactual3' => $request->c_mtdactual3,
            'c_mtdtarget3' => $request->c_mtdtarget3,
            'c_mtdach3' => $request->c_mtdach3,
            'c_ytdactual1' => $request->c_ytdactual1,
            'c_ytdtarget1' => $request->c_ytdtarget1,
            'c_ytdach1' => $request->c_ytdach1,
            'c_ytdactual2' => $request->c_ytdactual2,
            'c_ytdtarget2' => $request->c_ytdtarget2,
            'c_ytdach2' => $request->c_ytdach2,
            'c_ytdactual3' => $request->c_ytdactual3,
            'c_ytdtarget3' => $request->c_ytdtarget3,
            'c_ytdach3' => $request->c_ytdach3,
            'c_bulan' => $request->c_bulan,
            'c_kpitype1' => $request->c_kpitype1,
            'c_kpitype2' => $request->c_kpitype2,
            'c_kpitype3' => $request->c_kpitype3,
        ];
        BSCCustomerModel::create($valid);
            
        return redirect()->route('balance')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idcustomer){
        $business = BSCCustomerModel::find($idcustomer);
        $business->c_mtdactual1 = $request->c_mtdactual1;
        $business->c_mtdtarget1 = $request->c_mtdtarget1;
        $business->c_mtdach1 = $request->c_mtdach1;
        $business->c_mtdactual2 = $request->c_mtdactual2;
        $business->c_mtdtarget2 = $request->c_mtdtarget2;
        $business->c_mtdach2 = $request->c_mtdach2;
        $business->c_mtdactual3 = $request->c_mtdactual3;
        $business->c_mtdtarget3 = $request->c_mtdtarget3;
        $business->c_mtdach3 = $request->c_mtdach3;
        $business->c_ytdactual1 = $request->c_ytdactual1;
        $business->c_ytdtarget1 = $request->c_ytdtarget1;
        $business->c_ytdach1 = $request->c_ytdach1;
        $business->c_ytdactual2 = $request->c_ytdactual2;
        $business->c_ytdtarget2 = $request->c_ytdtarget2;
        $business->c_ytdach2 = $request->c_ytdach2;
        $business->c_ytdactual3 = $request->c_ytdactual3;
        $business->c_ytdtarget3 = $request->c_ytdtarget3;
        $business->c_ytdach3 = $request->c_ytdach3;
        $business->c_bulan = $request->c_bulan;
        $business->c_kpitype1 = $request->c_kpitype1;
        $business->c_kpitype2 = $request->c_kpitype2;
        $business->c_kpitype3 = $request->c_kpitype3;
        $business->save();
        return redirect()->route('balance')->with('message','Data updated successfully.');
	}
    public function destroy($idcustomer)
    {
        BSCCustomerModel::find($idcustomer)->delete();
        // $data->delete();
        return redirect()->route('balance')->with('message','Data deleted successfully');
    }
}
