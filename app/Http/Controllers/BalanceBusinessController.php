<?php

namespace App\Http\Controllers;
use App\BSCBusinessModel;

use Illuminate\Http\Request;

class BalanceBusinessController extends Controller
{
    public function store(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'kpitype1' => 'required',			
            'kpitype2' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'mtdactual1' => $request->mtdactual1,
            'mtdtarget1' => $request->mtdtarget1,
            'mtdach1' => $request->mtdach1,
            'mtdactual2' => $request->mtdactual2,
            'mtdtarget2' => $request->mtdtarget2,
            'mtdach2' => $request->mtdach2,
            'ytdactual1' => $request->ytdactual1,
            'ytdtarget1' => $request->ytdtarget1,
            'ytdach1' => $request->ytdach1,
            'ytdactual2' => $request->ytdactual2,
            'ytdtarget2' => $request->ytdtarget2,
            'ytdach2' => $request->ytdach2,
            'bulan' => $bulan,
            'kpitype1' => $request->kpitype1,
            'kpitype2' => $request->kpitype2,
        ];
        BSCBusinessModel::create($valid);
            
        return redirect()->route('balance')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idbussiness){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $business = BSCBusinessModel::find($idbussiness);
        $business->mtdactual1 = $request->mtdactual1;
        $business->mtdtarget1 = $request->mtdtarget1;
        $business->mtdach1 = $request->mtdach1;
        $business->mtdactual2 = $request->mtdactual2;
        $business->mtdtarget2 = $request->mtdtarget2;
        $business->mtdach2 = $request->mtdach2;
        $business->ytdactual1 = $request->ytdactual1;
        $business->ytdtarget1 = $request->ytdtarget1;
        $business->ytdach1 = $request->ytdach1;
        $business->ytdactual2 = $request->ytdactual2;
        $business->ytdtarget2 = $request->ytdtarget2;
        $business->ytdach2 = $request->ytdach2;
        $business->bulan = $bulan;
        $business->kpitype1 = $request->kpitype1;
        $business->kpitype2 = $request->kpitype2;
        // dd($business->all());
        $business->save();
        return redirect()->route('balance')->with('message','Data updated successfully.');
	}
    public function destroy($idbussiness)
    {
        BSCBusinessModel::find($idbussiness)->delete();
        // $data->delete();
        return redirect()->route('balance')->with('message','Data deleted successfully');
    }
}
