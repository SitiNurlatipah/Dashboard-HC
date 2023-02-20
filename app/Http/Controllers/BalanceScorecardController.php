<?php

namespace App\Http\Controllers;
use App\BalanceScorecardModel;
use App\BSCBusinessModel;
use App\BSCCustomerModel;
use App\BSCLearnGrowthModel;

use Illuminate\Http\Request;

class BalanceScorecardController extends Controller
{
    public function index(){
        $balancescorecard=BalanceScorecardModel::all();
        $bscbusiness=BSCBusinessModel::all();
        $bsccustomer=BSCCustomerModel::all();
        $bsclearn=BSCLearnGrowthModel::all();
    return view('pages.balance-scorecard.index',compact('balancescorecard','bscbusiness','bsccustomer',
    'bsclearn'
    ));
    }
    public function store(Request $request){
        $request->validate( [		
            'bulan' => 'required',			
            'kpitype' => 'required',			
                        
        ]);
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $valid = [
            'netsales_mtd' => $request->netsales_mtd,
            'hrcost_mtd' => $request->hrcost_mtd,
            'employee_mtd' => $request->employee_mtd,
            'gp_mtd' => $request->gp_mtd,
            'op_mtd' => $request->op_mtd,
            'netsales_ytd' => $request->netsales_ytd,
            'hrcost_ytd' => $request->hrcost_ytd,
            'employee_ytd' => $request->employee_ytd,
            'gp_ytd' => $request->gp_ytd,
            'op_ytd' => $request->op_ytd,
            'netsales_mtdtarget' => $request->netsales_mtdtarget,
            'hrcost_mtdtarget' => $request->hrcost_mtdtarget,
            'employee_mtdtarget' => $request->employee_mtdtarget,
            'gp_mtdtarget' => $request->gp_mtdtarget,
            'op_mtdtarget' => $request->op_mtdtarget,
            'netsales_ytdtarget' => $request->netsales_ytdtarget,
            'hrcost_ytdtarget' => $request->hrcost_ytdtarget,
            'employee_ytdtarget' => $request->employee_ytdtarget,
            'gp_ytdtarget' => $request->gp_ytdtarget,
            'op_ytdtarget' => $request->op_ytdtarget,
            'bulan' => $bulan,
            'kpitype' => $request->kpitype,
        ];
        BalanceScorecardModel::create($valid);
            
        return redirect()->route('balance')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $idfinancial){
        $month = $request->input('bulan');
        $month = date_parse_from_format("Y-m", $month);
        $year = $month["year"];
        $month = $month["month"];
        $bulan = "$year-$month-20";
        $balance = BalanceScorecardModel::find($idfinancial);
        $balance->netsales_mtd = $request->netsales_mtd;
        $balance->netsales_ytd = $request->netsales_ytd;
        $balance->netsales_mtdtarget = $request->netsales_mtdtarget;
        $balance->netsales_ytdtarget = $request->netsales_ytdtarget;
        $balance->hrcost_mtd = $request->hrcost_mtd;
        $balance->hrcost_ytd = $request->hrcost_ytd;
        $balance->hrcost_mtdtarget = $request->hrcost_mtdtarget;
        $balance->hrcost_ytdtarget = $request->hrcost_ytdtarget;
        $balance->op_mtd = $request->op_mtd;
        $balance->op_ytd = $request->op_ytd;
        $balance->op_mtdtarget = $request->op_mtdtarget;
        $balance->op_ytdtarget = $request->op_ytdtarget;
        $balance->employee_mtd = $request->employee_mtd;
        $balance->employee_ytd = $request->employee_ytd;
        $balance->employee_mtdtarget = $request->employee_mtdtarget;
        $balance->employee_ytdtarget = $request->employee_ytdtarget;
        $balance->gp_mtd = $request->gp_mtd;
        $balance->gp_ytd = $request->gp_ytd;
        $balance->gp_mtdtarget = $request->gp_mtdtarget;
        $balance->gp_ytdtarget = $request->gp_ytdtarget;
        $balance->bulan = $bulan;
        $balance->kpitype = $request->kpitype;
        $balance->save();
        return redirect()->route('balance')->with('message','Data updated successfully.');
	}
    public function destroy($idfinancial)
    {
        BalanceScorecardModel::find($idfinancial)->delete();
        // $data->delete();
        return redirect()->route('balance')->with('message','Data deleted successfully');
    }
}
