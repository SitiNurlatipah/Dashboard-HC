<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MppVsRealModel;
use DB;


class MppRealController extends Controller
{
    public function index(){
        $mppall = MppVsRealModel::whereDate('dateBulan','>=','2019-01-01')
                   ->whereDate('dateBulan','<=','2019-12-31')
                   ->get();
        $tabel2022 = MppVsRealModel::whereDate('dateBulan','>=','2022-01-01')
                   ->whereDate('dateBulan','<=','2022-12-31')
                   ->get();
        $tabel2021 = MppVsRealModel::whereDate('dateBulan','>=','2021-01-01')
                   ->whereDate('dateBulan','<=','2021-12-31')
                   ->get();
        $tabel2020 = MppVsRealModel::whereDate('dateBulan','>=','2020-01-01')
                   ->whereDate('dateBulan','<=','2020-12-31')
                   ->get();
        
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
        return view('pages.mpp-vs-realization.index',compact('bulan','permanen','contract','jobsupply','total','mppall','tabel2022','tabel2021','tabel2020')
        // ['mpp_vs_realization' => $mppreal,$mpp2022]
        );
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
        $mpp2020 = MppVsRealModel::find($id);
        $mpp2020->intMppTotal = $request->intMppTotal;
        $mpp2020->intMppPermanent = $request->intMppPermanent;
        $mpp2020->intMppContract = $request->intMppContract;
        $mpp2020->intMppJobSupply = $request->intMppJobSupply;
        $mpp2020->intAdd = $request->intAdd;
        $mpp2020->intReduce = $request->intReduce;
        $mpp2020->txtMtdAdjusment = $request->txtMtdAdjusment;
        $mpp2020->dateBulan = $request->dateBulan;
        $mpp2020->save();
        $mpp2021 = MppVsRealModel::find($id);
        $mpp2021->intMppTotal = $request->intMppTotal;
        $mpp2021->intMppPermanent = $request->intMppPermanent;
        $mpp2021->intMppContract = $request->intMppContract;
        $mpp2021->intMppJobSupply = $request->intMppJobSupply;
        $mpp2021->intAdd = $request->intAdd;
        $mpp2021->intReduce = $request->intReduce;
        $mpp2021->txtMtdAdjusment = $request->txtMtdAdjusment;
        $mpp2021->dateBulan = $request->dateBulan;
        $mpp2021->save();
        $mpp2022 = MppVsRealModel::find($id);
        $mpp2022->intMppTotal = $request->intMppTotal;
        $mpp2022->intMppPermanent = $request->intMppPermanent;
        $mpp2022->intMppContract = $request->intMppContract;
        $mpp2022->intMppJobSupply = $request->intMppJobSupply;
        $mpp2022->intAdd = $request->intAdd;
        $mpp2022->intReduce = $request->intReduce;
        $mpp2022->txtMtdAdjusment = $request->txtMtdAdjusment;
        $mpp2022->dateBulan = $request->dateBulan;
        $mpp2022->save();
        return redirect()->route('mppreal')->with('message','Data updated successfully.');
	}
    public function destroy($id)
    {
        MppVsRealModel::find($id)->delete();
        // $data->delete();
        return redirect()->route('mppreal')->with('message','Data deleted successfully');
    }
}
