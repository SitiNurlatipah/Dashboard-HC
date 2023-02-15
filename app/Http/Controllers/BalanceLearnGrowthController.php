<?php

namespace App\Http\Controllers;
use App\BSCLearnGrowthModel;

use Illuminate\Http\Request;

class BalanceLearnGrowthController extends Controller
{
    public function store(Request $request){
        $request->validate( [		
            'l_bulan' => 'required',			
            'l_kpitype1' => 'required',			
            'l_kpitype2' => 'required',			
            'l_kpitype3' => 'required',			
                        
        ]);
        
        $valid = [
            'l_mtdactual1' => $request->l_mtdactual1,
            'l_mtdtarget1' => $request->l_mtdtarget1,
            'l_mtdach1' => $request->l_mtdach1,
            'l_mtdactual2' => $request->l_mtdactual2,
            'l_mtdtarget2' => $request->l_mtdtarget2,
            'l_mtdach2' => $request->l_mtdach2,
            'l_mtdactual3' => $request->l_mtdactual3,
            'l_mtdtarget3' => $request->l_mtdtarget3,
            'l_mtdach3' => $request->l_mtdach3,
            'l_ytdactual1' => $request->l_ytdactual1,
            'l_ytdtarget1' => $request->l_ytdtarget1,
            'l_ytdach1' => $request->l_ytdach1,
            'l_ytdactual2' => $request->l_ytdactual2,
            'l_ytdtarget2' => $request->l_ytdtarget2,
            'l_ytdach2' => $request->l_ytdach2,
            'l_ytdactual3' => $request->l_ytdactual3,
            'l_ytdtarget3' => $request->l_ytdtarget3,
            'l_ytdach3' => $request->l_ytdach3,
            'l_bulan' => $request->l_bulan,
            'l_kpitype1' => $request->l_kpitype1,
            'l_kpitype2' => $request->l_kpitype2,
            'l_kpitype3' => $request->l_kpitype3,
        ];
        BSCLearnGrowthModel::create($valid);
            
        return redirect()->route('balance')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idlearngrowth){
        $business = BSCLearnGrowthModel::find($idlearngrowth);
        $business->l_mtdactual1 = $request->l_mtdactual1;
        $business->l_mtdtarget1 = $request->l_mtdtarget1;
        $business->l_mtdach1 = $request->l_mtdach1;
        $business->l_mtdactual2 = $request->l_mtdactual2;
        $business->l_mtdtarget2 = $request->l_mtdtarget2;
        $business->l_mtdach2 = $request->l_mtdach2;
        $business->l_mtdactual3 = $request->l_mtdactual3;
        $business->l_mtdtarget3 = $request->l_mtdtarget3;
        $business->l_mtdach3 = $request->l_mtdach3;
        $business->l_ytdactual1 = $request->l_ytdactual1;
        $business->l_ytdtarget1 = $request->l_ytdtarget1;
        $business->l_ytdach1 = $request->l_ytdach1;
        $business->l_ytdactual2 = $request->l_ytdactual2;
        $business->l_ytdtarget2 = $request->l_ytdtarget2;
        $business->l_ytdach2 = $request->l_ytdach2;
        $business->l_ytdactual3 = $request->l_ytdactual3;
        $business->l_ytdtarget3 = $request->l_ytdtarget3;
        $business->l_ytdach3 = $request->l_ytdach3;
        $business->l_bulan = $request->l_bulan;
        $business->l_kpitype1 = $request->l_kpitype1;
        $business->l_kpitype2 = $request->l_kpitype2;
        $business->l_kpitype3 = $request->l_kpitype3;
        $business->save();
        return redirect()->route('balance')->with('message','Data updated successfully.');
	}
    public function destroy($idlearngrowth)
    {
        BSCLearnGrowthModel::find($idlearngrowth)->delete();
        // $data->delete();
        return redirect()->route('balance')->with('message','Data deleted successfully');
    }
}
