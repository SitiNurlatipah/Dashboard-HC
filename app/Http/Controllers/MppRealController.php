<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MppVsRealModel;
use DB;


class MppRealController extends Controller
{
    public function index(){
        $mppreal = MppVsRealModel::all();
        $permanen = MppVsRealModel::select(DB::raw("CAST(SUM(intMppPermanent)as int) as permanen"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'DESC')
                    ->pluck('permanen');
        $contract = MppVsRealModel::select(DB::raw("CAST(SUM(intMppContract)as int) as contract"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'DESC')
                    ->pluck('contract');
        $jobsupply = MppVsRealModel::select(DB::raw("CAST(SUM(intMppJobSupply)as int) as jobsupply"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'DESC')
                    ->pluck('jobsupply');
        $total = MppVsRealModel::select(DB::raw("CAST(SUM(intMppTotal)as int) as total"))
                    ->GroupBy(DB::raw("Month(dateBulan)"))
					->orderBy('dateBulan', 'DESC')
                    ->pluck('total');
        $bulan=MppVsRealModel::select(DB::raw("MONTHNAME(dateBulan) as bulan"))
        ->GroupBy(DB::raw("MONTHNAME(dateBulan)"))
        ->orderBy('dateBulan', 'Desc')
        ->pluck('bulan');
        return view('pages.mpp-vs-realization.index',compact('bulan','permanen','contract','jobsupply','total'),['mpp_vs_realization' => $mppreal]);
     }
     public function store(Request $request){
        $request->validate( [
            'intMppTotal' => 'required',
            'intMppPermanent' => 'required',
            'intMppContract' => 'required',
            'intMppJobSupply' => 'required',
            'intAdd' => 'required',
            'intReduce' => 'required',
            'txtMtdAdjusment' => 'required',
            'dateBulan' => 'required',			
                        
        ]);
        
        $valid = [
            'intMppTotal'=> $request->intMppTotal,
            'intMppPermanent' => $request->intMppPermanent,
            'intMppContract' =>$request->intMppContract,
            'intMppJobSupply' => $request->intMppJobSupply,
            'intAdd' => $request->intAdd,
            'intReduce' => $request->intReduce,
            'txtMtdAdjusment' => $request->txtMtdAdjusment,
            'dateBulan' => $request->dateBulan,
        ];
        MppVsRealModel::create($valid);
            
        return redirect()->route('mppreal')->with('message','Data added successfully.'); 
    }
    public function update(Request $request, $id){
        $mppreal = MppVsRealModel::find($id);
        $mppreal->intMppTotal = $request->intMppTotal;
        $mppreal->intMppPermanent = $request->intMppPermanent;
        $mppreal->intMppContract = $request->intMppContract;
        $mppreal->intMppJobSupply = $request->intMppJobSupply;
        $mppreal->intAdd = $request->intAdd;
        $mppreal->intReduce = $request->intReduce;
        $mppreal->txtMtdAdjusment = $request->txtMtdAdjusment;
        $mppreal->dateBulan = $request->dateBulan;
        $mppreal->save();
        return redirect()->route('mppreal')->with('message','Data updated successfully.');
	}
    public function destroy($id)
    {
        MppVsRealModel::find($id)->delete();
        // $data->delete();
        return redirect()->route('mppreal')->with('message','Data deleted successfully');
    }
}
