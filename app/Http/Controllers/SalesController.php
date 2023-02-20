<?php

namespace App\Http\Controllers;
use App\SalesModel;
use App\SalesYtdModel;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(){
    $salesMtd=SalesModel::whereYear('bulan', '=', Carbon::now())->get();
    $salesYtd=SalesYtdModel::all();
    $inMtd = SalesModel::select(DB::raw("CAST(SUM(salesIn) as int) as inSales"))
        ->GroupBy(DB::raw("bulan"))  
        ->whereYear('bulan', '=', Carbon::now())
        ->orderBy('bulan', 'asc')
        ->pluck('inSales');
    $inYtd = SalesYtdModel::select(DB::raw("CAST(SUM(salesInYtd) as int) as inSales"))
        ->GroupBy(DB::raw("tahun"))  
        ->whereYear('tahun', '<', Carbon::now())
        ->orderBy('tahun', 'asc')
        ->pluck('inSales');
    $in = $inYtd->merge($inMtd);
    $outMtd = SalesModel::select(DB::raw("CAST(SUM(salesOut) as int) as outSales"))
        ->GroupBy(DB::raw("bulan"))  
        ->whereYear('bulan', '=', Carbon::now())
        ->orderBy('bulan', 'asc')
        ->pluck('outSales');
    $outYtd = SalesYtdModel::select(DB::raw("CAST(SUM(salesOutYtd) as int) as outSales"))
        ->GroupBy(DB::raw("tahun"))  
        ->whereYear('tahun', '<', Carbon::now())
        ->orderBy('tahun', 'asc')
        ->pluck('outSales');
    $out = $outYtd->merge($outMtd);
    $costMtd = SalesModel::select(DB::raw("CAST(SUM(hrCost) as int) as costHr"))
        ->GroupBy(DB::raw("bulan"))  
        ->whereYear('bulan', '=', Carbon::now())
        ->orderBy('bulan', 'asc')
        ->pluck('costHr');
    $costYtd = SalesYtdModel::select(DB::raw("CAST(SUM(hrCostYtd) as int) as costHr"))
        ->GroupBy(DB::raw("tahun"))  
        ->whereYear('tahun', '<', Carbon::now())
        ->orderBy('tahun', 'asc')
        ->pluck('costHr');
    $cost = $costYtd->merge($costMtd);
    $countMtd = SalesModel::select(DB::raw("CAST(SUM(headCount) as int) as headcount"))
        ->GroupBy(DB::raw("bulan"))  
        ->whereYear('bulan', '=', Carbon::now())
        ->orderBy('bulan', 'asc')
        ->pluck('headcount');
    $countYtd = SalesYtdModel::select(DB::raw("CAST(SUM(headCountYtd) as int) as headcount"))
        ->GroupBy(DB::raw("tahun"))  
        ->whereYear('tahun', '<', Carbon::now())
        ->orderBy('tahun', 'asc')
        ->pluck('headcount');
    $count = $countYtd->merge($countMtd);
    $bulan=SalesModel::select(DB::raw("(DATE_FORMAT(bulan,'%M %Y')) as bulan"))
        ->whereYear('bulan', '=', Carbon::now())
        ->GroupBy(DB::raw("bulan"))
        ->orderBy('bulan', 'asc')
        ->pluck('bulan');
    $tahun = SalesYtdModel::select(DB::raw("(DATE_FORMAT(tahun,'%Y')) as bulan"))
        ->GroupBy(DB::raw("tahun"))  
        ->whereYear('tahun', '<', Carbon::now())
        ->orderBy('tahun', 'asc')
        ->pluck('bulan');
    $xvar = $tahun->merge($bulan);

    // dd($xvar);
    return view('pages.productivity.sales',compact('salesMtd','salesYtd',
    'xvar','in','out','cost','count'
    ));
    }
    public function store(Request $request){
        $request->validate( [
            
            
            'bulan' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'salesIn' => $request->salesIn,
            'salesOut' => $request->salesOut,
            'hrCost' => $request->hrCost,
            'headCount' => $request->headCount,
            'bulan' => $bulan,
        ];
        SalesModel::create($valid);
            
        return redirect()->route('sales')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idMtd){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $sales = SalesModel::find($idMtd);
        $sales->salesIn = $request->salesIn;
        $sales->salesOut = $request->salesOut;
        $sales->hrCost = $request->hrCost;
        $sales->headCount = $request->headCount;
        $sales->bulan = $bulan;
        $sales->save();
        return redirect()->route('sales')->with('message','Data updated successfully.');
	}
    public function destroy($idMtd)
    {
        SalesModel::find($idMtd)->delete();
        // $data->delete();
        return redirect()->route('sales')->with('message','Data deleted successfully');
    }
}
